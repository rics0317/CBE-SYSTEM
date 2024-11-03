<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $fillable = ['student_id', 'course_id', 'enrollment_date'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function getViewData()
    {
        return [
            'student' => $this->student,
            'course' => $this->course,
            'enrollment_date' => $this->enrollment_date,
        ];
    }
}
