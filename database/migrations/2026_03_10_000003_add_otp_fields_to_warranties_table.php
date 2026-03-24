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
            if (! Schema::hasColumn('warranties', 'otp_code')) {
                $table->string('otp_code', 6)->nullable()->after('unique_number');
            }

            if (! Schema::hasColumn('warranties', 'otp_expires_at')) {
                $table->timestamp('otp_expires_at')->nullable()->after('otp_code');
            }

            if (! Schema::hasColumn('warranties', 'otp_verified_at')) {
                $table->timestamp('otp_verified_at')->nullable()->after('otp_expires_at');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('warranties', function (Blueprint $table) {
            if (Schema::hasColumn('warranties', 'otp_verified_at')) {
                $table->dropColumn('otp_verified_at');
            }

            if (Schema::hasColumn('warranties', 'otp_expires_at')) {
                $table->dropColumn('otp_expires_at');
            }

            if (Schema::hasColumn('warranties', 'otp_code')) {
                $table->dropColumn('otp_code');
            }
        });
    }
};
