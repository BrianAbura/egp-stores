<?php

use App\Models\items;
use App\Models\User;
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
        Schema::create('item_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(items::class);
            $table->integer('quantity');
            $table->string('receiver');
            $table->string('issued_by');
            $table->foreignIdFor(User::class);
            $table->enum('transaction_type', ['Issue', 'Return']);
            $table->integer('issue_id')->nullable();
            $table->integer('for_return');
            $table->date('issue_date');
            $table->date('return_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_transactions');
    }
};
