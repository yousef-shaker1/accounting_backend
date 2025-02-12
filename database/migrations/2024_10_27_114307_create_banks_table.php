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
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained('tenants')->onDelete('cascade');
            $table->string('account_name');
            $table->foreignId('currency_id')->nullable()->constrained()->nullOnDelete();
            $table->enum('status', ['active', 'hidden']);
            $table->boolean('personal_account')->default(0);    
            $table->boolean('primary_account')->default(0);    
            $table->string('bank_name');
            $table->string('account_number');
            $table->string('routing_number');
            $table->boolean('details_on_invoices')->default(0);
            $table->integer('balance');
            $table->boolean('guess_explanations')->default(0);
            $table->integer('sort_code');
            $table->string('iban');
            $table->string('bic');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banks');
    }
};
