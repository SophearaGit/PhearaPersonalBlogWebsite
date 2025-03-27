<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->integer('author_id');
            $table->string('title');
            $table->string('slug');
            $table->string('featured_image');
            $table->text('overview');
            $table->string('strategy')->nullable();
            $table->string('project_type')->nullable();
            $table->string('client')->nullable();
            $table->text('content');
            $table->text('project_challenge')->nullable();
            $table->text('design_research')->nullable();
            $table->text('design_approach')->nullable();
            $table->text('the_solution')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
