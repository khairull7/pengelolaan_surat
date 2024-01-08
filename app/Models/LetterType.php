<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LetterType extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'lettertypes';
    protected $guarded = ['id'];

    public function letters(): HasMany
    {
        return $this->hasMany(Letter::class);
    }
}
