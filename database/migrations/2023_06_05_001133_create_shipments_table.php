<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_id')->unique();
            $table->string('shipper_name');
            $table->string('shipper_phone_number');
            $table->string('shipper_address');
            $table->string('receiver_name');
            $table->string('receiver_phone_number');
            $table->string('receiver_address');
            $table->string('package_name');
            $table->enum('package_type', ['Parcel', 'Box', 'Cargo', 'Electronic', 'Grocery']);
            $table->decimal('package_weight', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
