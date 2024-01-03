<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feedback extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    /** =========================MUTATORS=========================== */
    protected function work(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => mb_convert_case($value, MB_CASE_TITLE, 'UTF-8'),
        );
    }
    /**========================RELATIONSHIP===========================*/
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
