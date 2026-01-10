<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Poli extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Relasi: Poli has many Doctors
     */
    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }

    /**
     * Relasi: Poli has many Queues melalui Doctors
     */
    public function queues()
    {
        return $this->hasManyThrough(Queue::class, Doctor::class);
    }
}
