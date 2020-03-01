<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyHasContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_has_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('video');
            $table->integer('sort_id')->nullable();
            $table->boolean('is_active')->default(1);
            $table->integer('company_id')->unsigned(); // fk to categories
            $table->foreign('company_id')->references('id')->on('companies');
            $table->integer('created_by')->unsigned(); // fk to users
            $table->foreign('created_by')->references('id')->on('users');
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('company_has_contacts');
    }
}
