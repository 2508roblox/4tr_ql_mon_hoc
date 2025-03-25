<div>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lịch Sử Kiểm Tra | Quản lý môn học Khoa Máy tàu biển</title>
        <meta name="description" content="Xem lịch sử các bài kiểm tra đã nộp - Theo dõi tiến độ học tập và kết quả kiểm tra">
        <meta name="keywords" content="lịch sử kiểm tra, bài kiểm tra, kết quả học tập, quản lý môn học, môn học mkt">
        <meta name="author" content="MKT Subject Management">
        <meta property="og:title" content="Lịch Sử Kiểm Tra | Quản lý môn học Khoa Máy tàu biển">
        <meta property="og:description" content="Xem lịch sử các bài kiểm tra đã nộp - Theo dõi tiến độ học tập và kết quả kiểm tra">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta name="robots" content="noindex, nofollow">
        <link rel="canonical" href="{{ url()->current() }}" />
    </head>
    <body>
        <div id="my_switcher" class="my_switcher">
            <ul>
                <li>
                    <a href="javascript: void(0);" data-theme="light" class="setColor light">
                        <img src="/assets/images/about/sun-01.svg" alt="Sun images"><span title="Light Mode"> Light</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" data-theme="dark" class="setColor dark">
                        <img src="/assets/images/about/vector.svg" alt="Vector Images"><span title="Dark Mode"> Dark</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="rbt-page-banner-wrapper">
            <div class="rbt-banner-image"></div>
        </div>

        <div class="rbt-dashboard-area rbt-section-overlayping-top rbt-section-gapBottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <livewire:dashboard.student-info />

                        <div class="row g-5">
                            <div class="col-lg-3">
                                <livewire:dashboard.student-sidebar />
                            </div>

                            <div class="col-lg-9">
                                <div class="rbt-dashboard-content bg-color-white rbt-shadow-box">
                                    <div class="content">
                                        <div class="section-title">
                                            <h4 class="rbt-title-style-3">Lịch sử kiểm tra</h4>
                                        </div>

                                        <div class="rbt-dashboard-table table-responsive mobile-table-750">
                                            <table class="rbt-table table table-borderless">
                                                <thead>
                                                    <tr>
                                                        <th>Môn học</th>
                                                        <th>Thời gian nộp</th>
                                                        <th>Điểm số</th>
                                                        <th>Nhận xét</th>
                                                        <th>Thao tác</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($tests as $test)
                                                    <tr>
                                                        <th>
                                                            <span class="b3">
                                                                <a href="{{ route('courses.show', $test->course->slug) }}">
                                                                    {{ $test->course->course_name }}
                                                                </a>
                                                            </span>
                                                        </th>
                                                        <td>
                                                            {{ $test->submitted_at->format('d/m/Y H:i') }}
                                                        </td>
                                                        <td>
                                                            @if($test->score)
                                                                <span class="badge bg-success">{{ number_format($test->score, 1) }}</span>
                                                            @else
                                                                <span class="badge bg-warning text-dark">Chưa chấm</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <p class="b2">{{ $test->comment ?? 'Không có' }}</p>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex gap-2">
                                                                @if($test->file_path)
                                                                    <a href="{{ asset('storage/' . $test->file_path) }}" 
                                                                       class="btn btn-sm btn-outline-primary"
                                                                       download>
                                                                        <i class="feather-download"></i>
                                                                    </a>
                                                                @endif
                                                                @if($test->image)
                                                                    <a href="{{ asset('storage/' . $test->image) }}" 
                                                                       class="btn btn-sm btn-outline-info"
                                                                       target="_blank">
                                                                        <i class="feather-image"></i>
                                                                    </a>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @empty
                                                    <tr>
                                                        <td colspan="5" class="text-center">
                                                            <p class="text-muted">Chưa có bài kiểm tra nào</p>
                                                        </td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="mt-4">
                                            @if ($tests->hasPages())
                                            <nav class="rbt-pagination d-flex justify-content-center align-items-center">
                                                <ul class="page-list d-flex align-items-center">
                                                    {{-- Previous Page Link --}}
                                                    @if ($tests->onFirstPage())
                                                        <li class="disabled">
                                                            <span class="page-link d-flex align-items-center justify-content-center">
                                                                <i class="feather-chevron-left"></i>
                                                            </span>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <a class="page-link d-flex align-items-center justify-content-center" href="#" wire:click.prevent="previousPage">
                                                                <i class="feather-chevron-left"></i>
                                                            </a>
                                                        </li>
                                                    @endif

                                                    {{-- Pagination Elements --}}
                                                    @foreach ($tests->getUrlRange(1, $tests->lastPage()) as $page => $url)
                                                        <li class="{{ $page == $tests->currentPage() ? 'active' : '' }}">
                                                            <a class="page-link" href="#" wire:click.prevent="gotoPage({{ $page }})">
                                                                {{ $page }}
                                                            </a>
                                                        </li>
                                                    @endforeach

                                                    {{-- Next Page Link --}}
                                                    @if ($tests->hasMorePages())
                                                        <li>
                                                            <a class="page-link d-flex align-items-center justify-content-center" href="#" wire:click.prevent="nextPage">
                                                                <i class="feather-chevron-right"></i>
                                                            </a>
                                                        </li>
                                                    @else
                                                        <li class="disabled">
                                                            <span class="page-link d-flex align-items-center justify-content-center">
                                                                <i class="feather-chevron-right"></i>
                                                            </span>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </nav>
                                            @endif
                                        </div>

                                        <style>
                                            .page-list .page-link {
                                                width: 32px;
                                                height: 32px;
                                                padding: 0;
                                                margin: 0 4px;
                                                border-radius: 4px;
                                                font-size: 14px;
                                            }
                                            .page-list .page-link i {
                                                font-size: 16px;
                                            }
                                            .page-list .disabled .page-link {
                                                opacity: 0.5;
                                                cursor: not-allowed;
                                            }
                                        </style>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="rbt-separator-mid">
            <div class="container">
                <hr class="rbt-separator m-0">
            </div>
        </div>

        <div class="rbt-progress-parent">
            <svg class="rbt-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
    </body>
</div>
