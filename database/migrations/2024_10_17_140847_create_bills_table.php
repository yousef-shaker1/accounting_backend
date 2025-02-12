<?php


use App\Enums\Bill_Recurs;
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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained('tenants')->onDelete('cascade');
            $table->foreignId('business_id')->constrained('businesses')->onDelete('cascade');
            $table->foreignId('contact_id')->constrained('contacts')->onDelete('cascade');
            $table->integer('reference');
            $table->date('bill_date');
            $table->date('due_on');
            $table->foreignId('currency_id')->nullable()->constrained()->nullOnDelete();
            $table->enum('is_tax_included', ['including', 'excluding'])->default('excluding');
            $table->text('comment')->nullable();
            $table->enum('item_category_type', ['single', 'multiple'])->default('single');
            $table->foreignId('business_category_id')->nullable()->constrained()->nullOnDelete()->cascadeOnUpdate();
            $table->integer('total_price');
            $table->enum('bill_recurs',  Bill_Recurs::toArray());
            $table->string('file')->nullable();
            $table->string('attachment_description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
