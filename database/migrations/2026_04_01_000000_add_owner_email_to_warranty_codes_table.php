<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('warranty_codes', function (Blueprint $table) {
            $table->string('owner_email')->nullable()->after('owner_name');
        });
    }

    public function down()
    {
        Schema::table('warranty_codes', function (Blueprint $table) {
            $table->dropColumn('owner_email');
        });
    }
};
