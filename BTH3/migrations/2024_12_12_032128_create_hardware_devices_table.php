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
        Schema::create('hardware_devices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('device_name');
            $table->enum('type', ['Mouse', 'Keyboard', 'Headset']);
            $table->boolean('status')->default(true);
            $table->unsignedBigInteger('center_id');
            $table->foreign('center_id')->references('id')->on('it_centers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hardware_devices');
    }
};
