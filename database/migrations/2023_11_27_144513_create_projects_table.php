<?php

use App\Models\Tag;
use App\Models\ProjectCategory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ProjectCategory::class)->nullable()->constrained();
            $table->foreignIdFor(Tag::class)->constrained();
            $table->string('title');
            $table->text('description');
            $table->string('client_name')->nullable();
            $table->string('website')->nullable();
            $table->string('company_name');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
