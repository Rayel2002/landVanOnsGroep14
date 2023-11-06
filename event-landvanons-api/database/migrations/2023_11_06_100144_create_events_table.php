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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->dateTime('begin_time', 0);
            $table->dateTime('end_time', 0);
            $table->string('street_name');
            $table->string('house_number');
            $table->string('postal_code');
            $table->integer('amount_of_volunteers_needed');
            $table->text('description');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
