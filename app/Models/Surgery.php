<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surgery extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'icon',
        'image1',
        'image2',
        'title_az',
        'title_en',
        'title_ru',
        'slug_az',
        'slug_en',
        'slug_ru',
        'description1_az',
        'description1_en',
        'description1_ru',
        'description2_az',
        'description2_en',
        'description2_ru',
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
        'alt_image2_ru',
        
    ];
    public function getTitleAttribute(){
        return $this->getAttribute('title_'.app()->getLocale());
    }
    public function getSlugAttribute(){
        return $this->getAttribute('slug_'.app()->getLocale());
    }
    public function getDescription1Attribute(){
        return $this->getAttribute('description1_'.app()->getLocale());
    }
    public function getDescription2Attribute(){
        return $this->getAttribute('description2_'.app()->getLocale());
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
