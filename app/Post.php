<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
  use Searchable;

  protected $fillable = [
      'title', 'content', 'published'
  ];

  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
