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

            $table->integer('page_views')->default(0); // Track page views
            $table->integer('button_clicks')->default(0); // Track button clicks
            $table->integer('href_clicks')->default(0); // Track href clicks
    
            $table->string('file_path');
            $table->string('original_name');

            $table->string('product_title');
            $table->text('product_description')->nullable();
            $table->string('product_review');
            $table->string('product_stock');
            $table->string('product_quantity');
            $table->string('product_status');
            $table->string('product_category');
            $table->string('product_country');
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
