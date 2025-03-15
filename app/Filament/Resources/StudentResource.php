<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Sinh viên';
    protected static ?string $pluralLabel = 'Sinh viên';
    protected static ?string $slug = 'sinh-vien';
    protected static ?string $modelLabel = 'Sinh viên';
    protected static ?string $navigationGroup = 'Quản lý Học tập';
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Grid::make(2)->schema([
                Section::make('Thông tin sinh viên')
                    ->schema([
                        TextInput::make('student_id')
                            ->label('Mã sinh viên')
                            ->required()
                            ->unique(Student::class, 'student_id')
                            ->maxLength(20)
                            ->columnSpanFull(),

                        TextInput::make('full_name')
                            ->label('Họ và tên')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required()
                            ->unique(Student::class, 'email')
                            ->columnSpanFull(),

                            TextInput::make('password')
                            ->label('Mật khẩu')
                            ->password() // Định dạng ô nhập thành password
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        
                    ])
                    ->columns(1),

                Section::make('Thông tin học tập')
                    ->schema([
                        Select::make('courses')
                            ->label('Khóa học đã đăng ký')
                            ->relationship('courses', 'course_name')
                            ->multiple()
                            ->searchable()
                            ->preload()
                            ->columnSpanFull(),
                    ])
                    ->columns(1),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('student_id')
                ->label('Mã SV')
                ->sortable()
                ->searchable(),

            TextColumn::make('full_name')
                ->label('Họ và tên')
                ->sortable()
                ->searchable(),

            TextColumn::make('email')
                ->label('Email')
                ->sortable()
                ->searchable(),

            BadgeColumn::make('courses_count')
                ->label('Số khóa học')
                ->counts('courses')
                ->sortable(),
        ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
