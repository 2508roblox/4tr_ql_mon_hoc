<div>
    <div class="rbt-search-dropdown" wire:ignore.self>
        <div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="rbt-form-group">
                        <input type="text" wire:model.live="search" placeholder="Bạn đang tìm kiếm môn học gì?">
                    </div>
                </div>
            </div>
    
            @if($showResults && $search)
                <div class="rbt-separator-mid">
                    <hr class="rbt-separator m-0">
                </div>
    
                <div class="search-results mt--20">
                    @if(count($courses) > 0)
                        <div class="row">
                            @foreach($courses->take(3) as $course)
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="search-result-card" wire:click="selectCourse('{{ $course->slug }}')" >
                                        <div class="thumbnail">
                                            @if($course->image)
                                                <img src="{{ Storage::url($course->image) }}" alt="{{ $course->course_name }}">
                                            @else
                                                <img src="/assets/images/course/course-01.jpg" alt="{{ $course->course_name }}">
                                            @endif
                                        </div>
                                        <div class="content">
                                            <h6 class="title">{{ $course->course_name }}</h6>
                                            <p class="description">{!! Str::limit($course->description, 100) !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="no-results">
                            <p>Không tìm thấy môn học nào phù hợp.</p>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>
    
    <style>
    .search-result-card {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        margin-bottom: 20px;
        cursor: pointer;
        transition: transform 0.3s;
    }
    
    .search-result-card:hover {
        transform: translateY(-5px);
    }
    
    .search-result-card .thumbnail {
        width: 100%;
        height: 160px;
    }
    
    .search-result-card .thumbnail img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        border-radius: 8px 8px 0 0;
    }
    
    .search-result-card .content {
        padding: 15px;
    }
    
    .search-result-card .title {
        margin: 0;
        font-size: 18px;
        font-weight: 700;
        color: #333;
    }
    
    .search-result-card .description {
        margin: 10px 0 0;
        font-size: 14px;
        color: #666;
        line-height: 1.4;
    }
    
    .no-results {
        padding: 20px;
        text-align: center;
        color: #666;
    }
    </style> 
</div>