<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'meta_keywords','meta_des'];


    public function news()
    {
        return $this->hasMany('App\Models\News', 'category_id');
    }
}
