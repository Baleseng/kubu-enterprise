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

            $table->integer('admin_id')->nullable();

            $table->string('file_path'); // This will store the path to the uploaded file
            
            $table->string('product_title');
            $table->integer('product_price');
            $table->text('product_description');
            $table->string('product_status')->nullable();
            $table->string('product_category')->nullable();
            $table->integer('product_quantity')->default(1);
            $table->integer('product_rating')->default(0);
            $table->integer('product_review')->default(0);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
