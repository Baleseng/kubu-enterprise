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
            
            $table->string('product_name');
            $table->integer('product_price');
            $table->text('product_description');
            $table->string('product_status');
            $table->string('product_instock')->nullable();
            $table->string('product_category');
            $table->string('product_type')->nullable();
            $table->string('product_brand')->nullable();
            
            $table->integer('product_quantity');

            $table->string('file_keywords')->nullable();
            $table->text('file_description')->nullable();

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
