<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Tables\Columns\StatusColumn;
use App\Models\Category;
use App\Models\Product;
use App\Enums\ProductStatus;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('category_id')
                    ->options(Category::all()->pluck('name', 'id'))
                    ->searchable()
                    ->preload()
                    ->required()
                    ->relationship('category', 'name'),
                Forms\Components\TextInput::make('name')->required()->unique(ignoreRecord:true),
                Forms\Components\Select::make('status')->options(ProductStatus::class)->required(),
                Forms\Components\TextInput::make('image_url'),
                Forms\Components\TextInput::make('description'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                TextColumn::make('category.name')->badge(),
                Tables\Columns\TextColumn::make('name'),
                StatusColumn::make('status'),
                Tables\Columns\TextColumn::make('image_url')->copyable(),
                Tables\Columns\TextColumn::make('description')->copyable(),
            ])
            ->filters([
                //
                Tables\Filters\SelectFilter::make('category')
                    ->options(Category::all()->pluck('name', 'id')
                    ),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
