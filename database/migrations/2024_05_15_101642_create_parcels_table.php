<?php

use App\Models\Customer;
use App\Models\Unit;
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
        Schema::create('parcels', function (Blueprint $table) {
            $table->id();
            $table->string('parcel_Id')->nullable()->unique();
            $table->foreignIdFor(Customer::class)->nullable()->index();
            $table->date('pickup_dt')->nullable();
            $table->string('c_note_number')->nullable();
            $table->string('destination')->nullable();
            $table->string('weight')->nullable();
            $table->foreignIdFor(Unit::class)->nullable()->index();
            $table->string('amount')->nullable();
            $table->integer('inserted_by')->nullable();
            $table->timestamp('inserted_at')->nullable();
            $table->integer('modified_by')->nullable();
            $table->timestamp('modified_at')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parcels');
    }
};
