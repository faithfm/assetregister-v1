<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateMobileDevicesStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobile_devices_status', function (Blueprint $table) {
            $table->id();
            $table->string('imei',15)->default('');
            $table->string('fsn',13)->nullable();
            $table->string('type',30)->nullable();
            $table->string('iccid',20)->default('');
            $table->string('imsi',15)->nullable();
            $table->string('plmn',5)->nullable();
            $table->string('operator',20)->nullable();
            $table->string('host',20)->nullable();
            $table->string('lac',6)->nullable();
            $table->string('cellid',6)->nullable();
            $table->string('band',20)->nullable();
            $table->string('bandlock',20)->nullable();
            $table->integer('rssi')->nullable();
            $table->string('temp',4)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            $table->unique(['imei','iccid']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mobile_devices_status');
    }
}
