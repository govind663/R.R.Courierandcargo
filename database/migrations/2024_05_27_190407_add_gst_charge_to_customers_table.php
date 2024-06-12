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
        Schema::table('customers', function (Blueprint $table) {
            // === Add Fuel Surcharge after gst_no
            $table->integer('fuel_surcharge')->nullable()->after('gst_no');
            // === Add IGST after fuel_surcharge
            $table->integer('igst')->nullable()->after('fuel_surcharge');
            // === Add SGST after igst
            $table->integer('sgst')->nullable()->after('igst');
            // === Add CGST after sgst
            $table->integer('cgst')->nullable()->after('sgst');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn(['fuel_surcharge', 'igst', 'sgst', 'cgst']);
        });
    }
};
