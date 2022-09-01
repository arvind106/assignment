<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRouterDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('router_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Sapid',18)->unique()->nullable();
            $table->string('Hostname',14)->nullable();
            $table->integer('Loopback')->unsigned()->nullable();
            $table->string('MacAddress',17)->nullable();
            $table->string('ResponseTime',20)->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('router_details');        
    }
}
