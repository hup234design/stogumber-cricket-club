<?php

namespace Hup234design\Cms\Filament\Resources;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Hup234design\Cms\Filament\Resources\SliderResource\Pages;
use Hup234design\Cms\Filament\Resources\SliderResource\RelationManagers;
use Hup234design\Cms\Models\Slider;
use Filament\Resources\Resource;

class SliderResource extends Resource
{
    protected static ?string $model = Slider::class;

    protected static ?string $navigationIcon = 'heroicon-o-view-columns';
    protected static ?string $navigationGroup = 'Site Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required(),
                Textarea::make('description')
                    ->rows(3),
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->toggleable()
                    ->toggledHiddenByDefault(),
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('slides_count')->counts('slides'),
                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->since(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->toggleable()
                    ->toggledHiddenByDefault(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make()
                    ->slideOver(),
                DeleteAction::make()
                    ->slideOver(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\SlidesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSliders::route('/'),
            'edit' => Pages\EditSlider::route('/{record}/edit'),
        ];
    }
}
