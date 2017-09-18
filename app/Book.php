<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
  protected $fillable = ['name', 'author', 'category', 'published_date', 'user', 'available'];
  protected $dates = ['published_date'];
}
