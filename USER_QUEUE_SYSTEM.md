# User Queue Management System - Documentation

## Overview

Sistem antrian user telah berhasil diintegrasikan dengan database dengan semua fitur yang diminta.

## Fitur yang Diimplementasikan

### 1. Pendaftaran Antrian (Queue Registration)

#### Form Pendaftaran

-   **Pilih Poli**: Dropdown dinamis dari database (tabel `polis`)
-   **Pilih Dokter**: Dropdown dinamis berdasarkan poli yang dipilih (AJAX)
    -   Menampilkan jadwal praktik dokter (hari, jam praktik, spesialisasi)
    -   Data diambil via API endpoint `/user/api/polis/{poli}/doctors`
-   **Tanggal Kunjungan**: Date picker dengan validasi (minimal hari ini)
-   **Keluhan**: Textarea dengan minimal 10 karakter

#### Validasi Sistem

✅ **Nomor Antrian Otomatis**

-   Otomatis increment per dokter per tanggal
-   Dimulai dari 1 setiap hari untuk setiap dokter
-   Format: Nomor integer (1, 2, 3, dst.)

✅ **Maksimal Antrian per Dokter per Hari: 20**

-   Sistem mengecek jumlah antrian aktif (WAITING + CALLED)
-   Jika sudah 20, registrasi ditolak dengan pesan error

✅ **Tidak Boleh Daftar 2x ke Dokter yang Sama di Tanggal yang Sama**

-   Sistem mengecek apakah user sudah memiliki antrian aktif
-   Validasi untuk status WAITING dan CALLED
-   Error message: "Anda sudah mendaftar ke dokter ini pada tanggal yang sama"

#### Error Handling

-   Validasi server-side lengkap dengan pesan error dalam Bahasa Indonesia
-   Error ditampilkan di atas form dengan alert merah
-   Field validation per input dengan border merah jika ada error

### 2. Riwayat Antrian (Queue History)

#### Tampilan

-   **Card dengan Status Dinamis**: Warna card berubah sesuai status
    -   WAITING: Biru (border-blue-200, bg-blue-50)
    -   CALLED: Kuning (border-yellow-200, bg-yellow-50)
    -   DONE: Abu-abu (border-gray-200, bg-gray-50) dengan badge hijau
    -   CANCELED: Abu-abu dengan badge merah

#### Informasi yang Ditampilkan

-   Status antrian (badge)
-   Nomor antrian
-   Nama dokter
-   Tanggal kunjungan (format: Hari, Tanggal Bulan Tahun)
-   Nama poli
-   Keluhan (limited 60 karakter)

#### Aksi

-   **Tombol Batalkan**: Hanya muncul untuk status WAITING
-   Confirmation dialog sebelum cancel
-   Update status menjadi CANCELED dengan timestamp

### 3. Statistik Dashboard

Statistik real-time dari database:

-   **Total Kunjungan**: Semua antrian user (all time)
-   **Antrian Aktif**: Antrian dengan status WAITING
-   **Selesai**: Antrian dengan status DONE
    -   Termasuk counter bulan ini
-   **Dibatalkan**: Total antrian dengan status CANCELED

### 4. Live Refresh (Bonus)

Implementasi polling sederhana:

-   Auto-refresh setiap 30 detik (configurable)
-   Hanya refresh jika user memiliki antrian aktif
-   Saat ini di-comment untuk menghindari reload berlebihan
-   Dapat diaktifkan dengan uncomment baris `location.reload()`

## Struktur Teknis

### Controller: UserController.php

#### Methods:

1. **dashboard()**
    - Load statistik user
    - Load 10 riwayat antrian terakhir
    - Load semua poli untuk form
2. **getDoctorsByPoli($poliId)**
    - API endpoint untuk mendapatkan doctors by poli
    - Return JSON dengan jadwal praktik
3. **storeQueue(Request $request)**
    - Validasi input (doctor, date, complaint)
    - Check duplicate registration
    - Check max quota (20)
    - Generate queue number (auto increment)
    - Create queue record
4. **cancelQueue($queueId)**
    - Validate user ownership
    - Validate status (hanya WAITING yang bisa cancel)
    - Update status to CANCELED

### Routes: web.php

```php
Route::middleware([AuthMiddleware::class . ':user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    // Queue registration routes
    Route::post('/queues', [UserController::class, 'storeQueue'])->name('queues.store');
    Route::post('/queues/{queue}/cancel', [UserController::class, 'cancelQueue'])->name('queues.cancel');

    // API routes for dynamic data
    Route::get('/api/polis/{poli}/doctors', [UserController::class, 'getDoctorsByPoli'])->name('api.doctors');
});
```

### View: user.blade.php

#### Sections:

1. **Alert Messages**

    - Success alert (hijau)
    - Error alert (merah)

2. **Statistics Cards** (4 cards)

    - Real data dari database
    - Icons dengan warna berbeda per card

3. **Registration Form**

    - Dynamic poli select
    - Dynamic doctor select dengan AJAX
    - Doctor schedule display
    - Validation error display per field
    - Info box dengan aturan pendaftaran

