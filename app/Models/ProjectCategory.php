<?php

namespace App\Models;

use App\Models\Projects;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectCategory extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    /** =========================MUTATORS=========================== */
    protected function title(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => strtoupper($value),
        );
    }
    /**========================RELATIONSHIP===========================*/
    public function projects(): HasMany
    {
        return $this->hasMany(Projects::class);
    }
    /** ========================= METHODS STATIC =========================== */

    /** ========================= METHODS =========================== */

    /**
     * Check if the category is related to projects
     *
     * @return boolean
     */
    public function hasProjects(): bool
    {
        return !empty($this->projects);
    }
}
