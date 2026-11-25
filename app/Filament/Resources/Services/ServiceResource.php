<?php

namespace App\Filament\Resources\Services;

use App\Filament\Resources\Services\Pages\ManageServices;
use App\Models\Service;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSparkles;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Service Details')
                    ->columnSpanFull()
                    ->tabs([
                        Tab::make('General Information')
                            ->icon('heroicon-o-information-circle')
                            ->components([
                                TextInput::make('title')
                                    ->label('Service Title')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (string $operation, $state, callable $set) {
                                        if ($operation === 'create') {
                                            $set('slug', Str::slug($state));
                                        }
                                    }),
                                TextInput::make('slug')
                                    ->label('URL Slug')
                                    ->required()
                                    ->unique(ignoreRecord: true),
                                TextInput::make('icon')
                                    ->label('Icon Identifier')
                                    ->helperText('stethoscope, baby, heart-pulse, microscope, pill, etc.')
                                    ->default('stethoscope')
                                    ->required(),
                                TextInput::make('display_order')
                                    ->label('Display Order')
                                    ->numeric()
                                    ->default(0),
                                Toggle::make('is_featured')
                                    ->label('Featured on Homepage')
                                    ->default(true),
                                Textarea::make('short_description')
                                    ->label('Short Overview')
                                    ->helperText('Brief overview displayed on service cards and listings.')
                                    ->required()
                                    ->rows(3)
                                    ->columnSpanFull(),
                                Textarea::make('full_description')
                                    ->label('Full Clinical Details')
                                    ->helperText('In-depth explanation of tests, treatments, and clinical scope.')
                                    ->rows(6)
                                    ->columnSpanFull(),
                            ]),

                        Tab::make('Clinical Features & Guidelines')
                            ->icon('heroicon-o-clipboard-document-list')
                            ->components([
                                TagsInput::make('features')
                                    ->label('Key Procedures & Clinical Highlights')
                                    ->placeholder('Add clinical procedure (e.g. 4D Ultrasound Scan) and press enter')
                                    ->helperText('List key medical procedures, equipment, or benefits.')
                                    ->columnSpanFull(),
                                Textarea::make('preparation_guidelines')
                                    ->label('Patient Preparation Guidelines')
                                    ->placeholder("E.g.\n- Fasting required for 8 to 12 hours prior to test.\n- Drink 1-1.5 liters of water 1 hour prior to USG.\n- Bring previous medical reports and prescription.")
                                    ->rows(4)
                                    ->columnSpanFull(),
                            ]),

                        Tab::make('Media & Images')
                            ->icon('heroicon-o-photo')
                            ->components([
                                FileUpload::make('image_url')
                                    ->label('Featured Service Image')
                                    ->disk('public')
                                    ->directory('services')
                                    ->image()
                                    ->imageEditor()
                                    ->columnSpanFull()
                                    ->helperText('High resolution service image shown on service detail hero and card.'),
                                FileUpload::make('og_image')
                                    ->label('Social Share (OG) Image')
                                    ->disk('public')
                                    ->directory('services/seo')
                                    ->image()
                                    ->imageEditor()
                                    ->columnSpanFull()
                                    ->helperText('Optimized image for Facebook, Twitter, and WhatsApp social previews (1200x630 px recommended).'),
                            ]),

                        Tab::make('SEO & Social Meta Tags')
                            ->icon('heroicon-o-magnifying-glass')
                            ->components([
                                TextInput::make('meta_title')
                                    ->label('SEO Meta Title')
                                    ->placeholder('e.g. Best Gynecology & Maternity Clinic in Bhairahawa | Lumbini Health Care')
                                    ->helperText('Optimal length: 50-60 characters. Defaults to service title + clinic name if empty.')
                                    ->maxLength(100)
                                    ->columnSpanFull(),
                                Textarea::make('meta_description')
                                    ->label('SEO Meta Description')
                                    ->placeholder('Comprehensive maternity, normal delivery and women care in Bhairahawa. Trusted gynecologists and 24/7 emergency support.')
                                    ->helperText('Optimal length: 140-160 characters. Defaults to short description if empty.')
                                    ->rows(3)
                                    ->maxLength(255)
                                    ->columnSpanFull(),
                                Textarea::make('meta_keywords')
                                    ->label('SEO Meta Keywords')
                                    ->placeholder('gynecology clinic bhairahawa, maternity hospital butwal, ultrasound lab nepal')
                                    ->helperText('Comma-separated keywords for search engine indexing.')
                                    ->rows(2)
                                    ->columnSpanFull(),
                                TextInput::make('canonical_url')
                                    ->label('Canonical URL')
                                    ->placeholder('https://lumbinihealthcare.com/services/gynecology-obstetrics')
                                    ->helperText('Self-referencing canonical URL will be generated automatically if left empty.')
                                    ->url()
                                    ->columnSpanFull(),
                            ]),

                        Tab::make('Service FAQs')
                            ->icon('heroicon-o-question-mark-circle')
                            ->components([
                                Repeater::make('faqs')
                                    ->label('Frequently Asked Questions')
                                    ->components([
                                        TextInput::make('question')
                                            ->label('Question')
                                            ->placeholder('e.g. Do I need an appointment for this service?')
                                            ->required(),
                                        Textarea::make('answer')
                                            ->label('Answer')
                                            ->placeholder('e.g. Walk-ins are accepted for emergencies, but booking in advance ensures minimal wait times.')
                                            ->required()
                                            ->rows(2),
                                    ])
                                    ->collapsible()
                                    ->itemLabel(fn (array $state): ?string => $state['question'] ?? 'New FAQ')
                                    ->columnSpanFull(),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('slug')
                    ->searchable()
                    ->color('gray')
                    ->limit(25),
                TextColumn::make('icon')
                    ->badge()
                    ->color('info'),
                IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean(),
                TextColumn::make('display_order')
                    ->label('Order')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->recordActions([
                EditAction::make()->slideOver(),
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
            'index' => ManageServices::route('/'),
        ];
    }
}
