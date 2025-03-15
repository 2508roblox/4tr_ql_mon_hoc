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
        Schema::table('courses', function (Blueprint $table) {
            $table->string('image')->nullable()->after('course_name'); // Ảnh khóa học
            $table->integer('views')->default(0)->after('image'); // Lượt xem
            $table->string('short_description')->nullable()->after('course_name'); // Mô tả ngắn
            $table->text('description')->nullable()->after('views'); // Mô tả khóa học
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade')->after('description'); // Người tạo (Admin)

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            //
        });
    }
};
