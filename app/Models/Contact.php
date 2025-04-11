<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'address_title_az',
        'address_title_en',
        'address_title_ru',
        'address_icon',
        'email_title_az',
        'email_title_en',
        'email_title_ru',
        'email_icon',
        'phone_title_az',
        'phone_title_en',
        'phone_title_ru',
        'phone_icon',
        'map',
        'phone_title2'
    ];

    public function getAddressTitleAttribute(){
        return $this->getAttribute('address_title_'.app()->getLocale());
    }

    public function getEmailTitleAttribute(){
        return $this->getAttribute('email_title_'.app()->getLocale());
    }

    public function getPhoneTitleAttribute(){
        return $this->getAttribute('phone_title_'.app()->getLocale());
    }
}
