<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('welfares', function (Blueprint $table) {
             $table->id();
             $table->string('name')->unique(); // welfare column with unique constraint
             $table->boolean('active')->default(1); // Active column with default value 1 (1 = active, 0 = inactive)
             $table->boolean('delete')->default(0); // Delete column with default value 0 (0 = not deleted, 1 = deleted)
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('welfare');
    }
};
