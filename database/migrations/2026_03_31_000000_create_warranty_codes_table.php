<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('warranty_codes', function (Blueprint $table) {
            $table->id();
            $table->string('code', 5)->unique();
            $table->string('owner_name')->nullable();
            $table->enum('status', ['available', 'used'])->default('available');
            $table->timestamp('used_at')->nullable();
            $table->foreignId('warranty_id')->nullable()->constrained('warranties')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('warranty_codes');
    }
};
