<?php

use App\Enums\DateFormatEnum;
use App\Enums\UnitEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('country_options', function (Blueprint $table) {
            $table->id();
            $table->enum('date_format', DateFormatEnum::toArray())->default(DateFormatEnum::DMY);
            $table->foreignId('currency_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('timezone_id')->nullable()->constrained()->nullOnDelete();
            $table->enum('unit', UnitEnum::toArray())->default(UnitEnum::KG);
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('country_options');
    }
};
