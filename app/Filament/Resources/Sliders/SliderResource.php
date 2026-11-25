<?php

namespace App\Filament\Resources\Sliders;

use App\Filament\Resources\Sliders\Pages\CreateSlider;
use App\Filament\Resources\Sliders\Pages\EditSlider;
use App\Filament\Resources\Sliders\Pages\ListSliders;
use App\Models\Slider;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SliderResource extends Resource
{
    protected static ?string $model = Slider::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPhoto;

    protected static ?string $navigationLabel = 'Banner Sliders';

    protected static string|\UnitEnum|null $navigationGroup = 'Settings';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Banner settings')
                    ->columnSpanFull()
                    ->tabs([
                        Tab::make('Information')
                            ->icon('heroicon-o-information-circle')
                            ->components([
                                TextInput::make('title')
                                    ->label('Desktop headline')
                                    ->placeholder('e.g. Welcome to Lumbini Health Care')
                                    ->maxLength(255)
                                    ->helperText('Use a line break in the text to control headline wrapping.')
                                    ->columnSpanFull(),
                                Textarea::make('subtitle')
                                    ->label('Desktop eyebrow / description')
                                    ->placeholder('e.g. Quality care for your family, 24/7 emergency & modern diagnostics.')
                                    ->rows(2)
                                    ->columnSpanFull(),
                            ]),
                        Tab::make('Desktop')
                            ->icon('heroicon-o-computer-desktop')
                            ->components([
                                FileUpload::make('image_path')
                                    ->label('Desktop background image')
                                    ->disk('public')
                                    ->directory('sliders/desktop')
                                    ->image()
                                    ->deletable()
                                    ->required()
                                    ->columnSpanFull()
                                    ->helperText('Recommended: 1920 × 850 px. Use the remove button on the image to replace it with a new desktop creative.'),
                                TextInput::make('desktop_height')
                                    ->label('Desktop banner height')
                                    ->numeric()
                                    ->minValue(360)
                                    ->maxValue(1200)
                                    ->suffix('px')
                                    ->default(720)
                                    ->required()
                                    ->helperText('The banner always fills the screen width. Set its desktop height between 360 and 1200 px.'),
                            ]),
                        Tab::make('Mobile')
                            ->icon('heroicon-o-device-phone-mobile')
                            ->components([
                                FileUpload::make('mobile_image_path')
                                    ->label('Mobile background image')
                                    ->disk('public')
                                    ->directory('sliders/mobile')
                                    ->image()
                                    ->deletable()
                                    ->columnSpanFull()
                                    ->helperText('Recommended: 900 × 1200 px. Optional — remove it to fall back to the desktop image.'),
                                TextInput::make('mobile_height')
                                    ->label('Mobile banner height')
                                    ->numeric()
                                    ->minValue(360)
                                    ->maxValue(1200)
                                    ->suffix('px')
                                    ->default(620)
                                    ->required()
                                    ->helperText('The banner always fills the screen width. Set its phone height between 360 and 1200 px.'),
                                TextInput::make('mobile_title')
                                    ->label('Mobile headline override')
                                    ->maxLength(255)
                                    ->helperText('Optional shorter heading for phones. Leave blank to use the desktop headline.')
                                    ->columnSpanFull(),
                                Textarea::make('mobile_subtitle')
                                    ->label('Mobile description override')
                                    ->rows(2)
                                    ->helperText('Optional shorter text for phones. Leave blank to use the desktop description.')
                                    ->columnSpanFull(),
                            ]),
                        Tab::make('Tablet')
                            ->icon('heroicon-o-device-tablet')
                            ->components([
                                FileUpload::make('tablet_image_path')
                                    ->label('Tablet background image')
                                    ->disk('public')
                                    ->directory('sliders/tablet')
                                    ->image()
                                    ->deletable()
                                    ->columnSpanFull()
                                    ->helperText('Recommended: 1400 × 900 px. Optional — the desktop image is used when this is empty.'),
                                TextInput::make('tablet_height')
                                    ->label('Tablet banner height')
                                    ->numeric()
                                    ->minValue(360)
                                    ->maxValue(1200)
                                    ->suffix('px')
                                    ->default(650)
                                    ->required()
                                    ->helperText('Used from 768 px to 1023 px wide. Tablets use the desktop image and text.'),
                            ]),
                        Tab::make('Button & visibility')
                            ->icon('heroicon-o-cursor-arrow-rays')
                            ->components([
                                TextInput::make('button_text')
                                    ->label('Button text')
                                    ->placeholder('e.g. Book Appointment')
                                    ->maxLength(100),
                                TextInput::make('button_link')
                                    ->label('Button link')
                                    ->placeholder('e.g. #appointment or /services')
                                    ->maxLength(255),
                                TextInput::make('order')
                                    ->label('Display order')
                                    ->numeric()
                                    ->default(0)
                                    ->helperText('Lower numbers appear first.'),
                                Toggle::make('is_active')
                                    ->label('Publish this banner')
                                    ->default(true)
                                    ->helperText('Only published banners are shown on the homepage.'),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_path')
                    ->label('Desktop')
                    ->disk('public')
                    ->width(120)
                    ->height(60),
                ImageColumn::make('mobile_image_path')
                    ->label('Mobile')
                    ->disk('public')
                    ->width(45)
                    ->height(60)
                    ->toggleable(),
                ImageColumn::make('tablet_image_path')
                    ->label('Tablet')
                    ->disk('public')
                    ->width(75)
                    ->height(60)
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(40),
                TextColumn::make('subtitle')
                    ->limit(50)
                    ->color('gray')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('button_text')
                    ->badge()
                    ->color('info'),
                TextColumn::make('order')
                    ->label('Order')
                    ->sortable(),
                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('order')
            ->reorderable('order')
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSliders::route('/'),
            'create' => CreateSlider::route('/create'),
            'edit' => EditSlider::route('/{record}/edit'),
        ];
    }
}
