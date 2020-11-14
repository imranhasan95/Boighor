<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
  protected $guarded = [];

    function relationBlogcategorytable()
    {
      return $this->hasOne('App\Blogcategory', 'id', 'blogcategory_id');
    }
    public function user()
  {
      return $this->belongsTo(User::class);
  }

  public function comments()
  {
      return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
  }
}
