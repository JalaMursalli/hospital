<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutBanner extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'title_az',
        'title_en',
        'title_ru',
         'image'
    ];

    // $about_banner->title

    public function getTitleAttribute(){
        return $this->{'title_'.app()->getLocale()};
    }
}
