<?php

use App\Enums\Country;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('address')->nullable();
            $table->string('town', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('zip_code', 10)->nullable();
            $table->string('phone', 20)->nullable();
            $table->foreignId('business_category_id')->nullable()->constrained()->nullOnDelete()->cascadeOnUpdate();
            $table->enum('country', Country::toArray());
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('step_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
