<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DreResource\Pages;
use App\Filament\Resources\DreResource\RelationManagers;
use App\Models\Dre;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DreResource extends Resource
{
    protected static ?string $model = Dre::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('patient_id')
                                        ->required()
                                        ->maxLength(255),
                Forms\Components\DatePicker::make('date_of_exam')
                                                ->required(), 
                                                
                Forms\Components\Toggle::make('nodule_presence')
                                        ->inline(false)
                                        ->required(),

                            //Toggle::make('is_admin')
                Forms\Components\Toggle::make('tenderness')
                                            ->inline(false)
                                        ->required(),

                Forms\Components\TextInput::make('symmetry')
                                        ->required()
                                        ->maxLength(255),

                Forms\Components\TextInput::make('patient_symptoms')
                                        ->required()    
                                        ->maxLength(255),
                Forms\Components\Textarea::make('findings')
                                        ->required()
                                        ->maxLength(255),
                Forms\Components\Textarea::make('recommendations') 
                                            ->required()
                                            ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('patient_id')->searchable(),
                Tables\Columns\TextColumn::make('date_of_exam'),
                Tables\Columns\TextColumn::make('nodule_presence'),
                Tables\Columns\TextColumn::make('tenderness'),
                Tables\Columns\TextColumn::make('symmetry'),
                Tables\Columns\TextColumn::make('patient_symptoms'),
                Tables\Columns\TextColumn::make('findings'),
                Tables\Columns\TextColumn::make('recommendations'),
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
            'index' => Pages\ListDres::route('/'),
            'create' => Pages\CreateDre::route('/create'),
            'edit' => Pages\EditDre::route('/{record}/edit'),
        ];
    }
}
