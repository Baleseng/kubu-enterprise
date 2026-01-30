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
            $table->string('specialsection')->nullable();
            $table->string('firstcategory');
            $table->string('secondcategory');
            $table->string('thirdcategory')->nullable();

            $table->string('name');
            $table->integer('price');
            $table->text('description');
            $table->string('status');
            $table->string('stock')->nullable();
            
            $table->string('brand')->nullable();
            $table->integer('quantity');

            $table->string('file_keywords')->nullable();
            $table->text('file_description')->nullable();
            $table->string('file_status')->nullable();

            $table->string('urlfolder')->nullable();

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
