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
        Schema::table('shipments', function (Blueprint $table) {
            $table->string('shipper_country')->nullable()->after('shipper_address');
            $table->string('shipper_state')->nullable()->after('shipper_country');
            $table->string('shipper_city')->nullable()->after('shipper_state');
            $table->string('shipper_zipcode')->nullable()->after('shipper_city');
            $table->string('receiver_country')->nullable()->after('receiver_address');
            $table->string('receiver_state')->nullable()->after('receiver_country');
            $table->string('receiver_city')->nullable()->after('receiver_state');
            $table->string('receiver_zipcode')->nullable()->after('receiver_city');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shipments', function (Blueprint $table) {
            $table->dropColumn(['shipper_country', 'shipper_state', 'shipper_city', 'shipper_zipcode', 'receiver_country', 'receiver_state', 'receiver_city', 'receiver_zipcode']);
        });
    }
};
