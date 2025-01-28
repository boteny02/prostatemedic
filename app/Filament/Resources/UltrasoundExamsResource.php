<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UltrasoundExamsResource\Pages;
use App\Filament\Resources\UltrasoundExamsResource\RelationManagers;
use App\Models\UltrasoundExams;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UltrasoundExamsResource extends Resource
{
    protected static ?string $model = UltrasoundExams::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('patient_id')
                                        ->required()
                                        ->maxLength(255),
                Forms\Components\DatePicker::make('date_of_ultrasound')
                ->required(),
                Forms\Components\TextInput::make('user_id')
                                       # ->options(
                                        #    UltrasoundExams::getUsers()
                                        #)
                                        ->nullable(),
                Forms\Components\Select::make('type_of_ultrasound')
                ->options([
                                            'Transrectal' => 'Transrectal',
                                            'Transabdominal' => 'Transabdominal',
                                        ])
                                        ->required(),
                Forms\Components\TextInput::make('prostate_volume')
                                        ->nullable(),
                Forms\Components\Textarea::make('anatomical_features')
                ->nullable(),
                Forms\Components\Textarea::make('lesion_characteristics')
                ->nullable(),
                Forms\Components\Textarea::make('fluid_presence')
                ->nullable(),
                Forms\Components\Textarea::make('vascularity')
                ->nullable(),
                Forms\Components\Textarea::make('composite_findings')
                ->nullable(),
                Forms\Components\Textarea::make('recommendations')
                ->nullable(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('patient_id')->searchable(),
                Tables\Columns\TextColumn::make('date_of_ultrasound'),
                Tables\Columns\TextColumn::make('type_of_ultrasound'),
                Tables\Columns\TextColumn::make('prostate_volume'),
                Tables\Columns\TextColumn::make('anatomical_features'),
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
            'index' => Pages\ListUltrasoundExams::route('/'),
            'create' => Pages\CreateUltrasoundExams::route('/create'),
            'edit' => Pages\EditUltrasoundExams::route('/{record}/edit'),
        ];
    }
}
