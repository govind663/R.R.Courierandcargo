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
            // === weight_range
            $table->dropColumn('weight_range');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('weights', function (Blueprint $table) {
            $table->string('weight_range')->nullable()->comment('Weight Range')->default(null);
        });
    }
};
