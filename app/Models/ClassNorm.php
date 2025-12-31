<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ClassNorm extends Model
{
    /** @use HasFactory<\Database\Factories\ClassNormFactory> */
    use HasFactory;

    protected $table = 'classes_norm';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'code',
        'name',
        'teacher_id',
        'starts_at',
        'ends_at',
    ];

    protected function casts(): array
    {
        return [
            'starts_at' => 'datetime',
            'ends_at' => 'datetime',
        ];
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(TeacherNorm::class, 'teacher_id');
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(StudentNorm::class, 'class_student_norm', 'class_id', 'student_id')
            ->withPivot('enrolled_at');
    }
}
