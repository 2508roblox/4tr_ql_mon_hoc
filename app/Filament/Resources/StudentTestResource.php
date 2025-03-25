<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentTestResource\Pages;
use App\Filament\Resources\StudentTestResource\RelationManagers;
use App\Models\StudentTest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Support\Enums\FontWeight;
use Illuminate\Support\Facades\Auth;

class StudentTestResource extends Resource
{
    protected static ?string $model = StudentTest::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    
    protected static ?string $navigationGroup = 'Quản Lý Môn Học';
    
    protected static ?string $modelLabel = 'Bài Kiểm Tra';
    
    protected static ?string $pluralModelLabel = 'Bài Kiểm Tra';
    
    protected static ?string $navigationLabel = 'Bài Kiểm Tra';
    
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông tin bài kiểm tra')
                    ->description('Thông tin chi tiết về bài kiểm tra của sinh viên')
                    ->schema([
                        Forms\Components\Select::make('course_id')
                            ->relationship('course', 'course_name')
                            ->required()
                            ->label('Môn học'),
                            
                        Forms\Components\Select::make('student_id')
                            ->relationship('student', 'full_name')
                            ->required()
                            ->searchable()
                            ->label('Sinh viên'),
                            
                        Forms\Components\TextInput::make('score')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(10)
                            ->step(0.1)
                            ->label('Điểm số'),
                            
                        Forms\Components\Textarea::make('comment')
                            ->rows(3)
                            ->label('Nhận xét'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Tệp đính kèm')
                    ->description('Xem tệp bài làm và hình ảnh đính kèm')
                    ->schema([
                        Forms\Components\ViewField::make('file_path')
                            ->view('filament.forms.components.file-link')
                            ->label('Tệp bài làm'),
                            
                        Forms\Components\ViewField::make('image')
                            ->view('filament.forms.components.image-preview')
                            ->label('Hình ảnh đính kèm'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student.full_name')
                    ->searchable()
                    ->sortable()
                    ->label('Sinh viên')
                    ->weight(FontWeight::Bold),
                    
                Tables\Columns\TextColumn::make('course.course_name')
                    ->searchable()
                    ->sortable()
                    ->label('Môn học'),
                    
                Tables\Columns\TextColumn::make('submitted_at')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->label('Thời gian nộp'),
                    
                Tables\Columns\TextColumn::make('score')
                    ->sortable()
                    ->label('Điểm số')
                    ->formatStateUsing(fn ($state) => $state ? number_format($state, 1) : 'Chưa chấm'),
                    
                Tables\Columns\TextColumn::make('comment')
                    ->limit(30)
                    ->label('Nhận xét'),
                    
                Tables\Columns\IconColumn::make('file_path')
                    ->boolean()
                    ->label('Bài làm')
                    ->trueIcon('heroicon-o-document')
                    ->falseIcon('heroicon-o-x-mark'),
                    
                Tables\Columns\IconColumn::make('image')
                    ->boolean()
                    ->label('Hình ảnh')
                    ->trueIcon('heroicon-o-photo')
                    ->falseIcon('heroicon-o-x-mark'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('course')
                    ->relationship('course', 'course_name')
                    ->label('Môn học'),
                    
                Tables\Filters\Filter::make('ungraded')
                    ->query(fn (Builder $query): Builder => $query->whereNull('score'))
                    ->label('Chưa chấm điểm'),
                    
                Tables\Filters\Filter::make('graded')
                    ->query(fn (Builder $query): Builder => $query->whereNotNull('score'))
                    ->label('Đã chấm điểm'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListStudentTests::route('/'),
            'create' => Pages\CreateStudentTest::route('/create'),
            'edit' => Pages\EditStudentTest::route('/{record}/edit'),
        ];
    }
    
    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();
        
        // Nếu là giảng viên, chỉ hiển thị bài test trong các môn học của họ
        if (Auth::user()->role === 'giảng viên') {
            return $query->whereHas('course', function ($query) {
                $query->where('created_by', Auth::id());
            });
        }
        
        return $query;
    }
}
