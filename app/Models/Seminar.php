<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seminar extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'image1',
        'image2',
        'title_az',
        'title_en',
        'title_ru',
        'sub_title_az',
        'sub_title_en',
        'subtitle_ru',
        'slug_az',
        'slug_en',
        'slug_ru',
        'description_az',
        'description_en',
        'description_ru',
        'date',
        'type',
        'countView',
        'priceStatus',
        'meta_title_az',
        'meta_title_en',
        'meta_title_ru',
        'meta_description_az',
        'meta_description_en',
        'meta_description_ru',
        'alt_image1_az',
        'alt_image1_en',
        'alt_image1_ru',
        'alt_image2_az',
        'alt_image2_en',
        'alt_image2_ru'
    ];
    public function getTitleAttribute(){
        return $this->getAttribute('title_'.app()->getLocale());
    }
    public function getSubTitleAttribute(){
        return $this->getAttribute('sub_title_'.app()->getLocale());
    }
    public function getSlugAttribute(){
        return $this->getAttribute('slug_'.app()->getLocale());
    }
    public function getDescriptionAttribute(){
        return $this->getAttribute('description_'.app()->getLocale());
    }
    public function getMetaTitleAttribute(){
        return $this->getAttribute('meta_title_'.app()->getLocale());
    }
    public function getMetaDescriptionAttribute(){
        return $this->getAttribute('meta_description_'.app()->getLocale());
    }
    public function getAltImage1Attribute(){
        return $this->getAttribute('alt_image1_'.app()->getLocale());
    }
    public function getAltImage2Attribute(){
        return $this->getAttribute('alt_image2_'.app()->getLocale());
    }
}
