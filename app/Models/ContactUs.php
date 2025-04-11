<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
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
        'description_az',
        'description_en',
        'description_ru',
        'image',
        'alt_image_az',
        'alt_image_en',
        'alt_image_ru'
    ];
    public function getTitleAttribute(){
        return $this->getAttribute('title_'.app()->getLocale());
    }
    public function getSubTitleAttribute(){
        return $this->getAttribute('sub_title_'.app()->getLocale());
    }
    public function getDescriptionAttribute(){
        return $this->getAttribute('description_'.app()->getLocale());
    }
    public function getAltImageAttribute(){
        return $this->getAttribute('alt_image_'.app()->getLocale());
    }
}
