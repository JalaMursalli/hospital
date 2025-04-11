<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;
    protected $fillable =
        [
            'title_az',
            'title_en',
            'title_ru',
            'slug_az',
            'slug_en',
            'slug_ru',
            'address_az',
            'address_en',
            'address_ru',
            'workHours',
            'workSchedule_az',
            'workSchedule_en',
            'workSchedule_ru',
            'salary_az',
            'salary_en',
            'salaty_ru',
            'image',
            'status',
            'description1_az',
            'description1_en',
            'description1_ru',
            'description2_az',
            'description2_en',
            'description2_ru',
            'description3_az',
            'description3_en',
            'description3_ru',
            'meta_title_az',
            'meta_title_en',
            'meta_title_ru',
            'meta_description_az',
            'meta_description_en',
            'meta_description_ru',
            'alt_image_az',
            'alt_image_en',
            'alt_image_ru',
            'vacancy_id'
        ];

        public function getTitleAttribute(){
            return $this->getAttribute('title_'.app()->getLocale());
        }
        public function getSlugAttribute(){
            return $this->getAttribute('slug_'.app()->getLocale());
        }
        public function getAddressAttribute(){
            return $this->getAttribute('address_'.app()->getLocale());
        }
        public function getWorkScheduleAttribute(){
            return $this->getAttribute('workSchedule_'.app()->getLocale());
        }
        public function getSalaryAttribute(){
            return $this->getAttribute('salary_'.app()->getLocale());
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
        public function getMetaTitleAttribute(){
            return $this->getAttribute('meta_title_'.app()->getLocale());
        }
        public function getMetaDescriptionAttribute(){
            return $this->getAttribute('meta_description_'.app()->getLocale());
        }
        public function getAltImageAttribute(){
            return $this->getAttribute('alt_image_'.app()->getLocale());
        }

        public function vacancy(){
            return $this->belongsTo(Vacancy::class,'vacancy_id');
        }
        public function applies(){
            return $this->hasMany(Apply::class,'career_id');
        }
}
