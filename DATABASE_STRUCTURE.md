# Database Structure - Sistem Antrian Klinik

## 📊 **Tabel Database**

### 1. **users** (sudah ada + modifikasi)

Tabel untuk menyimpan data pengguna (pasien dan admin)

| Column            | Type                 | Nullable | Description                   |
| ----------------- | -------------------- | -------- | ----------------------------- |
| id                | bigint unsigned      | NO       | Primary Key                   |
| name              | varchar(255)         | NO       | Nama lengkap                  |
| email             | varchar(255)         | NO       | Email (unique)                |
| password          | varchar(255)         | NO       | Password (hashed)             |
| phone             | varchar(255)         | YES      | Nomor telepon                 |
| date_of_birth     | date                 | YES      | Tanggal lahir                 |
| address           | text                 | YES      | Alamat lengkap                |
| role              | enum('admin','user') | NO       | Role pengguna (default: user) |
| email_verified_at | timestamp            | YES      | Waktu verifikasi email        |
| remember_token    | varchar(100)         | YES      | Token remember me             |
| created_at        | timestamp            | YES      | Waktu dibuat                  |
| updated_at        | timestamp            | YES      | Waktu diupdate                |

**Relasi:**

-   `hasMany` → Queue

---

### 2. **polis**

Tabel untuk menyimpan data poli/klinik

| Column      | Type            | Nullable | Description                              |
| ----------- | --------------- | -------- | ---------------------------------------- |
| id          | bigint unsigned | NO       | Primary Key                              |
| name        | varchar(255)    | NO       | Nama poli (contoh: Poli Umum, Poli Gigi) |
| description | text            | YES      | Deskripsi poli                           |
| created_at  | timestamp       | YES      | Waktu dibuat                             |
| updated_at  | timestamp       | YES      | Waktu diupdate                           |
| deleted_at  | timestamp       | YES      | Waktu dihapus (soft delete)              |

**Relasi:**

-   `hasMany` → Doctor
-   `hasManyThrough` → Queue (melalui Doctor)

**Data Dummy:**

-   Poli Umum
-   Poli Gigi
-   Poli Anak
-   Poli Mata
-   Poli THT

---

### 3. **doctors**

Tabel untuk menyimpan data dokter dan jadwal praktik

| Column         | Type            | Nullable | Description                  |
| -------------- | --------------- | -------- | ---------------------------- |
| id             | bigint unsigned | NO       | Primary Key                  |
| name           | varchar(255)    | NO       | Nama dokter                  |
| poli_id        | bigint unsigned | NO       | Foreign Key ke polis         |
| schedule_day   | enum            | NO       | Hari praktik (Monday-Sunday) |
| start_time     | time            | NO       | Jam mulai praktik            |
| end_time       | time            | NO       | Jam selesai praktik          |
| specialization | text            | YES      | Spesialisasi dokter          |
| phone          | varchar(255)    | YES      | Nomor telepon dokter         |
| created_at     | timestamp       | YES      | Waktu dibuat                 |
| updated_at     | timestamp       | YES      | Waktu diupdate               |
| deleted_at     | timestamp       | YES      | Waktu dihapus (soft delete)  |

**Indexes:**

-   `poli_id, schedule_day` (composite index untuk pencarian cepat)

**Relasi:**

-   `belongsTo` → Poli
-   `hasMany` → Queue

**Methods:**

-   `getAvailableQueueCount($date)` - Hitung jumlah antrian untuk tanggal tertentu
-   `isFullForDate($date)` - Cek apakah sudah penuh (max 20)
-   `getNextQueueNumber($date)` - Dapatkan nomor antrian berikutnya

---

### 4. **queues**

Tabel untuk menyimpan data antrian pasien

| Column       | Type            | Nullable | Description                             |
| ------------ | --------------- | -------- | --------------------------------------- |
| id           | bigint unsigned | NO       | Primary Key                             |
| user_id      | bigint unsigned | NO       | Foreign Key ke users                    |
| doctor_id    | bigint unsigned | NO       | Foreign Key ke doctors                  |
| visit_date   | date            | NO       | Tanggal kunjungan                       |
| queue_number | integer         | NO       | Nomor antrian                           |
| complaint    | text            | NO       | Keluhan pasien (min 10 karakter)        |
| status       | enum            | NO       | Status: WAITING, CALLED, DONE, CANCELED |
| called_at    | timestamp       | YES      | Waktu dipanggil                         |
| completed_at | timestamp       | YES      | Waktu selesai                           |
| canceled_at  | timestamp       | YES      | Waktu dibatalkan                        |
| notes        | text            | YES      | Catatan tambahan                        |
| created_at   | timestamp       | YES      | Waktu dibuat                            |
| updated_at   | timestamp       | YES      | Waktu diupdate                          |

**Indexes:**

-   `doctor_id, visit_date, status` (composite index)
-   `user_id, status` (composite index)

**Unique Constraints:**

-   `user_id, doctor_id, visit_date` - User tidak boleh daftar 2x ke dokter sama di tanggal sama

