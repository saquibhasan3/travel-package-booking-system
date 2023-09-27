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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('travel_package_id');
            $table->string('name')->nullable();
            $table->string('contact')->nullable();
            $table->date('travel_date')->nullable();
            $table->string('booking_number')->nullable();
            $table->integer('total_person')->default(0);
            $table->decimal('package_price', 10, 2)->default(0);
            $table->decimal('total_amount', 10, 2)->default(0);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('travel_package_id')->references('id')->on('travel_packages')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
