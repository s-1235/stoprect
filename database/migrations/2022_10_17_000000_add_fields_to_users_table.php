<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('plan_id')->nullable();
            $table->string('paypal_plan_id')->nullable();
            $table->string('user_type')->nullable();
            $table->integer('code')->nullable();
            $table->text('status')->nullable();
            $table->string('plan_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropColumns('users',[
            'plan_id',
            'paypal_plan_id',
            'user_type',
            'code',
            'status',
        ]);
    }
}
