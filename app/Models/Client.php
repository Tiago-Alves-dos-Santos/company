<?php

namespace App\Models;

use App\Models\Feedback;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    /**========================RELATIONSHIP===========================*/
    public function feedback(): HasMany
    {
        return $this->hasMany(Feedback::class);
    }
}
