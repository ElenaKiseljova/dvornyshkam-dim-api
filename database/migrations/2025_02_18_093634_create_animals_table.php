<?php

use App\Models\Animal;
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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->enum('category', Animal::CATEGORIES);
            $table->enum('gender', Animal::GENDERS);
            $table->float('weight')->nullable()->comment('NULL: Not set. Number - weight animal in KG');
            $table->date('birthday');
            $table->text('image')->nullable()->default(null)->comment('Main image URL');
            $table->text('images')->nullable()->default(null)->comment('An array of images URLs, joined by ", "');
            $table->boolean('animal_friendly')->nullable()->default(null)->comment('NULL: Not set, FALSE: Not animal friendly, TRUE: Animal friendly');
            $table->boolean('vaccinated')->nullable()->default(null)->comment('NULL: Not set, FALSE: Not vaccinated, TRUE: Vaccinated');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
