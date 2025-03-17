<?php

namespace App\Livewire\Courses;

use Livewire\Component;
use App\Models\Course;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;

class Show extends Component
{
    public $course;
    public $feedbacks;
    public $lessons;
    public $relatedCourses;
    public $averageRating;
    public $ratingPercentages;

    public $rating = 1; // Mặc định là 5 sao
    public $understand = false;
    public $comment = '';
    public $isEnrolled = false; // Kiểm tra trạng thái đăng ký

    public function setRating($value)
    {
        $this->rating = $value;
    }
    public function enrollCourse()
{
    if (!Auth::guard('student')->check()) {
        session()->flash('enrolled', 'Bạn cần đăng nhập để tham gia khóa học.');
        return;
    }

    $studentId = Auth::guard('student')->id();

    // Kiểm tra nếu sinh viên đã tham gia khóa học
    $alreadyEnrolled = \App\Models\Enrollment::where('student_id', $studentId)
        ->where('course_id', $this->course->id)
        ->exists();
        $this->isEnrolled   = $alreadyEnrolled;
    if ($alreadyEnrolled) {
        session()->flash('enrolled', 'Bạn đã tham gia khóa học này.');
        return;
    }

    // Đăng ký khóa học
    \App\Models\Enrollment::create([
        'student_id' => $studentId,
        'course_id' => $this->course->id,
    ]);

    session()->flash('enrolled', 'Bạn đã tham gia khóa học thành công!');
}
    public function mount($slug)
    {
        $this->course = Course::where('slug', $slug)
            ->with(['creator', 'students', 'feedbacks', 'materials'])
            ->firstOrFail(); 

        $this->feedbacks = $this->course->feedbacks()->latest()->get();
        $this->lessons = $this->course->materials()->latest()->get();
        $this->relatedCourses = Course::where('id', '!=', $this->course->id)
            ->inRandomOrder()
            ->limit(3)
            ->get();

        $this->averageRating = $this->feedbacks->avg('rating') ?? 0;
        $totalFeedbacks = $this->feedbacks->count();
        $this->ratingPercentages = [];

        for ($i = 1; $i <= 5; $i++) {
            $count = $this->feedbacks->where('rating', $i)->count();
            $this->ratingPercentages[$i] = $totalFeedbacks > 0 ? round(($count / $totalFeedbacks) * 100) : 0;
        }
        $studentId = Auth::guard('student')->id();
        $alreadyEnrolled = \App\Models\Enrollment::where('student_id', $studentId)
        ->where('course_id', $this->course->id)
        ->exists();
        $this->isEnrolled   = $alreadyEnrolled;
    }

    public function submitFeedback()
    {
        if (!Auth::guard('student')->check()) {
            return; // Không làm gì nếu chưa đăng nhập
        }
        
       

        $this->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        Feedback::create([
            'student_id' => Auth::guard('student')->id(),
            'course_id' => $this->course->id,
            'understand' => $this->understand,
            'comment' => $this->comment,
            'rating' => $this->rating,
        ]);

        session()->flash('message', 'Cảm ơn bạn đã đánh giá!');

        // Reset form sau khi gửi
        $this->reset(['rating', 'understand', 'comment']);

        // Load lại danh sách đánh giá
        $this->feedbacks = $this->course->feedbacks()->latest()->get();
    }

    public function render()
    {
        return view('livewire.courses.show', [
            'course' => $this->course,
            'feedbacks' => $this->feedbacks,
            'lessons' => $this->lessons,
            'relatedCourses' => $this->relatedCourses,
            'averageRating' => $this->averageRating,
            'ratingPercentages' => $this->ratingPercentages,
        ]);
    }
}
