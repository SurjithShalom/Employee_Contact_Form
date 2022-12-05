<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;
    protected $primaryKey = 'd_id';
    protected $fillable = [
        'destination',
        'salaryexpected',
    'employee_id'];
}
