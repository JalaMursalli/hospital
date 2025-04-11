<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    use HasFactory;
    protected $fillable = ['name','phone','email','text','cv','career_id'];

    public function career(){
        return $this->belongsTo(Career::class,'career_id');
    }
}
