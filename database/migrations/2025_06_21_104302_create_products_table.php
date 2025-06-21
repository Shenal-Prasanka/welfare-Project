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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product');
            $table->string('brand');
            $table->string('model');
            $table->unsignedBigInteger('supply_id');
            $table->unsignedBigInteger('category_id'); 
            $table->boolean('active')->default(1);
            $table->boolean('delete')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['supply_id']);
            $table->dropColumn('supply_id');
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
};
