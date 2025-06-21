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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('item')->unique();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('welfare_id');  
            $table->string('serial_number')->unique();
            $table->decimal('price');
            $table->decimal('vat');
            $table->decimal('tax');
            $table->decimal('discount');
            $table->decimal('total_price');
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
        Schema::table('items', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropColumn('product_id');
            $table->dropForeign(['welfare_id']);
            $table->dropColumn('welfare_id');
        });
    }
};
