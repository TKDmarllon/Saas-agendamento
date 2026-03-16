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
    Schema::create('tenants', function (Blueprint $table) {
        $table->id();

        $table->string('name');
        $table->string('slug')->unique();

        $table->string('logo')->nullable();
        $table->string('banner')->nullable();

        $table->string('primary_color')->nullable();
        $table->string('secondary_color')->nullable();

        $table->string('plan')->default('free');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
