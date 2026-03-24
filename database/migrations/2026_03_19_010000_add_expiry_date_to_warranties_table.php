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
        Schema::table('warranties', function (Blueprint $table) {
            if (! Schema::hasColumn('warranties', 'expiry_date')) {
                $table->timestamp('expiry_date')->nullable()->after('warranty_date');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('warranties', function (Blueprint $table) {
            if (Schema::hasColumn('warranties', 'expiry_date')) {
                $table->dropColumn('expiry_date');
            }
        });
    }
};
