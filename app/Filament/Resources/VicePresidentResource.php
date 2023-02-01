<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VicePresidentResource\Pages;
use App\Filament\Resources\VicePresidentResource\RelationManagers;
use App\Models\VicePresident;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class VicePresidentResource extends Resource
{
    protected static ?string $model = VicePresident::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Custom Content';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
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
                    ->searchable(['name'])
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('up')
                    ->action(fn (VicePresident $record) => $record->moveOrderUp())
                    ->icon('heroicon-o-arrow-up')
                    ->label(''),
                Tables\Actions\Action::make('down')
                    ->action(fn (VicePresident $record) => $record->moveOrderDown())
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
            'index' => Pages\ListVicePresidents::route('/'),
            'create' => Pages\CreateVicePresident::route('/create'),
            'edit' => Pages\EditVicePresident::route('/{record}/edit'),
        ];
    }
}
