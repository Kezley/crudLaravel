<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('CPF')->unique();;
            $table->string('phone');
            $table->string('birthdate');
            $table->foreignId('donation_interval_id')->nullable()->constrained('donations_interval');
            $table->string('address');
            $table->string('donation_amount');
            $table->foreignId('payment_id')->nullable()->constrained('payments');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donors');
    }
}
