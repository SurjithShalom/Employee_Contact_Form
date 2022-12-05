<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeMark extends Model
{
    use HasFactory;
    protected $primaryKey = 'mark_id';
    protected $fillable = [
        'employee_id',
        'mark1',
        'mark2',
        'mark3',
        'mark4',
        'mark5',
        'pratical_mark1',
        'pratical_mark2',
        'pratical_mark3',
        'presentage',
    ];
}
