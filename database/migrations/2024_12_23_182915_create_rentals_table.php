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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
           
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('total_cost',8,2);
            $table->enum('status',['Ongoing','Pending','Completed','Cancelled'])->default('Ongoing');
            //Relationship
            $table->foreignId('user_id')->constrained('users')->onDelete('restrict');
            $table->foreignId('car_id')->constrained('cars')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
