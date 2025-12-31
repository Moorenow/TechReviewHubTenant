<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class StudentNorm extends Model
{
    /** @use HasFactory<\Database\Factories\StudentNormFactory> */
    use HasFactory;

    protected $table = 'students_norm';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'enrollment_number',
    ];

    public function classes(): BelongsToMany
    {
        return $this->belongsToMany(ClassNorm::class, 'class_student_norm', 'student_id', 'class_id')
            ->withPivot('enrolled_at');
    }
}
