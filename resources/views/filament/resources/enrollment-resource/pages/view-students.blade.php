<x-filament-panels::page>
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <h2 class="text-lg font-medium">Danh sách sinh viên - {{ $record->course_name }}</h2>
            <x-filament::button
                wire:click="$dispatch('open-modal', { id: 'create-enrollment' })"
                type="button"
            >
                Thêm sinh viên
            </x-filament::button>
        </div>

        {{ $this->table }}
    </div>

    <x-filament::modal
        id="create-enrollment"
        width="md"
        :heading="'Thêm sinh viên vào lớp ' . $record->course_name"
    >
        <form wire:submit="createEnrollment" class="space-y-4">
            <x-filament::select
                wire:model="student_id"
                label="Chọn sinh viên"
                :options="\App\Models\Student::pluck('full_name', 'id')"
                searchable
                required
            />

            <div class="flex justify-end">
                <x-filament::button type="submit">
                    Thêm sinh viên
                </x-filament::button>
            </div>
        </form>
    </x-filament::modal>
</x-filament-panels::page> 