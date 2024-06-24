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
        Schema::table('parcels', function (Blueprint $table) {
            // add within_mumbai/thane, surface column after destination
            $table->integer('within_mumbai_thane')->nullable()->after('destination')->comment('1. Within Maharashtra, 2. Metro, 3. Rest of India, 4. Special Zones');
            // add surface column after within_mumbai_thane
            $table->integer('surface')->nullable()->after('within_mumbai_thane')->comment('1. AIR, 2. Urgent');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('parcels', function (Blueprint $table) {
            $table->dropColumn(['within_mumbai_thane', 'surface']);
        });
    }
};
