<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use HasFactory;
    protected $primaryKey = 'q_id';
    protected  $fillable=['qualification','yop','collegename','employee_id'];
}
