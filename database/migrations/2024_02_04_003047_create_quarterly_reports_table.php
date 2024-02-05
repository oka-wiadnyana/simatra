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
        Schema::create('quarterly_reports', function (Blueprint $table) {
            $table->id();
            $table->integer('report_type_id');
            $table->string('quarter');
            $table->string('year');
            $table->text('link');
            $table->integer('satker_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quarterly_reports');
    }
};
