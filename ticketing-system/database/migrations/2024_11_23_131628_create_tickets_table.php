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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->uuid('user_uuid');
            $table->foreignId('package_id')->constrained();
            $table->string('stripe_subscription_id');
            $table->tinyInteger('is_unlimited')->default(false);
            $table->integer('available_pass');
            $table->tinyInteger('is_in_used')->default(false);
            $table->timestamp('start_time');
            $table->timestamp('end_time');
            $table->string('status');
            $table->timestamp('valid_until');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
