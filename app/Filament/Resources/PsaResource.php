<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PsaResource\Pages;
use App\Filament\Resources\PsaResource\RelationManagers;
use App\Models\Psa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PsaResource extends Resource
{
    protected static ?string $model = Psa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('patient_id')
                                        ->required()
                                        ->maxLength(255),
                Forms\Components\DatePicker::make('date_of_test')
                                                ->required(), 
                                                
                Forms\Components\TextInput::make('psa_level')
                                        ->required(),
                Forms\Components\TextInput::make('reference_range')
                                        ->required()
                                        ->maxLength(50),

                Forms\Components\TextInput::make('age')
                                        ->required(),

                Forms\Components\TextInput::make('race_ethnicity')
                                        ->required()
                                        ->maxLength(50),

                Forms\Components\Textarea::make('family_history')
                                        ->nullable(),

                Forms\Components\Textarea::make('medical_history')
                                        ->nullable(),

                Forms\Components\Textarea::make('medications')
                                        ->nullable(),

                Forms\Components\Textarea::make('symptomatology')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('patient_id')->searchable(),
                Tables\Columns\TextColumn::make('date_of_test')->searchable(),
                Tables\Columns\TextColumn::make('psa_level')->searchable(),
                Tables\Columns\TextColumn::make('reference_range')->searchable(),
                Tables\Columns\TextColumn::make('age')->searchable(),
                
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
            'index' => Pages\ListPsas::route('/'),
            'create' => Pages\CreatePsa::route('/create'),
            'edit' => Pages\EditPsa::route('/{record}/edit'),
        ];
    }
}
