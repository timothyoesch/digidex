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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('uuid');
            $table->enum('status', ['pending','active', 'inactive'])->default('active');
            $table->foreignId('user_id')->constrained();
            $table->string('image')->nullable();
            $table->string('name');
        });

        $fields = json_decode(file_get_contents(__DIR__ . "/../../install/default_fields.json", true));
        foreach ($fields as $field) {
            addField($field);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
