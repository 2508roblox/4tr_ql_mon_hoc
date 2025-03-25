@php
    $state = $getState();
@endphp

@if ($state)
    <div class="flex flex-col gap-2">
        <img src="{{ asset('storage/' . $state) }}" 
             alt="Hình ảnh đính kèm"
             class="w-32 h-32 object-cover rounded-lg shadow-sm" />
             
        <a href="{{ asset('storage/' . $state) }}" 
           class="text-primary-600 hover:text-primary-500"
           target="_blank">
            <div class="flex items-center gap-2">
                <x-heroicon-o-photo class="w-5 h-5" />
                <span>Xem hình ảnh</span>
            </div>
        </a>
    </div>
@else
    <div class="text-gray-500">
        Không có hình ảnh đính kèm
    </div>
@endif 