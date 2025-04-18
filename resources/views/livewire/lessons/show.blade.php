<div>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $lesson->title }} - {{ $course->course_name }} | Quản lý môn học Khoa Máy tàu biển</title>
        <meta name="description" content="Học {{ $lesson->title }} trong khóa học {{ $course->course_name }}. Khám phá nội dung chi tiết, tài liệu học tập và bài tập thực hành">
        <meta name="keywords" content="{{ $lesson->title }}, {{ $course->course_name }}, bài học trực tuyến, học online, {{ $course->creator->name }}, môn học mkt">
        <meta name="author" content="MKT Subject Management">
        <meta property="og:title" content="{{ $lesson->title }} - {{ $course->course_name }} | Quản lý môn học Khoa Máy tàu biển">
        <meta property="og:description" content="Học {{ $lesson->title }} trong khóa học {{ $course->course_name }}. Khám phá nội dung chi tiết, tài liệu học tập và bài tập thực hành">
        <meta property="og:type" content="article">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:image" content="{{ asset('storage/' . $course->image) }}">
        <meta name="robots" content="index, follow">
        <link rel="canonical" href="{{ url()->current() }}" />
        <meta property="article:published_time" content="{{ $lesson->created_at->toIso8601String() }}">
        <meta property="article:modified_time" content="{{ $lesson->updated_at->toIso8601String() }}">
        <meta property="article:section" content="{{ $course->category->name ?? 'Môn học' }}">
        <meta property="article:tag" content="{{ $lesson->title }}, {{ $course->course_name }}, học online">
    </head>
    <body class="rbt-header-sticky">

        <div class="rbt-lesson-area bg-color-white">
            <div class="rbt-lesson-content-wrapper">
                <div class="rbt-lesson-leftsidebar">
                    <div class="rbt-course-feature-inner rbt-search-activation">
                        <div class="section-title">
                            <h4 class="rbt-title-style-3">Nội dung môn học</h4>
                        </div>
    
                        <div class="lesson-search-wrapper">
                            <form action="#" class="rbt-search-style-1">
                                <input wire:model.live.debounce.500ms="searchQuery" class="rbt-search-active" type="text" placeholder="Tìm kiếm bài học">
                                <button class="search-btn disabled"><i class="feather-search"></i></button>
                            </form>
                            @if($searchQuery)
                                <div class="mt-2 text-muted">
                                    Tìm thấy {{ $lessons->count() }} kết quả
                                </div>
                            @endif
                        </div>
    
                        <hr class="mt--10">
    
                        <div class="rbt-accordion-style rbt-accordion-02 for-right-content accordion">
    
    
                            <div class="accordion" id="accordionExampleb2">
                                @foreach($lessons as $index => $lessonItem)
                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="heading{{ $lessonItem->id }}">
                                        <button style="flex-direction: row; justify-content: space-between;" class="accordion-button {{ $lesson->id == $lessonItem->id ? '' : 'collapsed' }}" 
                                                type="button" 
                                                data-bs-toggle="collapse" 
                                                data-bs-target="#collapse{{ $lessonItem->id }}" 
                                                aria-expanded="{{ $lesson->id == $lessonItem->id ? 'true' : 'false' }}" 
                                                aria-controls="collapse{{ $lessonItem->id }}">
                                            {{ $lessonItem->title }} 
                                            <span class="rbt-badge-5 ml--10" style="text-wrap: nowrap;">
                                                {{ isset($completedResourcesCount[$lessonItem->id]) ? $completedResourcesCount[$lessonItem->id]['completed'] : 0 }}/{{ isset($completedResourcesCount[$lessonItem->id]) ? $completedResourcesCount[$lessonItem->id]['total'] : $lessonItem->lessonResources->count() }}</span>
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $lessonItem->id }}" 
                                         class="accordion-collapse collapse {{ $lesson->id == $lessonItem->id ? 'show' : '' }}" 
                                         aria-labelledby="heading{{ $lessonItem->id }}">
                                        <div class="accordion-body card-body">
                                            <ul class="rbt-course-main-content liststyle">
                                                @foreach($lessonItem->lessonResources as $resource)
                                                <li>
                                                    <a href="{{ route('lessons.show', ['lesson' => $lessonItem->id, 'lesson_resource_id' => $resource->id]) }}" 
                                                       class="{{ $currentResource && $currentResource->id == $resource->id ? 'active' : '' }}">
                                                        <div class="course-content-left">
                                                            @php
                                                                $extension = pathinfo($resource->file_path, PATHINFO_EXTENSION);
                                                            @endphp
                                                            
                                                            @if(in_array($extension, ['pdf', 'doc', 'docx', 'txt']))
                                                                <i class="feather-file-text"></i>
                                                            @elseif(in_array($extension, ['jpg', 'png', 'gif', 'jpeg']))
                                                                <i class="feather-image"></i>
                                                            @elseif(in_array($extension, ['mp4', 'mkv', 'avi']))
                                                                <i class="feather-play-circle"></i>
                                                            @elseif(in_array($extension, ['zip', 'rar']))
                                                                <i class="feather-archive"></i>
                                                            @else
                                                                <i class="feather-file"></i>
                                                            @endif
                                                            <span class="text">{{ $resource->name }}</span>
                                                        </div>
                                                        <div class="course-content-right">
                                                            @if(App\Models\StudentLearningHistory::isCompleted(Auth::guard('student')->id(), $resource->id))
                                                                <span class="rbt-check completed"><i class="feather-check"></i></span>
                                                            @elseif($currentResource && $currentResource->id == $resource->id)
                                                                <span class="rbt-check current"><i class="feather-check"></i></span>
                                                            @else
                                                                <span class="rbt-check unread"><i class="feather-circle"></i></span>
                                                            @endif
                                                        </div>
                                                    </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
    
    
                        </div>
                    </div>
                </div>
    
                <div class="rbt-lesson-rightsidebar overflow-hidden lesson-video">
                    <div class="lesson-top-bar">
                        <div class="lesson-top-left">
                            <div class="rbt-lesson-toggle">
                                <button class="lesson-toggle-active btn-round-white-opacity" title="Toggle Sidebar"><i
                        class="feather-arrow-left"></i></button>
                            </div>
                            <h5>{{ $lesson->title }}</h5>
                        </div>
                        <div class="lesson-top-right">
                            <div class="rbt-btn-close">
                                <a href="{{ route('courses.show', ['slug' => $course->slug]) }}" title="Quay lại khóa học" class="rbt-round-btn"><i class="feather-x"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="inner">
                        @if($currentResource)
                            @php
                                $extension = pathinfo($currentResource->file_path, PATHINFO_EXTENSION);
                            @endphp
                            
                            @if(in_array($extension, ['mp4', 'mkv', 'avi']))
                                <div class="plyr__video-embed rbtplayer" style="position: relative; width: 100%; padding-top: 56.25%;">
                                    <video controls style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                                        <source src="{{ asset('storage/' . $currentResource->file_path) }}" type="video/{{ $extension }}">
                                        Trình duyệt của bạn không hỗ trợ video.
                                    </video>
                                </div>
                            @elseif(in_array($extension, ['pdf']))
                                <div class="pdf-viewer" style="width: 100%; height: calc(100vh - 200px);">
                                    <iframe src="{{ asset('storage/' . $currentResource->file_path) }}" style="width: 100%; height: 100%; border: none;"></iframe>
                                </div>
                            @elseif(in_array($extension, ['jpg', 'png', 'gif', 'jpeg']))
                                <div class="image-viewer" style="width: 100%; max-height: calc(100vh - 200px); overflow: auto;">
                                    <img src="{{ asset('storage/' . $currentResource->file_path) }}" alt="{{ $currentResource->name }}" class="img-fluid" style="width: 100%; height: auto;">
                                </div>
                            @elseif($extension == 'doc')
                                <div class="doc-viewer" style="width: 100%; height: calc(100vh - 200px);">
                                    <iframe src='https://view.officeapps.live.com/op/embed.aspx?src={{ urlencode(asset('storage/' . $currentResource->file_path)) }}' 
                                            width='100%' 
                                            height='100%' 
                                            frameborder='0'>
                                        This is an embedded <a target='_blank' href='http://office.com'>Microsoft Office</a> document, powered by <a target='_blank' href='http://office.com/webapps'>Office Online</a>.
                                    </iframe>
                                    <div class="mt-3">
                                        <a href="{{ asset('storage/' . $currentResource->file_path) }}" class="rbt-btn btn-primary" download>
                                            <i class="feather-download"></i> Tải xuống {{ $currentResource->name }}
                                        </a>
                                    </div>
                                </div>
                            @elseif($extension == 'docx')
                                <div class="docx-viewer" style="width: 100%; height: calc(100vh - 200px); overflow: auto; padding: 20px; background: #f8f9fa; border-radius: 5px;">
                                    @php
                                        $phpWord = \PhpOffice\PhpWord\IOFactory::load(storage_path('app/public/' . $currentResource->file_path));
                                        $htmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
                                        $htmlContent = $htmlWriter->getContent();
                                        
                                        // Đếm số trang bằng cách đếm số lần xuất hiện của class page-break
                                        $totalPages = substr_count($htmlContent, 'page-break') + 1;
                                        
                                        // Cắt nội dung để chỉ hiển thị 4 trang đầu
                                        $htmlContent = preg_replace('/<div class="page-break">/i', '<div class="page-break" data-page="', $htmlContent);
                                        $htmlContent = preg_replace('/<\/div>/i', '"></div>', $htmlContent);
                                        
                                        // Tìm vị trí của trang thứ 5 (nếu có)
                                        $pos = strpos($htmlContent, 'data-page="5"');
                                        if ($pos !== false) {
                                            $htmlContent = substr($htmlContent, 0, $pos);
                                        }
                                    @endphp
                                    <style>
                                        .docx-content img {
                                            max-width: 100% !important;
                                            height: auto !important;
                                            display: block;
                                            margin: 10px auto;
                                        }
                                        .docx-content table img {
                                            max-width: 100% !important;
                                            height: auto !important;
                                        }
                                    </style>
                                    <div class="docx-content" style="background: white; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                                        {!! $htmlContent !!}
                                    </div>
                                    @if($totalPages > 4)
                                        <div class="alert alert-info mt-3">
                                            <i class="feather-info"></i> Hiển thị 4 trang đầu tiên trong tổng số {{ $totalPages }} trang. Vui lòng tải xuống file để xem đầy đủ.
                                        </div>
                                    @endif
                                    <div class="mt-3">
                                        <a href="{{ asset('storage/' . $currentResource->file_path) }}" class="rbt-btn btn-primary" download>
                                            <i class="feather-download"></i> Tải xuống {{ $currentResource->name }}
                                        </a>
                                    </div>
                                </div>
                            @elseif(in_array($extension, ['txt']))
                                <div class="text-viewer" style="width: 100%; height: calc(100vh - 200px); overflow: auto; padding: 20px; background: #f8f9fa; border-radius: 5px;">
                                    <pre style="white-space: pre-wrap; font-family: inherit; margin: 0;">{{ file_get_contents(storage_path('app/public/' . $currentResource->file_path)) }}</pre>
                                </div>
                            @elseif($extension == 'xlsx')
                                <div class="excel-viewer" style="width: 100%; height: calc(100vh - 200px); overflow: auto;">
                                    @php
                                        $xlsx = new \Shuchkin\SimpleXLSX(storage_path('app/public/' . $currentResource->file_path));
                                        $rows = $xlsx->rows();
                                        $headers = array_shift($rows);
                                        $totalRows = count($rows);
                                        $displayRows = array_slice($rows, 0, 30);
                                    @endphp
                                    <div class="excel-content" style="background: white; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                                        <div style="overflow-x: auto;">
                                            <table style="min-width: 100%; border-collapse: collapse;">
                                                <thead>
                                                    <tr>
                                                        @foreach($headers as $header)
                                                            <th style="white-space: nowrap; padding: 10px; border: 1px solid #dee2e6; background: #f8f9fa;">{{ $header }}</th>
                                                        @endforeach
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($displayRows as $row)
                                                        <tr>
                                                            @foreach($row as $cell)
                                                                <td style="white-space: nowrap; padding: 10px; border: 1px solid #dee2e6;">{{ $cell }}</td>
                                                            @endforeach
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        @if($totalRows > 30)
                                            <div class="alert alert-info mt-3">
                                                <i class="feather-info"></i> Hiển thị 30 dòng đầu tiên trong tổng số {{ $totalRows }} dòng. Vui lòng tải xuống file để xem đầy đủ.
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @elseif($extension == 'pptx')
                                <div class="powerpoint-viewer" style="width: 100%; height: calc(100vh - 200px); display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                    <div class="alert alert-info">
                                        <i class="feather-info"></i> File PowerPoint không thể xem trực tiếp. Vui lòng tải xuống để xem.
                                    </div>
                                    <div class="mt-3">
                                        <a href="{{ asset('storage/' . $currentResource->file_path) }}" class="rbt-btn btn-primary" download>
                                            <i class="feather-download"></i> Tải xuống {{ $currentResource->name }}
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div class="file-download">
                                    <a href="{{ asset('storage/' . $currentResource->file_path) }}" class="rbt-btn btn-primary" download>
                                        <i class="feather-download"></i> Tải xuống {{ $currentResource->name }}


                                    </a>
                                </div>
                            @endif
                        @endif
                        <div class="content">
                            <div class="section-title">
                                <h4>{{ $currentResource ? $currentResource->name : 'Chưa có tài liệu' }}</h4>
                                <p>{{ $currentResource ? $currentResource->description : '' }}</p>
                            </div>
                        </div>
                    </div>
    
                    <div class="bg-color-extra2 ptb--15 overflow-hidden">
                        <div class="rbt-button-group">
                            @php
                                $prevResource = $lesson->lessonResources()->where('id', '<', $currentResource->id)->orderBy('id', 'desc')->first();
                                $nextResource = $lesson->lessonResources()->where('id', '>', $currentResource->id)->orderBy('id', 'asc')->first();
                            @endphp

                            @if($prevResource)
                                <a class="rbt-btn icon-hover icon-hover-left btn-md bg-primary-opacity" href="{{ route('lessons.show', ['lesson' => $lesson->id, 'lesson_resource_id' => $prevResource->id]) }}">
                                    <span class="btn-icon"><i class="feather-arrow-left"></i></span>
                                    <span class="btn-text">Trước</span>
                                </a>
                            @endif

                            @if($currentResource)
                                <a href="{{ asset('storage/' . $currentResource->file_path) }}" class="rbt-btn btn-md bg-primary-opacity" download>
                                    <span class="btn-icon"><i class="feather-download"></i></span>
                                    <span class="btn-text">Tải tài liệu</span>
                                </a>
                            @endif

                            @if($nextResource)
                                <a class="rbt-btn icon-hover btn-md" href="{{ route('lessons.show', ['lesson' => $lesson->id, 'lesson_resource_id' => $nextResource->id]) }}">
                                    <span class="btn-text">Tiếp theo</span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                </a>
                            @endif
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    
    
        <div class="rbt-progress-parent">
            <svg class="rbt-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>

        <!-- Modal Điểm Danh -->
        @if($showAttendanceModal)
        <div class="modal fade show" style="display: block; background: rgba(0,0,0,0.5);" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Điểm Danh Tuần {{ $currentWeek }}</h5>
                        <button type="button" class="btn-close" wire:click="$set('showAttendanceModal', false)"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <i class="feather-check-circle text-success" style="font-size: 48px;"></i>
                            <h4 class="mt-3">Chúc mừng bạn đã hoàn thành khóa học!</h4>
                            <p class="text-muted">Bạn có thể điểm danh cho tuần {{ $currentWeek }} của môn học {{ $course->course_name }}</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="rbt-btn btn-secondary" wire:click="$set('showAttendanceModal', false)">Đóng</button>
                        <button type="button" class="rbt-btn btn-primary" wire:click="markAttendance">
                            <i class="feather-check"></i> Điểm Danh
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endif
     
    </body>
    </html>
</div>
