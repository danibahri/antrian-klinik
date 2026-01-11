<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    protected $fillable = [
        'user_id',
        'doctor_id',
        'visit_date',
        'queue_number',
        'complaint',
        'status',
        'called_at',
        'completed_at',
        'canceled_at',
        'notes',
    ];

    protected $casts = [
        'visit_date' => 'date',
        'called_at' => 'datetime',
        'completed_at' => 'datetime',
        'canceled_at' => 'datetime',
    ];

    /**
     * Relasi: Queue belongs to User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi: Queue belongs to Doctor
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    /**
     * Relasi: Queue belongs to Poli (through Doctor)
     */
    public function poli()
    {
        return $this->hasOneThrough(Poli::class, Doctor::class, 'id', 'id', 'doctor_id', 'poli_id');
    }

    /**
     * Scope: Get waiting queues
     */
    public function scopeWaiting($query)
    {
        return $query->where('status', 'WAITING');
    }

    /**
     * Scope: Get called queues
     */
    public function scopeCalled($query)
    {
        return $query->where('status', 'CALLED');
    }

    /**
     * Scope: Get done queues
     */
    public function scopeDone($query)
    {
        return $query->where('status', 'DONE');
    }

    /**
     * Scope: Get canceled queues
     */
    public function scopeCanceled($query)
    {
        return $query->where('status', 'CANCELED');
    }

    /**
     * Scope: Get today's queues
     */
    public function scopeToday($query)
    {
        return $query->whereDate('visit_date', today());
    }

    /**
     * Scope: Get queues by doctor
     */
    public function scopeByDoctor($query, $doctorId)
    {
        return $query->where('doctor_id', $doctorId);
    }

    /**
     * Scope: Get queues by date
     */
    public function scopeByDate($query, $date)
    {
        return $query->whereDate('visit_date', $date);
    }

    /**
     * Check if queue can be canceled
     */
    public function canBeCanceled()
    {
        return $this->status === 'WAITING';
    }

    /**
     * Cancel queue
     */
    public function cancel()
    {
        if ($this->canBeCanceled()) {
            $this->update([
                'status' => 'CANCELED',
                'canceled_at' => now(),
            ]);
            return true;
        }
        return false;
    }

    /**
     * Call queue
     */
    public function call()
    {
        if ($this->status === 'WAITING') {
            $this->update([
                'status' => 'CALLED',
                'called_at' => now(),
            ]);
            return true;
        }
        return false;
    }

    /**
     * Complete queue
     */
    public function complete()
    {
        if (in_array($this->status, ['WAITING', 'CALLED'])) {
            $this->update([
                'status' => 'DONE',
                'completed_at' => now(),
            ]);
            return true;
        }
        return false;
    }

    /**
     * Get status badge color
     */
    public function getStatusColorAttribute()
    {
        return match ($this->status) {
            'WAITING' => 'yellow',
            'CALLED' => 'blue',
            'DONE' => 'green',
            'CANCELED' => 'red',
            default => 'gray',
        };
    }

    /**
     * Get status label
     */
    public function getStatusLabelAttribute()
    {
        return match ($this->status) {
            'WAITING' => 'Menunggu',
            'CALLED' => 'Dipanggil',
            'DONE' => 'Selesai',
            'CANCELED' => 'Dibatalkan',
            default => 'Tidak Diketahui',
        };
    }
}
