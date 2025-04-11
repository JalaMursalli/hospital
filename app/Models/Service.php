<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable =
        [
            'title_az',
            'title_en',
            'title_ru',
            'price',
            'service_category_id'
        ];
        public function getTitleAttribute(){
            return $this->getAttribute('title_'.app()->getLocale());
        }

        public function service_category(){
            return $this->belongsTo(ServiceCategory::class);
        }

}
