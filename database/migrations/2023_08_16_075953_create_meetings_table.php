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
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->string('corporate_name');
            $table->string('voen');
            $table->string('person_name');

            $table->string('person_phone');
            $table->string('address');
            $table->string('sender');

            $table->string('activity_area');
            $table->string('payment_condition');
            $table->string('date');

            $table->string('meeting_date');
            $table->string('meeting_time');
            $table->string('meeting_type');

            $table->string('service_offer');
            $table->string('source');
            $table->string('meeting_person');

            $table->string('meeting_progress');
            $table->string('note');
            $table->string('price_offer');

            $table->string('service_offer_file');
            $table->string('protocol');
            $table->string('protocol_file');

            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meetings');
    }
};
