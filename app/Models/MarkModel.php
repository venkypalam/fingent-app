<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarkModel extends Model
{
    use HasFactory;

    protected $guarded = [];
	protected $table = 'marks';
	const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $primaryKey = 'id';

    protected $fillable = [
        "student_id","maths","science","history", "term","total_marks",
    ];

    public function studentMarks()
    {
       return $this->hasOne('App\Models\StudentModel', 'id', 'student_id');
    }    

}
