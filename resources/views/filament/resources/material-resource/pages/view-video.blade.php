<x-filament-panels::page>
    <div class="space-y-4">
        <div class="flex justify-between items-center">
            <div>
                <h3 class="text-lg font-medium">{{ $this->record->title }}</h3>
                <p class="text-sm text-gray-500">{{ $this->record->course->course_name }}</p>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-4">
            @foreach($this->record->lessonResources as $resource)
                <div class="mb-4">
                    <h4 class="text-md font-medium mb-2">{{ $resource->name }}</h4>
                    
                    @php
                        $fileExtension = strtolower(pathinfo($resource->file_path, PATHINFO_EXTENSION));
                        $isVideo = in_array($fileExtension, ['mp4', 'webm', 'ogg']);
                    @endphp

                    @if($isVideo)
                        <video class="w-full rounded-lg" controls>
                            <source src="{{ Storage::url($resource->file_path) }}" type="video/{{ $fileExtension }}">
                            Trình duyệt của bạn không hỗ trợ thẻ video.
                        </video>
                    @else
                        <div class="flex items-center space-x-2">
                            <x-heroicon-o-document-arrow-down class="w-5 h-5 text-gray-500" />
                            <a href="{{ Storage::url($resource->file_path) }}" 
                               class="text-primary-600 hover:text-primary-500"
                               download>
                                Tải xuống file
                            </a>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</x-filament-panels::page> 