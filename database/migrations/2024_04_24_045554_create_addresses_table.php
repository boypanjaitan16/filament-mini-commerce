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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained(table: 'users', indexName: 'address_user_id')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('label', 255);
            $table->string('recipient_name', 255);
            $table->string('recipient_phone_number');
            $table->unsignedInteger('province_id');
            $table->unsignedInteger('city_id');
            $table->string('district_name', 255);
            $table->text('street_name');
            $table->integer('postal_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
