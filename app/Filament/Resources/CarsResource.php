<?php

namespace App\Filament\Resources;

use App\Models\Car;
use Filament\Forms; 
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CarsResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CarsResource\RelationManagers;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class CarsResource extends Resource
{
    protected static ?string $model = Car::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Cars';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('merk')
                    ->label('Merk')
                    ->options([
                        'Toyota' => 'Toyota',
                        'Mitsubitshi' => 'Mitsubitshi',
                        'Suzuki' => 'Suzuki',
                    ]),
                TextInput::make('model')
                    ->label('Model'),
                Select::make('tahun')
                    ->label('Tahun')
                    ->options(
                        array_combine(
                            range(date('Y'), 2000), 
                            range(date('Y'), 2000)
                        )
                    )
                    ->searchable()
                    ->required(),
                TextInput::make('harga')
                    ->label('Harga'),
                FileUpload::make('gambar')
                    ->image()
                    ->directory('cars')
                    ->label('Gambar')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('merk')
                    ->label('Merk')
                    ->searchable(),
                TextColumn::make('model')
                    ->label('Model')
                    ->searchable(),
                TextColumn::make('tahun')
                    ->label('Tahun'),
                TextColumn::make('harga')
                    ->label('Harga')
                    ->searchable(),
                ImageColumn::make('gambar')
                    ->size(70)
                    ->disk('public') 
                    ->url(fn ($record) => (asset('storage/' . $record->gambar))), 
                TextColumn::make('status')
                    ->label('Status')
                    ->color(fn ($record) => $record->status === 'tersedia' ? 'success' : 'danger')
                    ->badge(),
                
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListCars::route('/'),
            'create' => Pages\CreateCars::route('/create'),
            'edit' => Pages\EditCars::route('/{record}/edit'),
        ];
    }
}
