<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id()->comment('ID заявки');
            $table->string('customer_name')->comment('ФИО покупателя');
            $table->string('status')
                ->default('pending')
                ->comment('Возможные значения: pending, completed');
            $table->decimal('total_price', 10, 2)->comment('Итоговая цена заявки');
            $table->foreignId('item_id')->constrained('items')->onDelete('cascade'); // Связь с таблицей товаров
            $table->text('description')->nullable();
            $table->timestamps(); // created_at и updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
};
