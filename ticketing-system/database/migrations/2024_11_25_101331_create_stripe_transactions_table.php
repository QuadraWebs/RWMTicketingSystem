<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('stripe_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('payment_intent_id')->unique();
            $table->string('payment_link')->nullable();
            $table->string('payment_status');
            $table->decimal('total_amount', 10, 2);
            $table->decimal('amount_discount', 10, 2)->default(0.00);
            $table->string('payment_method_type');
            $table->json('metadata')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('ticket_id')->constrained();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stripe_transactions');
    }
};
