<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type')->comment('1=> Infoform 2=> propertiesRequests');
            $table->integer('request_id')->unsigned()->nullable();
            $table->integer('fund_id')->unsigned()->nullable();
            $table->integer('status')->comment('1 => Basic info , 2=> Fund Info , 3 => Property Check , 4=> Done')->default(1);
            $table->string('monthly')->nullable();
            $table->string('timeLeft')->nullable();
            $table->string('paymentLeft')->nullable();
            $table->string('payCheckFile')->nullable();
            $table->string('Bank')->nullable();
            $table->string('property')->nullable();
            $table->dateTime('dateToVisit')->nullable();

            $table->foreign('fund_id')->references('id')->on('info_forms')->onDelete('cascade');
            $table->foreign('request_id')->references('id')->on('properties_requests')->onDelete('cascade');
            $table->unique(['fund_id','request_id']);

            $table->text('bank1')->nullable();
            $table->text('bank2')->nullable();
            $table->text('bank3')->nullable();
            $table->text('bank4')->nullable();
            $table->text('bank5')->nullable();
            $table->text('bank6')->nullable();
            $table->text('bank7')->nullable();
            
            $table->integer('delegate_id')->unsigned()->nullable();
            $table->foreign('delegate_id')->references('id')->on('delegates')->onDelete('cascade');

            $table->text('details')->nullable();

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
        Schema::dropIfExists('client_infos');
    }
}
