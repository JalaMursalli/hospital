<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EhekimApplication extends Model
{
    use HasFactory;
    protected $fillable = ['name','surname','email','phone'];
}
