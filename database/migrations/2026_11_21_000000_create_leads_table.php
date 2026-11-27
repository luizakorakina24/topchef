<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('form_id', 50)->nullable();       // какая форма отправила заявку
            $table->string('page')->nullable();              // со страницы
            $table->string('locale', 5)->nullable();         // язык страницы (ru/en)
            $table->string('service_type', 20)->nullable();  // delivery / catering / buffet
            $table->string('name', 100)->nullable();
            $table->string('phone', 20);
            $table->string('email')->nullable();
            $table->date('event_date')->nullable();
            $table->string('budget', 100)->nullable();
            $table->text('comment')->nullable();
            $table->unsignedSmallInteger('portions')->nullable();
            $table->string('address')->nullable();
            $table->string('delivery_time', 100)->nullable();
            $table->string('menu_type', 20)->nullable();
            $table->string('event_type', 50)->nullable();
            $table->unsignedSmallInteger('guests')->nullable();
            $table->string('format', 50)->nullable();
            $table->string('venue')->nullable();
            $table->string('staff', 50)->nullable();
            $table->string('ip', 45)->nullable();
            $table->string('user_agent')->nullable();
            $table->timestamp('mailed_at')->nullable();     // когда ушло письмо менеджеру
            $table->timestamps();

            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
