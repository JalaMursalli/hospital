<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $fillable =
        [
            'position_az',
            'position_en',
            'position_ru',
            'description_az',
            'description_en',
            'description_ru',
            'ranking',
            'image'
        ];

        public function getPositionAttribute(){
            return $this->getAttribute('position_'.app()->getLocale());
        }
        public function getDescriptionAttribute(){
            return $this->getAttribute('description_'.app()->getLocale());
        }
        public function doctor(){
            return $this->belongsTo(Doctor::class);
        }
}
