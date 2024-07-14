<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $primaryKey = 'empID';
    protected $fillable = ['fName', 'lName', 'email', 'phoneNo', 'address', 'DOB', 'salary', 'Department']; 
    use HasFactory;
}