**Relasi:**

-   `belongsTo` → User
-   `belongsTo` → Doctor

**Scopes:**

-   `waiting()` - Antrian menunggu
-   `called()` - Antrian dipanggil
-   `done()` - Antrian selesai
-   `canceled()` - Antrian dibatalkan
-   `today()` - Antrian hari ini
-   `byDoctor($doctorId)` - Filter by doctor
-   `byDate($date)` - Filter by date

**Methods:**

-   `canBeCanceled()` - Cek apakah bisa dibatalkan (status WAITING)
-   `cancel()` - Batalkan antrian
-   `call()` - Panggil antrian
-   `complete()` - Selesaikan antrian
-   `getStatusColorAttribute()` - Dapatkan warna badge status
-   `getStatusLabelAttribute()` - Dapatkan label status

---

## 🔐 **Business Rules**

### 1. **Maksimal Antrian**

-   Maksimal 20 antrian per dokter per hari
-   Validasi di level aplikasi menggunakan method `isFullForDate()`

### 2. **Duplikasi Pendaftaran**

-   User tidak boleh daftar 2x ke dokter sama di tanggal sama
-   Constraint: `UNIQUE(user_id, doctor_id, visit_date)`

### 3. **Nomor Antrian Otomatis**

-   Nomor antrian dimulai dari 1 per dokter per tanggal
-   Auto-increment menggunakan method `getNextQueueNumber()`

### 4. **Status Workflow**

```
WAITING → CALLED → DONE
    ↓
CANCELED (hanya dari WAITING)
```

### 5. **Pembatalan Antrian**

-   User hanya bisa cancel jika status masih `WAITING`
-   Setelah `CALLED`, tidak bisa dibatalkan

---

## 📝 **Contoh Query**

### Get Antrian Aktif User

```php
$user->queues()
    ->with(['doctor.poli'])
    ->whereIn('status', ['WAITING', 'CALLED'])
    ->orderBy('visit_date')
    ->get();
```

### Get Antrian Hari Ini untuk Dokter

```php
$doctor->queues()
    ->with('user')
    ->byDate(today())
    ->waiting()
    ->orderBy('queue_number')
    ->get();
```

### Panggil Antrian Berikutnya

```php
$nextQueue = Queue::where('doctor_id', $doctorId)
    ->byDate($date)
    ->waiting()
    ->orderBy('queue_number')
    ->first();

if ($nextQueue) {
    $nextQueue->call();
}
```

### Cek Kuota Tersedia

```php
$availableSlots = 20 - $doctor->getAvailableQueueCount($date);
if ($availableSlots > 0) {
    // Masih ada slot
}
```

---

## 🎯 **Testing Requirements**

### 1. **User Authorization (Policy)**

-   User tidak bisa akses/edit data queue user lain
-   User hanya bisa cancel queue miliknya sendiri
-   Admin bisa akses semua data

### 2. **Kuota Validasi**

-   Tidak bisa daftar jika kuota 20 sudah penuh
-   Test: Buat 20 antrian, coba buat ke-21 harus gagal

### 3. **Duplikasi Validasi**

-   Tidak bisa daftar 2x ke dokter sama di tanggal sama
-   Test: Buat antrian, coba buat lagi harus gagal (unique constraint)

---

## 🚀 **Seeder Data**

### Users

-   **Admin**: admin@kliniksehat.com / password
-   **Patient**: patient@example.com / password

### Polis (5 poli)

1. Poli Umum
2. Poli Gigi
3. Poli Anak
4. Poli Mata
5. Poli THT

### Doctors (11 dokter dengan jadwal berbeda)

-   Masing-masing poli punya 2-3 dokter
-   Jadwal praktik bervariasi (Senin-Jumat)
-   Waktu praktik: pagi (08:00-14:00) atau siang (13:00-18:00)

---

## 📦 **Commands**

### Run Migration

```bash
php artisan migrate
```

### Run Seeder

```bash
php artisan db:seed
```

### Refresh Database

```bash
php artisan migrate:fresh --seed
```

### Create New Queue

```bash
# Dalam controller
$queue = Queue::create([
    'user_id' => auth()->id(),
    'doctor_id' => $request->doctor_id,
    'visit_date' => $request->visit_date,
    'queue_number' => $doctor->getNextQueueNumber($request->visit_date),
    'complaint' => $request->complaint,
    'status' => 'WAITING',
]);
```

---

## 🔄 **Future Enhancements**

1. **Notifikasi Email**

    - Event listener untuk status change
    - Kirim email saat status jadi CALLED

2. **Live Refresh**

    - Polling dengan AJAX setiap 10 detik
    - Update status antrian real-time

3. **Riwayat Status**

    - Tabel terpisah untuk tracking perubahan status
    - Audit trail lengkap

4. **Rating Dokter**

    - User bisa kasih rating setelah selesai
    - Relasi: Queue belongsTo Rating

5. **Multi-Schedule per Doctor**
    - Dokter bisa praktek di beberapa hari
    - Tabel `doctor_schedules` terpisah
