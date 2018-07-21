<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Category;
class Post extends Model
{
  use softDeletes;

  protected $dates = ['deleted_at'];


  protected $fillable = [
    'title', 'content', 'featured', 'category_id','slug'
  ];

  public function category()
  {
    return  $this->belongsTo('Category');
  }

  public function tags()
  {
    return $this->belongsToMany('App\Tag');
  }
}
