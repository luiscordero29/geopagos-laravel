<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersConstraints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('favorites', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('favorite_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::table('users_payments', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('payment_id')->references('id')->on('payments')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('favorites', function (Blueprint $table) {
            $table->dropForeign('favorites_user_id_foreign');
            $table->dropForeign('favorites_favorite_id_foreign');
        });
        Schema::table('users_payments', function (Blueprint $table) {
            $table->dropForeign('users_payments_user_id_foreign');
            $table->dropForeign('users_payments_payment_id_foreign');
        });
    }
}
