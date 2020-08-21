<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = 'news';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['category_id', 'title', 'body', 'image'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function getImagePathAttribute()
    {
        return asset('uploads/news_images/' . $this->image);
    }
}
