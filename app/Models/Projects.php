<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Projects extends Model
{
    use HasFactory, SoftDeletes;
    /** =========================MUTATORS=========================== */

    /**========================RELATIONSHIP===========================*/
    public function projectsCategory(): BelongsTo
    {
        return $this->belongsTo(ProjectCategory::class);
    }
    /** ========================= METHODS STATIC =========================== */

    /** ========================= METHODS =========================== */


}
