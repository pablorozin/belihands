<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\Product;
use App\Models\ProductType;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\ProductCategory;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProductResource\Pages;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Checkbox::make('is_active')
                    ->columnSpan(2)
                    ->label('¿Está activo?')
                    ->inline(),
                Checkbox::make('is_new')
                    ->columnSpan(2)
                    ->label('¿Es nuevo?')
                    ->inline(),
                Checkbox::make('is_bestseller')
                    ->columnSpan(2)
                    ->label('¿Es de los más vendidos?')
                    ->inline(),
                TextInput::make('name')
                    ->label('Nombre')
                    ->required(),
                TextInput::make('code')
                    ->label('Código')
                    ->required(),
                Select::make('product_type_id')
                    ->label('Tipo')
                    ->options(ProductType::all()->pluck('name', 'id'))
                    ->searchable(),
                Select::make('product_category_id')
                    ->label('Categoría')
                    ->options(ProductCategory::all()->pluck('name', 'id'))
                    ->searchable(),
                Textarea::make('description')
                    ->label('Descripción'),
                Textarea::make('keywords')
                    ->label('Palabras clave para búsqueda'),
                TextInput::make('offer_price')
                    ->label('Precio promocional')
                    ->numeric(),
                FileUpload::make('image')
                    ->label('Imagen')
                    ->image(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nombre'),
                TextColumn::make('type.name')
                    ->label('Tipo'),
                TextColumn::make('category.name')
                    ->label('Categoría'),
                TextColumn::make('code')
                    ->label('Código'),
            ])
            ->filters([
                Filter::make('type')
                    ->form([
                        Select::make('product_type_id')
                            ->label('Tipo')
                            ->options(ProductType::all()->pluck('name', 'id'))
                            ->searchable(),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['product_type_id'],
                                fn (Builder $query, $product_type_id): Builder => $query->where('product_type_id', '>=', $product_type_id),
                            );
                    })
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
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
