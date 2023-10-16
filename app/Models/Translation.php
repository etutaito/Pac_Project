<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    use HasFactory;

    public function sourceWord()
    {
        return $this->belongsTo(Word::class, 'sourceword_id', 'id');
    }

    public function translatedWord()
    {
        return $this->belongsTo(Word::class, 'translatedword_id', 'id');
    }
}
