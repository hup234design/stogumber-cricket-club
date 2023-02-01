<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClubOfficerResource\Pages;
use App\Filament\Resources\ClubOfficerResource\RelationManagers;
use App\Models\ClubOfficer;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class ClubOfficerResource extends Resource
{
    protected static ?string $model = ClubOfficer::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Custom Content';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('role')
                    ->required()
                    ->maxLength(255),
                Textarea::make('content')
                    ->label('Description')
                    ->nullable()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable(['name'])
                    ->searchable(['name']),
                Tables\Columns\TextColumn::make('role')
                    ->sortable(['role'])
                    ->searchable(['role'])
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('up')
                    ->action(fn (ClubOfficer $record) => $record->moveOrderUp())
                    ->icon('heroicon-o-arrow-up')
                    ->label(''),
                Tables\Actions\Action::make('down')
                    ->action(fn (ClubOfficer $record) => $record->moveOrderDown())
                    ->icon('heroicon-o-arrow-down')
                    ->label(''),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListClubOfficers::route('/'),
            'create' => Pages\CreateClubOfficer::route('/create'),
            'edit' => Pages\EditClubOfficer::route('/{record}/edit'),
        ];
    }
}
