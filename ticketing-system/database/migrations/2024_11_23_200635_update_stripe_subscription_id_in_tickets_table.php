<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->string('stripe_subscription_id')->nullable()->change();
            $table->timestamp('start_time')->nullable()->change();
            $table->timestamp('end_time')->nullable()->change();
            $table->timestamp('valid_until')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->string('stripe_subscription_id')->nullable(false)->change();
            $table->timestamp('start_time')->nullable(false)->change();
            $table->timestamp('end_time')->nullable(false)->change();
            $table->timestamp('valid_until')->nullable(false)->change();
        });
    }
};
