<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Content extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [];

    /**========================RELATIONSHIP===========================*/
    public function tag(): BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }
}
