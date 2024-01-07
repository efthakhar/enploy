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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique();
            $table->date('joining_date')->nullable();
            $table->foreignId('department_id')->nullable()
                ->constrained('departments')->restrictOnDelete()->cascadeOnUpdate();
            $table->foreignId('designation_id')->nullable()
                ->constrained('designations')->restrictOnDelete()->cascadeOnUpdate();
            $table->foreignId('shift_id')->nullable()
                ->constrained('shifts')->restrictOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_id')->nullable()
                ->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
