<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassroomDenorm extends Model
{
    /** @use HasFactory<\Database\Factories\ClassroomDenormFactory> */
    use HasFactory;

    protected $table = 'classroom_denorm';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'class_code',
        'class_name',
        'starts_at',
        'ends_at',
        'teacher',
        'students',
    ];

    protected function casts(): array
    {
        return [
            'teacher' => 'string',
            'students' => 'string',
            'starts_at' => 'datetime',
            'ends_at' => 'datetime',
        ];
    }
}
