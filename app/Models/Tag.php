<?php

namespace App\Models;

use App\Models\Content;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;
    protected $guarded = [];
    /**========================RELATIONSHIP===========================*/
    public function content(): HasOne
    {
        return $this->hasOne(Content::class);
    }

}
