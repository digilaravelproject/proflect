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
            if (!Schema::hasColumn('warranties', 'warranty_date')) {
                $table->timestamp('warranty_date')->useCurrent()->after('unique_number');
            }

            // Ensure the warranty number is unique to prevent duplicates.
            if (!Schema::hasColumn('warranties', 'unique_number') || !Schema::hasColumn('warranties', 'id')) {
                return;
            }

            $table->unique('unique_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('warranties', function (Blueprint $table) {
            $table->dropUnique(['unique_number']);

            if (Schema::hasColumn('warranties', 'warranty_date')) {
                $table->dropColumn('warranty_date');
            }
        });
    }
};
