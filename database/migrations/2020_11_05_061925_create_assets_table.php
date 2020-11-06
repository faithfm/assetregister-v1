<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('tag',16)->default('')->nullable();
            $table->string('location',40)->default('')->nullable();
            $table->string('type',40)->default('')->nullable();
            $table->string('make',40)->default('')->nullable();
            $table->string('model',100)->default('')->nullable();
            $table->string('identifier',100)->default('')->nullable();
            $table->string('supplier',50)->default('')->nullable();
            $table->string('supply_date',60)->default('')->nullable();
            $table->string('serial_no',40)->default('')->nullable();
            $table->string('other_ids',100)->default('')->nullable();
            $table->string('invoice_no',20)->default('')->nullable();
            $table->timestamp('created_at')->useCurrent();
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
        Schema::dropIfExists('assets');
    }
}
