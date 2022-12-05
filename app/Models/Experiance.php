<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiance extends Model
{
    use HasFactory;
    protected $primaryKey = 'e_id';
    protected $fillable = ['experiance','years','jobtitle','employee_id'];
}
