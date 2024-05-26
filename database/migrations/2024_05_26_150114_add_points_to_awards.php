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
        Schema::table('awards', function (Blueprint $table) {
            $table->boolean('has_points')->default(false)->after('order');
            $table->integer('points')->nullable()->after('has_points');
        });

        Schema::table('achievements', function (Blueprint $table) {
            $table->integer('points')->nullable()->after('date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('achievements', function (Blueprint $table) {
            $table->dropColumn('points');
        });

        Schema::table('awards', function (Blueprint $table) {
            $table->dropColumn('has_points');
            $table->dropColumn('points');
        });
    }
};
