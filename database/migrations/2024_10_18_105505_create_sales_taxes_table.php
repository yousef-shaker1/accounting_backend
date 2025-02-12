<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales_taxes', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_registered')->default(false);
            $table->date('effective_from')->nullable();
            $table->string('name')->nullable();
            $table->decimal('tax_rate', 5, 2)->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_taxes');
    }
};
