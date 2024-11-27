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
        Schema::create('client_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullabe();
            $table->string('photo')->nullabe();
            $table->string('email')->nullabe();
            $table->string('mobile')->nullabe();
            $table->string('date_of_birth')->nullabe();
            $table->string('nid')->nullabe();
            $table->string('address')->nullabe();
            $table->string('notes')->nullabe();
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
        Schema::dropIfExists('client_infos');
    }
};
