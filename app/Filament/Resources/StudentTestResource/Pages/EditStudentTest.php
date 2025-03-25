<?php

namespace App\Filament\Resources\StudentTestResource\Pages;

use App\Filament\Resources\StudentTestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStudentTest extends EditRecord
{
    protected static string $resource = StudentTestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
