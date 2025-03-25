@php
    $state = $getState();
@endphp

@if ($state)
    <div class="flex items-center gap-2">
        <a href="{{ asset('storage/' . $state) }}" 
           class="text-primary-600 hover:text-primary-500"
           target="_blank"
           download>
            <div class="flex items-center gap-2">
                <x-heroicon-o-document class="w-5 h-5" />
                <span>Tải xuống bài làm</span>
            </div>
        </a>
    </div>
@else
    <div class="text-gray-500">
        Không có tệp đính kèm
    </div>
@endif 