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
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('menu_id')
                ->constrained()
                ->onDelete('cascade')
            ;

            $table->string('name');
            $table->string('uri')->nullable();
            $table->string('description')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->integer('sort')->default(0);
            $table->boolean('is_active')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};
