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
        Schema::table('units', function (Blueprint $table) {
            // add min_weight_range after id
            $table->string('min_weight_range')->nullable()->after('id');
            // add max_weight_range after min_weight_range
            $table->string('max_weight_range')->nullable()->after('min_weight_range');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('units', function (Blueprint $table) {
            $table->dropColumn(['min_weight_range', 'max_weight_range']);
        });
    }
};
