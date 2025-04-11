<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterLogo extends Model
{
    use HasFactory;
    protected $fillable =
     [
        'title_az',
        'title_en',
        'title_ru',
        'sub_title_az',
        'sub_title_en',
        'sub_title_ru',
        'image'
    ];
    public function getTitleAttribute(){
        return $this->getAttribute('title_'.app()->getLocale());
    }
    public function getSubTitleAttribute(){
        return $this->getAttribute('sub_title_'.app()->getLocale());
    }
}
