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
        Schema::table('weights', function (Blueprint $table) {
            // == add weight_range after customer_id
            $table->string('weight_range')->nullable()->after('customer_id')->comment('
            1. 0.01 - 250(g),
            2. 251 - 500(g),
            3. 1 (Kg),
            ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('weights', function (Blueprint $table) {
            $table->dropColumn('weight_range');
        });
    }
};
