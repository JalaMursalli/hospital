<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emergency extends Model
{
    use HasFactory;
    protected $fillable =
        [
            'title1_az',
            'title1_en',
            'title1_ru',
            'title2_az',
            'title2_en',
            'title2_ru',
            'title3_az',
            'title3_en',
            'title3_ru',
            'description1_az',
            'description1_en',
            'description1_ru',
            'description2_az',
            'description2_en',
            'description2_ru',
            'description3_az',
            'description3_en',
            'description3_ru',
            'image',
            'alt_image_az',
            'alt_image_en',
            'alt_image_ru'
        ];
        public function getTitle1Attribute(){
            return $this->getAttribute('title1_'.app()->getLocale());
        }
        public function getTitle2Attribute(){
            return $this->getAttribute('title2_'.app()->getLocale());
        }
        public function getTitle3Attribute(){
            return $this->getAttribute('title3_'.app()->getLocale());
        }
        public function getDescription1Attribute(){
            return $this->getAttribute('description1_'.app()->getLocale());
        }
        public function getDescription2Attribute(){
            return $this->getAttribute('description2_'.app()->getLocale());
        }
        public function getDescription3Attribute(){
            return $this->getAttribute('description3_'.app()->getLocale());
        }
        public function getAltImageAttribute(){
            return $this->getAttribute('alt_image_'.app()->getLocale());
        }
}
