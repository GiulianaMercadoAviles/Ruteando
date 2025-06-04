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
        Schema::create('machines', function (Blueprint $table) {
            $table->id();
            $table->string('serial_number');
            $table->foreignId('type_machine_id')->constrained('types_machines')->onDelete('cascade');
            $table->string('model');
            $table->string('brand');
            $table->foreignId('status_id')->constrained('statuses')->onDelete('cascade');
            $table->string('current_kilometers');
            $table->string('life_kilometers');
            $table->string('maintenance_kilometers_limit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('machines');
    }
};
