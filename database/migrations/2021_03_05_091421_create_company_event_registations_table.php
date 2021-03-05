<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyEventRegistationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_event_registations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("name");
            $table->uuid('reservation_code')->unique();
            $table->foreignId('company_event_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_event_registations');
    }
}
