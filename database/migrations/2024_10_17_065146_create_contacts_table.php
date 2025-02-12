<?php

use App\Enums\Country;
use App\Enums\Language;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained('tenants')->onDelete('cascade');
            $table->foreignId('business_id')->constrained('businesses')->onDelete('cascade')->nullable();
            $table->string('name');
            $table->string('organisation');
            $table->string('email')->unique()->nullable();
            $table->string('billing_email')->unique()->nullable();
            $table->string('telephone')->nullable();
            $table->string('mobile_number')->nullable();
            $table->text('address')->nullable();
            $table->string('town')->nullable();
            $table->string('region')->nullable();
            $table->string('zip_code')->nullable();
            $table->enum('country', Country::toArray());
            $table->integer('default_payment_terms')->nullable();
            $table->boolean('contact_level_email')->default(0);
            $table->boolean('contact_level_invoice')->default(0);
            $table->boolean('display_contact_name')->default(0);
            $table->integer('sales_tax_registration_number')->nullable();
            $table->enum('invoice_language', Language::toArray());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
