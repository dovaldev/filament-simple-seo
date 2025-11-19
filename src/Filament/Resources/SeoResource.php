<?php

namespace Dovaldev\FilamentSimpleSeo\Filament\Resources;

use Dovaldev\FilamentSimpleSeo\Models\Seo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\EditRecord;

class SeoResource extends Resource
{
    protected static ?string $model = Seo::class;

    protected static ?string $navigationGroup = 'SEO';

    protected static ?string $navigationIcon = 'heroicon-o-magnifying-glass';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')->maxLength(255),
            Forms\Components\Textarea::make('description')->rows(3),
            Forms\Components\Toggle::make('index'),
            Forms\Components\Toggle::make('follow'),
            Forms\Components\Toggle::make('status'),
            Forms\Components\TextInput::make('seoable_type')->maxLength(255),
            Forms\Components\TextInput::make('seoable_id')->numeric()->minValue(1),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('description')->limit(50),
                Tables\Columns\IconColumn::make('index')->boolean(),
                Tables\Columns\IconColumn::make('follow')->boolean(),
                Tables\Columns\IconColumn::make('status')->boolean(),
                Tables\Columns\TextColumn::make('seoable_type')->label('Modelo')->sortable(),
                Tables\Columns\TextColumn::make('seoable_id')->label('ID')->sortable(),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSeos::route('/'),
            'create' => Pages\CreateSeo::route('/create'),
            'edit' => Pages\EditSeo::route('/{record}/edit'),
        ];
    }
}

namespace Dovaldev\FilamentSimpleSeo\Filament\Resources\SeoResource\Pages;

use Dovaldev\FilamentSimpleSeo\Filament\Resources\SeoResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\EditRecord;

class ListSeos extends ListRecords
{
    protected static string $resource = SeoResource::class;
}

class CreateSeo extends CreateRecord
{
    protected static string $resource = SeoResource::class;
}

class EditSeo extends EditRecord
{
    protected static string $resource = SeoResource::class;
}