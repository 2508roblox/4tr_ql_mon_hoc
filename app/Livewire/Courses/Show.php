<?php

namespace App\Livewire\Courses;

use Livewire\Component;
use App\Models\Course;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use App\Models\Grade;
use Livewire\WithFileUploads;

class Show extends Component
{
    use WithFileUploads;
    public $course;
    public $feedbacks;
    public $lessons;
    public $relatedCourses;
    public $averageRating;
    public $ratingPercentages;
    public $grades = [];
    public $gradeData = [];
    public $showAttendanceModal = false;
    public $attendances;

    public $rating = 1; // Mặc định là 5 sao
    public $understand = false;
    public $comment = '';
    public $isEnrolled = false; // Kiểm tra trạng thái đăng ký
    public $enrollmentStatus = null; // Lưu trạng thái đăng ký (0: chờ duyệt, 1: đã duyệt)

    public $showGradesModal = false;
    public $showGradeViewer = false;
    public $selectedGrade = null;

    public $showTestModal = false;
    public $testFile;
    public $testImage;
    public $submittedTests;

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
        $this->isEnrolled = $alreadyEnrolled;
        
        if ($alreadyEnrolled) {
            session()->flash('enrolled', 'Bạn đã tham gia khóa học này.');
            return;
        }

        // Đăng ký khóa học với trạng thái chờ duyệt
        \App\Models\Enrollment::create([
            'student_id' => $studentId,
            'course_id' => $this->course->id,
            'status' => 0 // 0: Chờ duyệt
        ]);

        session()->flash('enrolled', 'Bạn đã đăng ký khóa học thành công! Vui lòng chờ giảng viên duyệt.');
    }
    public function mount($slug)
    {
        $this->course = Course::where('slug', $slug)
            ->with(['creator', 'students', 'feedbacks', 'materials', 'grades'])
            ->firstOrFail(); 

        $this->feedbacks = $this->course->feedbacks()->latest()->get();
        $this->lessons = $this->course->materials()->latest()->get();
        $this->grades = $this->course->grades()->latest()->get();
        
        // Xử lý dữ liệu Excel cho mỗi bảng điểm
        foreach ($this->grades as $grade) {
            try {
                $xlsx = new \Shuchkin\SimpleXLSX(storage_path('app/public/' . $grade->file_path));
                if ($xlsx) {
                    $rows = $xlsx->rows();
                    $headers = array_shift($rows);
                    $this->gradeData[$grade->id] = [
                        'headers' => $headers,
                        'rows' => $rows
                    ];
                }
            } catch (\Exception $e) {
                $this->gradeData[$grade->id] = [
                    'headers' => [],
                    'rows' => []
                ];
            }
        }

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
        $enrollment = \App\Models\Enrollment::where('student_id', $studentId)
            ->where('course_id', $this->course->id)
            ->first();
            
        $this->isEnrolled = !is_null($enrollment);
        $this->enrollmentStatus = $enrollment ? $enrollment->status : null;

        // Load attendances for current student if enrolled
        if (Auth::guard('student')->check()) {
            $this->attendances = \App\Models\Attendance::where('student_id', Auth::guard('student')->id())
                ->where('course_id', $this->course->id)
                ->get();
        }

        // Load submitted tests for current student if enrolled
        if (Auth::guard('student')->check()) {
            $this->submittedTests = \App\Models\StudentTest::where('student_id', Auth::guard('student')->id())
                ->where('course_id', $this->course->id)
                ->orderBy('submitted_at', 'desc')
                ->take(6)
                ->get();
        }
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

    public function showGrades()
    {
        if (!$this->isEnrolled) {
            session()->flash('error', 'Bạn cần tham gia khóa học để xem bảng điểm.');
            return;
        }

        $this->grades = Grade::where('course_id', $this->course->id)
            ->orderBy('created_at', 'desc')
            ->get();
        $this->showGradesModal = true;
    }

    public function closeGradesModal()
    {
        $this->showGradesModal = false;
        $this->grades = [];
    }

    public function viewGrade($gradeId)
    {
        $this->selectedGrade = Grade::find($gradeId);
        $this->showGradeViewer = true;
    }

    public function closeGradeViewer()
    {
        $this->showGradeViewer = false;
        $this->selectedGrade = null;
    }

    public function markAttendance($week)
    {
        if (!Auth::guard('student')->check()) {
            return;
        }

        $courseStartDate = \Carbon\Carbon::parse($this->course->created_at);
        $weekStartDate = $courseStartDate->copy()->addWeeks($week - 1);
        $weekEndDate = $weekStartDate->copy()->addDays(6);
        $currentDate = \Carbon\Carbon::now();

        // Kiểm tra xem có trong tuần hiện tại không
        if (!$currentDate->between($weekStartDate, $weekEndDate)) {
            $this->dispatch('notify', [
                'type' => 'error',
                'message' => 'Bạn chỉ có thể điểm danh trong tuần hiện tại!'
            ]);
            return;
        }

        // Tạo hoặc cập nhật điểm danh
        $attendance = \App\Models\Attendance::updateOrCreate(
            [
                'student_id' => Auth::guard('student')->id(),
                'course_id' => $this->course->id,
                'week' => $week,
            ],
            [
                'status' => 1,
                'date' => now(),
            ]
        );

        // Refresh danh sách điểm danh
        $this->attendances = \App\Models\Attendance::where('student_id', Auth::guard('student')->id())
            ->where('course_id', $this->course->id)
            ->get();

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => 'Điểm danh thành công!'
        ]);
    }

    public function submitTest()
    {
        $this->validate([
            'testFile' => 'required|file|mimes:doc,docx|max:10240', // max 10MB
            'testImage' => 'nullable|image|max:5120', // max 5MB
        ]);

        $filePath = $this->testFile->store('tests', 'public');
        $imagePath = null;

        if ($this->testImage) {
            $imagePath = $this->testImage->store('tests/images', 'public');
        }

        \App\Models\StudentTest::create([
            'course_id' => $this->course->id,
            'student_id' => Auth::guard('student')->id(),
            'file_path' => $filePath,
            'image' => $imagePath,
            'submitted_at' => now(),
        ]);

        // Refresh danh sách bài đã nộp
        $this->submittedTests = \App\Models\StudentTest::where('student_id', Auth::guard('student')->id())
            ->where('course_id', $this->course->id)
            ->orderBy('submitted_at', 'desc')
            ->get();

        // Reset form
        $this->reset(['testFile', 'testImage']);

        session()->flash('message', 'Nộp bài thành công!');
    }

    public function render()
    {
        $submittedTests = collect();
        
        if (Auth::guard('student')->check()) {
            $submittedTests = \App\Models\StudentTest::where('student_id', Auth::guard('student')->id())
                ->where('course_id', $this->course->id)
                ->orderBy('submitted_at', 'desc')
                ->take(6)
                ->get();
        }

        return view('livewire.courses.show', [
            'course' => $this->course,
            'feedbacks' => $this->feedbacks,
            'lessons' => $this->lessons,
            'relatedCourses' => $this->relatedCourses,
            'averageRating' => $this->averageRating,
            'ratingPercentages' => $this->ratingPercentages,
            'submittedTests' => $submittedTests,
        ]);
    }
}
