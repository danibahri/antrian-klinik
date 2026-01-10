<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'poli_id',
        'schedule_day',
        'start_time',
        'end_time',
        'specialization',
        'phone',
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    /**
     * Relasi: Doctor belongs to Poli
     */
    public function poli()
    {
        return $this->belongsTo(Poli::class);
    }

    /**
     * Relasi: Doctor has many Queues
     */
    public function queues()
    {
        return $this->hasMany(Queue::class);
    }

    /**
     * Get available queue count for specific date
     */
    public function getAvailableQueueCount($date)
    {
        return $this->queues()
            ->whereDate('visit_date', $date)
            ->whereIn('status', ['WAITING', 'CALLED'])
            ->count();
    }

    /**
     * Check if doctor is full for specific date
     */
    public function isFullForDate($date)
    {
        return $this->getAvailableQueueCount($date) >= 20;
    }

    /**
     * Get next queue number for specific date
     */
    public function getNextQueueNumber($date)
    {
        $lastQueue = $this->queues()
            ->whereDate('visit_date', $date)
            ->orderBy('queue_number', 'desc')
            ->first();

        return $lastQueue ? $lastQueue->queue_number + 1 : 1;
    }
}
