<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TeacherNorm extends Model
{
    /** @use HasFactory<\Database\Factories\TeacherNormFactory> */
    use HasFactory;

    protected $table = 'teachers_norm';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'employee_number',
    ];

    public function classes(): HasMany
    {
        return $this->hasMany(ClassNorm::class, 'teacher_id');
    }
}
