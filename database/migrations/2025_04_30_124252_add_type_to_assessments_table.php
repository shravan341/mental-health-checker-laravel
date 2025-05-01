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
        Schema::table('assessments', function (Blueprint $table) {
            $table->string('type')->default('general')->after('user_id');
            // Drop the old enum column
            $table->dropColumn('result');
        });

        Schema::table('assessments', function (Blueprint $table) {
            // Add the new string column
            $table->string('result')->after('answers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('assessments', function (Blueprint $table) {
            $table->dropColumn('type');
            // Drop the new string column
            $table->dropColumn('result');
        });

        Schema::table('assessments', function (Blueprint $table) {
            // Restore the original enum column
            $table->enum('result', ['Good', 'Moderate', 'Needs Attention'])->after('answers');
        });
    }
};
