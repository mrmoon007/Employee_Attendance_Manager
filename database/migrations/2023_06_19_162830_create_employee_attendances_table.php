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
        Schema::create('employee_attendances', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id')->nullable()->index();
            $table->date('date')->nullable();
            $table->date('check_in_time')->nullable();
            $table->date('check_out_time')->nullable();
            $table->string('status', 45)->index()->comment('Present / Adsent / Late');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_attendances');
    }
};
