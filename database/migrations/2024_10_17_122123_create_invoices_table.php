<?php


use App\Enums\Status;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained('tenants')->onDelete('cascade');
            $table->foreignId('contact_id')->constrained('contacts')->onDelete('cascade');
            $table->foreignId('business_id')->constrained('businesses')->onDelete('cascade')->nullable();
            $table->integer('invoice_reference');
            $table->date('invoice_date');
            $table->integer('payment_terms');
            $table->foreignId('currency_id')->nullable()->constrained()->nullOnDelete();
            $table->text('additional_text')->nullable();
            $table->decimal('invoice_discount', 5, 2)->nullable();
            $table->string('custom_contact_name');
            $table->string('custom_payment_terms');
            $table->string('po_reference');
            $table->decimal('amount', 10, 2);
            $table->enum('status',  Status::toArray())->default('draft');
            $table->boolean('is_letterheaded')->default(0);
            $table->boolean('display_project_name')->default(0);
            $table->boolean('display_bic_iban')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
