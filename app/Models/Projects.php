<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Projects extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    /** =========================MUTATORS=========================== */

    /**========================RELATIONSHIP===========================*/

    public function projectCategory(): BelongsTo //have 1 categories
    {
        return $this->belongsTo(ProjectCategory::class);
    }
    public function projectsImage(): HasMany //can have 1 or n images
    {
        return $this->hasMany(ProjectImages::class);
    }
    /** ========================= METHODS STATIC =========================== */

    /** ========================= METHODS =========================== */


}
