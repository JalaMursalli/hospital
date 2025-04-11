<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'title_az',
        'title_en',
        'title_ru',

    ];
    public function getTitleAttribute(){
        return $this->getAttribute('title_'.app()->getLocale());
    }
    public function careers(){
        return $this->hasMany(Career::class,'vacancy_id');
    }
}
