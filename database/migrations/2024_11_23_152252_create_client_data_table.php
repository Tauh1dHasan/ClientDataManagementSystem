<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('client_data', function (Blueprint $table) {
            $table->id();
            $table->integer('client_info_id')->nullabe();
            $table->string('name')->nullabe();
            $table->string('display_name')->nullabe();
            $table->string('note')->nullabe();
            $table->integer('status')->nullabe()->comment('1=active, 2=block');
            $table->integer('created_by')->nullabe();
            $table->integer('updated_by')->nullabe();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_data');
    }
};
