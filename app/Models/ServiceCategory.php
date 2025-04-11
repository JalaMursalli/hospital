<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'title_az',
        'title_en',
        'title_ru',
        'icon'
    ];
    public function getTitleAttribute(){
        return $this->getAttribute('title_'.app()->getLocale());
    }
    public function service(){
        return $this->hasMany(Service::class);
    }
}
