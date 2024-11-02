<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'teacher_id',
        'date',
        'time',
        'status',
    ];

    // Define relationship to the User model for students
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    // Define relationship to the User model for teachers
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
