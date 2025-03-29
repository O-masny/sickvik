<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('galleries', function (Blueprint $table) {
            $table->dropColumn(['file_name', 'slider_image', 'detail_image']);
        });
    }

    public function down(): void
    {
        Schema::table('galleries', function (Blueprint $table) {
            $table->string('file_name');
            $table->string('slider_image')->nullable();
            $table->string('detail_image')->nullable();
        });
    }
};
