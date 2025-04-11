<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentCategory extends Model
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
    public function department(){
        return $this->hasMany(Department::class);
    }
}
