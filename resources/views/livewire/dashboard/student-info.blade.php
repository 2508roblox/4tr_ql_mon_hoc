<div>
    <div class="rbt-dashboard-content-wrapper">
        <div class="tutor-bg-photo bg_image bg_image--23 height-350" style="background-image: url('{{ asset('assets/cover1.png') }}'); background-size: cover; background-position: right; "></div>
        <!-- Start Tutor Information  -->
        <div class="rbt-tutor-information">
            <div class="rbt-tutor-information-left">
                <div class="thumbnail rbt-avatars size-lg">
                    <img src="/assets/2afdbc3aab8c8b066d95f812f91df33e.jpg" alt="Instructor">
                </div>
                <div class="tutor-content">
                    <h5 class="title">{{ $student->full_name }}</h5>
                    <ul class="rbt-meta rbt-meta-white mt--5">
                        <li><i class="feather-book"></i>{{ $totalCourses }} Khóa học đã tham gia</li>
                    </ul>
                </div>
            </div>
            <div class="rbt-tutor-information-right">
                <div class="tutor-btn">
                    <a class="rbt-btn btn-md hover-icon-reverse" href="#">
                        <span class="icon-reverse-wrapper">
                            <span class="btn-text">Become an Instructor</span>
                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <!-- End Tutor Information  -->
    </div>
</div> 