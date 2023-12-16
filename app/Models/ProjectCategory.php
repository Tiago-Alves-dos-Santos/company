<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    /** =========================MUTATORS=========================== */
    protected function title(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => strtoupper($value),
        );
    }
}
