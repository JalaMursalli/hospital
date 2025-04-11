<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'image',
        'name_az',
        'name_en',
        'name_ru',
        'slug_az',
        'slug_en',
        'slug_ru',
        'position_az',
        'position_en',
        'position_ru',
        'description_az',
        'description_en',
        'description_ru',
        'department_id',
        'meta_title_az',
        'meta_title_en',
        'meta_title_ru',
        'meta_description_az',
        'meta_description_en',
        'meta_description_ru',
        'alt_image_az',
        'alt_image_en',
        'alt_image_ru'
    ];




    public function getNameAttribute(){
        return $this->getAttribute('name_'.app()->getLocale());
    }
    public function getSlugAttribute(){
        return $this->getAttribute('slug_'.app()->getLocale());
    }
    public function getPositionAttribute(){
        return $this->getAttribute('position_'.app()->getLocale());
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
    public function getAltImageAttribute(){
        return $this->getAttribute('alt_image_'.app()->getLocale());
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function feedbacks(){
        return $this->hasMany(Feedback::class);
    }
}
