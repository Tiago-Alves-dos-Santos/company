<?php

namespace App\Models;

use App\Models\Content;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;
    protected $guarded = [];
    /** =========================MUTATORS=========================== */
    protected function title(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => strtoupper($value),
            get: fn ($value) => strtoupper($value)
        );
    }

    /**========================RELATIONSHIP===========================*/
    public function content(): HasOne
    {
        return $this->hasOne(Content::class)->withDefault();
    }
    /** ========================= METHODS STATIC =========================== */

    /** ========================= METHODS =========================== */

    /**
     * Check if the tag is related to content
     *
     * @return boolean
     */
    public function hasContent(): bool
    {
        return !empty($this->content);
    }
}
