<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Adjust the warranty code column length to 5 characters.
        // Use raw SQL to avoid doctrine/dbal dependency.
        DB::statement('ALTER TABLE warranties MODIFY unique_number VARCHAR(5) NOT NULL');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE warranties MODIFY unique_number VARCHAR(4) NOT NULL');
    }
};
