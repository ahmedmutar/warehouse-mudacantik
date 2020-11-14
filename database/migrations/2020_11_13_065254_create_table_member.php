<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMember extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('idmember');
            $table->string('ktp');
            $table->string('name');
            $table->date('dob');
            $table->string('email');
            $table->string('phonenumber');
            $table->string('address');
            $table->string('upline');
            $table->string('firstproduct');
            $table->date('joindate');
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
        Schema::dropIfExists('members');
    }
}
