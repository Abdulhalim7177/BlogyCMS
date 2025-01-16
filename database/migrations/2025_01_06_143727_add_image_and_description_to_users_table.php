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
        Schema::table('users', function (Blueprint $table) {
            // Adding new columns to the users table
            $table->string('image')->nullable(); // Adding the image column (nullable if you want to allow empty entries)
            $table->text('description')->nullable(); // Adding the description column (nullable if you want to allow empty entries)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Dropping the columns if the migration is rolled back
            $table->dropColumn(['image', 'description']);
        });
    }
};
