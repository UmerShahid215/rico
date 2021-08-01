<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('parent_id')->nullable();
            $table->string('profile_pic')->nullable();
            $table->timestamp('date');
            $table->string('tl_name');
            $table->string('agent_name');
            $table->string('customer_name');
            $table->string('company_name');
            $table->string('cell_phone');
            $table->string('home_phone')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('service_type');
            $table->string('billing_ac_number');
            $table->string('reference')->nullable();
            $table->string('ssn');
            $table->timestamp('dob')->nullable();
            $table->string('per_month')->nullable();
            $table->string('total_to_pay');
            $table->string('receivable');
            $table->text('comment')->nullable();
            $table->text('complete_address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip_code')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('forms');
    }
}
