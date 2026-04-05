<?php

namespace App\Filament\Resources\BoardingHouses;

use App\Filament\Resources\BoardingHouses\Pages\CreateBoardingHouse;
use App\Filament\Resources\BoardingHouses\Pages\EditBoardingHouse;
use App\Filament\Resources\BoardingHouses\Pages\ListBoardingHouses;
use App\Filament\Resources\BoardingHouses\Schemas\BoardingHouseForm;
use App\Filament\Resources\BoardingHouses\Tables\BoardingHousesTable;
use App\Models\BoardingHouse;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Tables;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\ViewAction;
use UnitEnum;

use Filament\Actions\Action;

use Illuminate\Support\Str; 


class BoardingHouseResource extends Resource
{
    protected static ?string $model = BoardingHouse::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-home-modern';

protected static string|UnitEnum|null $navigationGroup = 'Boarding House Management';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
      return $schema->schema([
        Tabs::make('Tabs')
    ->tabs([
        Tab::make('Informarsi Umum')
            ->schema([
                 Forms\Components\FileUpload::make('thumbnail')
                    ->image()
                    ->disk('public')
                    ->directory('boarding_house')
                    ->visibility('public')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(100)
                    ->debounce(500)
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set){
                        $set('slug', Str::slug($state));
                    }),
                     Forms\Components\TextInput::make('slug')
                    ->required(),
                    Forms\Components\Select::make('city_id')
                    ->relationship('city', 'name')
                    ->required(),
                     Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                     Forms\Components\RichEditor::make('description')
                    ->required(),
                     Forms\Components\TextInput::make('price')
                     ->numeric()
                     ->prefix('Rp.')
                    ->required(),
                     Forms\Components\Textarea::make('address')
                    ->required(),
            ]),
        Tab::make('Bonus Ngekost')
            ->schema([
                Forms\Components\Repeater::make('bonuses')
                ->relationship('bonuses')
                 ->schema([
                    Forms\Components\FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('bonuses')
                    ->visibility('public')
                    ->required(),
                     Forms\Components\TextInput::make('name')
                     ->required(),
                      Forms\Components\TextInput::make('description')
                      ->required(),

                 ])
            ]),
        Tab::make('Kamar ')
            ->schema([
                 Forms\Components\Repeater::make('rooms')
                ->relationship('rooms')
                 ->schema([
                     Forms\Components\TextInput::make('name')
                     ->required(),
                      Forms\Components\TextInput::make('description')
                      ->required(),
                       Forms\Components\TextInput::make('room_type')
                     ->required(),
                      Forms\Components\TextInput::make('square_feet')
                      ->numeric()
                     ->required(),
                     Forms\Components\TextInput::make('capacity')
                      ->numeric()
                     ->required(),
                     Forms\Components\TextInput::make('price_per_month')
                     ->prefix('IDR')
                      ->numeric()
                     ->required(),
                     Forms\Components\Toggle::make('is_available')
                     ->required(),
                     Forms\Components\Repeater::make('images')
                ->relationship('images')
                 ->schema([
                       Forms\Components\FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('rooms')
                    ->visibility('public')
                    ->required(),
                 ])         


                 ])
            ]),
    ]) ->columnSpan(2)
      ]) ;  
    }

   public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('name'),
             Tables\Columns\TextColumn::make('city.name'),
             Tables\Columns\TextColumn::make('category.name'),
             Tables\Columns\TextColumn::make('price'),
             Tables\Columns\TextColumn::make('address'),   
             Tables\Columns\ImageColumn::make('thumbnail'),
        ])
        ->filters([
            //
        ])
        ->actions([
            ViewAction::make(),
            EditAction::make(),
            DeleteAction::make(),
        ])
        ->bulkActions([
            BulkActionGroup::make([
                DeleteBulkAction::make(),
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
            'index' => ListBoardingHouses::route('/'),
            'create' => CreateBoardingHouse::route('/create'),
            'edit' => EditBoardingHouse::route('/{record}/edit'),
        ];
    }
}
