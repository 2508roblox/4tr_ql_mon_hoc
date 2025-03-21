<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::dropIfExists('attendance');
        
        Schema::create('attendance', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->unsignedTinyInteger('week'); // Tuần điểm danh (1-12)
            $table->date('date'); // Ngày điểm danh thực tế
            $table->boolean('status')->default(false); // Điểm danh: true là có mặt, false là vắng
            $table->timestamps();

            // Thêm unique constraint để đảm bảo mỗi sinh viên chỉ có một bản ghi điểm danh cho mỗi tuần trong một khóa học
            $table->unique(['student_id', 'course_id', 'week']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('attendance');
        
        Schema::create('attendance', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }
}; 