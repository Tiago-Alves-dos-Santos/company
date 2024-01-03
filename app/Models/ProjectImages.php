<?php

namespace App\Models;

use App\Models\Projects;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectImages extends Model
{
    use HasFactory;
    protected $guarded = [];
    /** =========================MUTATORS=========================== */

    /**========================RELATIONSHIP===========================*/

    public function project(): BelongsTo //have 1 project
    {
        return $this->belongsTo(Projects::class, 'projects_id');
    }
    /** ========================= METHODS STATIC =========================== */

    /** ========================= METHODS =========================== */
}
