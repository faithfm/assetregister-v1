<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('api_token', 80)->after('email')
                ->unique()
                ->nullable()
                ->default(null);
            $table->dropColumn('password');
            $table->string('sub')->after('id')
                ->unique()
                ->nullable()
                ->default(null);
            $table->dropUnique('users_email_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('api_token');
            $table->string('password')->after('email_verified_at');
            $table->dropColumn('sub');
            $table->string('email')->unique();
        });
    }
}
