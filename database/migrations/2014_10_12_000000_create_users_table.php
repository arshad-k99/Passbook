<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('guardian_name')->nullable();
            $table->integer('role');
            $table->integer('class')->nullable();
            $table->integer('division')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

         DB::table('users')->insert(
        array(
            'name' => 'admin',
            'guardian_name'=>'Null',
            'role'=>'1',
            'class'=>'0',
            'division'=>'0',
            'email' => 'pasbook.info@gmail.com',
            'email_verified_at' => \Carbon\Carbon::now(),
            'password' => bcrypt('Mmlps@123'),
            
        )
    );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
