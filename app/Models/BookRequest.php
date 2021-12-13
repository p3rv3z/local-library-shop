<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookRequest extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function book(): BelongsTo
    {
      return $this->belongsTo(Book::class);
    }

  public function owner(): BelongsTo
  {
    return $this->belongsTo(User::class, 'receiver_id');
  }

  public function sender(): BelongsTo
  {
    return $this->belongsTo(User::class, 'sender_id');
  }
}
