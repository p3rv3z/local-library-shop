<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Book extends Model implements HasMedia
{
  use InteractsWithMedia;

  protected $guarded = ['book_cover', 'sample_pdf'];

  public function registerMediaCollections(): void
  {
    $this->addMediaCollection('book-covers')->singleFile();
    $this->addMediaCollection('book-sample-pdfs')->singleFile();
  }

  public function author()
  {
    return $this->belongsTo(Author::class);
  }

  public function category()
  {
    return $this->belongsTo(Collection::class, 'collection_id');
  }

  public function owner()
  {
    return $this->belongsTo(User::class, 'owner_id');
  }


  }