4. **Queue History**

    - Loop through recentQueues
    - Dynamic styling per status
    - Cancel button untuk WAITING status
    - Empty state jika belum ada antrian

5. **JavaScript**
    - AJAX untuk load doctors by poli
    - Display schedule info saat doctor dipilih
    - Optional polling untuk auto-refresh

## Validasi Request

### storeQueue Validation:

```php
[
    'doctor_id' => 'required|exists:doctors,id',
    'visit_date' => 'required|date|after_or_equal:today',
    'complaint' => 'required|string|min:10|max:500',
]
```

### Custom Error Messages (Indonesian):

-   doctor_id.required: "Dokter harus dipilih"
-   doctor_id.exists: "Dokter tidak valid"
-   visit_date.required: "Tanggal kunjungan harus diisi"
-   visit_date.after_or_equal: "Tanggal kunjungan tidak boleh kurang dari hari ini"
-   complaint.required: "Keluhan harus diisi"
-   complaint.min: "Keluhan minimal 10 karakter"
-   complaint.max: "Keluhan maksimal 500 karakter"

## Database Queries

### Check Duplicate Registration:

```php
Queue::where('user_id', $user->id)
    ->where('doctor_id', $doctor->id)
    ->whereDate('visit_date', $visitDate)
    ->whereIn('status', ['WAITING', 'CALLED'])
    ->first();
```

### Check Max Quota:

```php
Queue::where('doctor_id', $doctor->id)
    ->whereDate('visit_date', $visitDate)
    ->whereIn('status', ['WAITING', 'CALLED'])
    ->count();
```

### Generate Queue Number:

```php
$lastQueue = Queue::where('doctor_id', $doctor->id)
    ->whereDate('visit_date', $visitDate)
    ->orderBy('queue_number', 'desc')
    ->first();

$queueNumber = $lastQueue ? $lastQueue->queue_number + 1 : 1;
```

## Testing Checklist

### Pendaftaran Antrian:

-   [ ] Pilih poli → Dokter muncul sesuai poli
-   [ ] Pilih dokter → Jadwal praktik muncul
-   [ ] Submit dengan keluhan < 10 char → Error validation
-   [ ] Submit dengan tanggal kemarin → Error validation
-   [ ] Daftar 2x ke dokter sama di tanggal sama → Error "sudah mendaftar"
-   [ ] Daftar ke dokter yang sudah penuh (20 antrian) → Error "kuota penuh"
-   [ ] Submit valid → Success, nomor antrian muncul

### Riwayat Antrian:

-   [ ] Antrian WAITING menampilkan tombol Batalkan
-   [ ] Antrian CALLED tidak menampilkan tombol Batalkan
-   [ ] Antrian DONE tidak menampilkan tombol Batalkan
-   [ ] Klik Batalkan → Confirmation dialog
-   [ ] Confirm cancel → Status berubah jadi CANCELED

### Dashboard Stats:

-   [ ] Total Kunjungan = count semua queue user
-   [ ] Antrian Aktif = count queue dengan status WAITING
-   [ ] Selesai = count queue dengan status DONE
-   [ ] Dibatalkan = count queue dengan status CANCELED

## Tips Penggunaan

### Untuk User:

1. Pilih poli terlebih dahulu
2. Pilih dokter dan perhatikan jadwal praktik
3. Pilih tanggal yang sesuai dengan jadwal dokter
4. Tulis keluhan minimal 10 karakter
5. Lihat nomor antrian setelah submit
6. Hanya bisa cancel jika status masih WAITING

### Untuk Developer:

1. Pastikan seeder sudah dijalankan untuk data poli dan dokter
2. Carbon locale sudah di-set ke Indonesia untuk format tanggal
3. AJAX endpoint menggunakan route name untuk maintainability
4. Validation messages dalam Bahasa Indonesia
5. Auto-refresh dapat diaktifkan dengan uncomment di script

## Next Steps (Optional Enhancements)

1. **Real-time Updates**

    - Implement WebSocket atau Server-Sent Events
    - Update status tanpa reload page

2. **Notifications**

    - Email notification saat status berubah
    - Push notification untuk mobile

3. **Print Queue Ticket**

    - Generate PDF ticket dengan QR code
    - Download/print nomor antrian

4. **Queue Estimation**

    - Estimasi waktu tunggu berdasarkan nomor antrian
    - Display current queue being served

5. **Rating System**
    - User bisa memberikan rating setelah DONE
    - Display doctor ratings

## Troubleshooting

### AJAX tidak load doctors:

-   Check route dengan `php artisan route:list`
-   Check browser console untuk error
-   Verify data poli dan dokter ada di database

### Nomor antrian tidak increment:

-   Check query orderBy('queue_number', 'desc')
-   Verify whereDate condition
-   Check timezone configuration

### Cancel button tidak muncul:

-   Verify status queue adalah 'WAITING'
-   Check blade condition `@if ($queue->status === 'WAITING')`

### Error "Undefined method 'queues'":

-   Pastikan relationship di User model sudah ada
-   Restart PHP artisan serve
-   Clear config cache: `php artisan config:clear`
