<?php

namespace App\Filament\Resources\HomepageHeros;

use App\Filament\Resources\HomepageHeros\Pages\CreateHomepageHero;
use App\Filament\Resources\HomepageHeros\Pages\EditHomepageHero;
use App\Filament\Resources\HomepageHeros\Pages\ListHomepageHeros;
use App\Models\HomepageHero;
use BackedEnum;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class HomepageHeroResource extends Resource
{
    protected static ?string $model = HomepageHero::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedHome;

    protected static ?string $navigationLabel = 'Website Home Settings';

    protected static ?string $slug = 'website-home-settings';

    protected static ?string $modelLabel = 'Website home settings';

    protected static ?string $pluralModelLabel = 'Website home settings';

    protected static string|\UnitEnum|null $navigationGroup = 'Settings';

    protected static ?string $recordTitleAttribute = 'title_prefix';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Tabs::make('Homepage introduction')
                ->columnSpanFull()
                ->tabs([
                    Tab::make('Content')
                        ->icon('heroicon-o-information-circle')
                        ->components([
                            TextInput::make('title_prefix')->label('Heading first text')->default('Best')->required(),
                            TextInput::make('title_highlight')->label('Heading highlighted text')->default('Health Care')->required(),
                            TextInput::make('title_suffix')->label('Heading second line')->default('Clinic')->required(),
                            Textarea::make('description')
                                ->label('Introduction text')
                                ->rows(4)
                                ->required()
                                ->default('A specialised health center for your complete medical care and wellness. Dedicated maternal, diagnostic, and clinical specialist doctors serving Bhairahawa & Lumbini.')
                                ->columnSpanFull(),
                        ]),
                    Tab::make('Portrait image')
                        ->icon('heroicon-o-photo')
                        ->components([
                            FileUpload::make('image_path')
                                ->label('Doctor / clinic portrait')
                                ->disk('public')
                                ->directory('homepage-introduction')
                                ->image()
                                ->deletable()
                                ->columnSpanFull()
                                ->helperText('Recommended: portrait image at least 800 × 1000 px. If empty, the current default portrait is used.'),
                            TextInput::make('image_alt')
                                ->label('Image description')
                                ->default('Smiling Specialist Doctor')
                                ->required()
                                ->columnSpanFull(),
                        ]),
                    Tab::make('Buttons & badge')
                        ->icon('heroicon-o-cursor-arrow-rays')
                        ->components([
                            TextInput::make('primary_button_text')->label('Primary button text')->default('Our Services')->required(),
                            TextInput::make('primary_button_link')->label('Primary button link')->default('/services')->required(),
                            TextInput::make('secondary_button_text')->label('Secondary button text')->default('Meet Doctors')->required(),
                            TextInput::make('secondary_button_link')->label('Secondary button link')->default('/doctors')->required(),
                            TextInput::make('badge_top_text')->label('Emergency badge top text')->default('24/7 OPEN')->required(),
                            TextInput::make('badge_bottom_text')->label('Emergency badge bottom text')->default('CARE')->required(),
                        ]),
                    Tab::make('About section')
                        ->icon('heroicon-o-building-office-2')
                        ->components([
                            TextInput::make('about_eyebrow')->label('Section label')->default('- ABOUT US -')->required(),
                            TextInput::make('about_title')->label('Section heading')->default('We Give You The Perfect Care You Deserve')->required()->columnSpanFull(),
                            Textarea::make('about_description')
                                ->label('Section description')
                                ->rows(4)
                                ->default('Lumbini Health Care Center in Bhairahawa is built upon clinical precision, state-of-the-art diagnostic infrastructure, and deep patient compassion. We combine specialist doctors with responsive nursing staff to deliver health outcomes you can rely on.')
                                ->required()
                                ->columnSpanFull(),
                            FileUpload::make('about_image_path')
                                ->label('Main clinic image')
                                ->disk('public')
                                ->directory('website-home/about')
                                ->image()
                                ->deletable()
                                ->columnSpanFull()
                                ->helperText('Recommended: 900 × 650 px. This is the large right-side image.'),
                            TextInput::make('about_image_alt')->label('Main image description')->default('Clinical Care at Lumbini Health Care Center')->required()->columnSpanFull(),
                            FileUpload::make('about_doctor_image_path')
                                ->label('Doctor profile photo')
                                ->disk('public')
                                ->directory('website-home/profiles')
                                ->image()
                                ->deletable()
                                ->helperText('Recommended: square 400 × 400 px. This appears in the small profile card.'),
                            TextInput::make('about_doctor_name')->label('Doctor name')->default('Dr. Suresh Sharma')->required(),
                            TextInput::make('about_doctor_designation')->label('Doctor designation')->default('Medical Director & Senior Consultant')->required(),
                            TextInput::make('about_doctor_credentials')->label('Doctor credentials / experience')->default('Certified Healthcare Practitioner • 15+ Yrs Experience')->required()->columnSpanFull(),
                            TextInput::make('about_button_text')->label('About button text')->default('Our Services')->required(),
                            TextInput::make('about_button_link')->label('About button link')->default('/services')->required(),
                            TextInput::make('about_emergency_text')->label('Emergency support label')->default('24/7 Hours Emergency Support')->required()->columnSpanFull(),
                        ]),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            ImageColumn::make('image_path')->label('Image')->disk('public')->width(80)->height(80),
            TextColumn::make('title_prefix')->label('Heading')->formatStateUsing(fn (HomepageHero $record): string => trim("{$record->title_prefix} {$record->title_highlight} {$record->title_suffix}"))->weight('bold'),
            TextColumn::make('updated_at')->label('Last updated')->dateTime()->sortable(),
        ])->recordActions([
            EditAction::make(),
            DeleteAction::make(),
        ])->headerActions([
            CreateAction::make()->visible(fn (): bool => HomepageHero::query()->doesntExist()),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHomepageHeros::route('/'),
            'create' => CreateHomepageHero::route('/create'),
            'edit' => EditHomepageHero::route('/{record}/edit'),
        ];
    }
}
