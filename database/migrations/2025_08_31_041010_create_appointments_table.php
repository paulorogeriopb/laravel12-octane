<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('time_slots', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('time');
            $table->tinyInteger('status')->default(0); // 0: liberada, 1: reservada, 2: paga
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); // cliente que reservou
            $table->timestamps();

            $table->unique(['date', 'time']); // evita duplicidade de slots
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('time_slots');
    }
};
