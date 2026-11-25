<?php

namespace App\Filament\Resources\Doctors;

use App\Filament\Resources\Doctors\Pages\ManageDoctors;
use App\Models\Doctor;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
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
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class DoctorResource extends Resource
{
    protected static ?string $model = Doctor::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserGroup;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Doctor Details')
                    ->columnSpanFull()
                    ->tabs([
                        Tab::make('Profile & Credentials')
                            ->icon('heroicon-o-user')
                            ->components([
                                TextInput::make('name')
                                    ->label('Doctor Full Name')
                                    ->required()
                                    ->placeholder('e.g. Dr. Sushmita Adhikari')
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (string $operation, $state, callable $set) {
                                        if ($operation === 'create') {
                                            $set('slug', Str::slug($state));
                                        }
                                    }),
                                TextInput::make('slug')
                                    ->label('URL Slug')
                                    ->required()
                                    ->placeholder('e.g. dr-sushmita-adhikari')
                                    ->unique(ignoreRecord: true),
                                TextInput::make('title_prefix')
                                    ->label('Title / Designation Prefix')
                                    ->placeholder('e.g. Senior Consultant, Prof. Dr.'),
                                TextInput::make('specialty')
                                    ->label('Clinical Specialty')
                                    ->required()
                                    ->placeholder('e.g. Gynecologist & Obstetrician'),
                                Select::make('service_id')
                                    ->label('Primary Clinical Department')
                                    ->relationship('service', 'title')
                                    ->searchable()
                                    ->preload()
                                    ->nullable(),
                                TextInput::make('designation')
                                    ->label('Hospital Designation')
                                    ->placeholder('e.g. Head of Department - Obstetrics & Gynecology'),
                                TextInput::make('nmc_number')
                                    ->label('NMC Registration Number')
                                    ->placeholder('e.g. NMC Reg. No. 12845'),
                                TextInput::make('qualification')
                                    ->label('Medical Qualifications')
                                    ->placeholder('e.g. MBBS (T.U.), MD (OB/GYN) - TUTH'),
                                TextInput::make('experience_years')
                                    ->label('Years of Experience')
                                    ->placeholder('e.g. 12+ Years'),
                                TextInput::make('display_order')
                                    ->label('Display Order')
                                    ->numeric()
                                    ->default(0),
                                Toggle::make('is_active')
                                    ->label('Active on Website')
                                    ->default(true),
                                Toggle::make('is_featured')
                                    ->label('Featured Doctor (Homepage)')
                                    ->default(true),
                                Toggle::make('is_available_for_booking')
                                    ->label('Available for Online Booking')
                                    ->default(true),
                            ]),

                        Tab::make('Clinical Practice & Bio')
                            ->icon('heroicon-o-document-text')
                            ->components([
                                Textarea::make('bio')
                                    ->label('Short Overview / Excerpt')
                                    ->helperText('Brief 1-2 sentence summary displayed on doctor cards.')
                                    ->rows(3)
                                    ->required()
                                    ->columnSpanFull(),
                                Textarea::make('biography')
                                    ->label('In-Depth Biography & Medical Philosophy')
                                    ->helperText('Detailed clinical background, accomplishments, and patient care approach.')
                                    ->rows(6)
                                    ->columnSpanFull(),
                                TagsInput::make('expertise_areas')
                                    ->label('Clinical Expertise & Procedures')
                                    ->placeholder('Add clinical expertise and press enter (e.g. High-Risk Pregnancy)')
                                    ->columnSpanFull(),
                                Textarea::make('opd_schedule')
                                    ->label('OPD Consultation Hours')
                                    ->placeholder("Sunday - Friday: 8:00 AM - 4:00 PM\nSaturday: Emergency / On-Call")
                                    ->rows(3),
                                TextInput::make('consultation_fee')
                                    ->label('OPD Consultation Fee')
                                    ->placeholder('e.g. Rs. 600'),
                                TextInput::make('room_number')
                                    ->label('OPD Room / Cabin')
                                    ->placeholder('e.g. OPD Suite 101, 1st Floor'),
                            ]),

                        Tab::make('Education & Training')
                            ->icon('heroicon-o-academic-cap')
                            ->components([
                                Repeater::make('education_training')
                                    ->label('Education, Residency & Fellowships')
                                    ->components([
                                        TextInput::make('degree')
                                            ->label('Degree / Fellowship')
                                            ->placeholder('e.g. MD - Obstetrics & Gynecology')
                                            ->required(),
                                        TextInput::make('institution')
                                            ->label('University / Hospital')
                                            ->placeholder('e.g. Tribhuvan University Teaching Hospital (TUTH)')
                                            ->required(),
                                        TextInput::make('year')
                                            ->label('Year of Completion')
                                            ->placeholder('e.g. 2014'),
                                        TextInput::make('notes')
                                            ->label('Notes / Honors')
                                            ->placeholder('e.g. University Gold Medalist'),
                                    ])
                                    ->collapsible()
                                    ->itemLabel(fn (array $state): ?string => $state['degree'] ?? 'New Qualification')
                                    ->columnSpanFull(),
                                TagsInput::make('awards_recognitions')
                                    ->label('Professional Memberships & Accreditations')
                                    ->placeholder('Add medical society membership (e.g. NESOG, NMA) and press enter')
                                    ->columnSpanFull(),
                            ]),

                        Tab::make('Media & Photos')
                            ->icon('heroicon-o-photo')
                            ->components([
                                FileUpload::make('image_url')
                                    ->label('Doctor Portrait Photo')
                                    ->disk('public')
                                    ->directory('doctors')
                                    ->image()
                                    ->imageEditor()
                                    ->columnSpanFull()
                                    ->helperText('Professional portrait photo of the doctor.'),
                                FileUpload::make('og_image')
                                    ->label('Social Share (OG) Image')
                                    ->disk('public')
                                    ->directory('doctors/seo')
                                    ->image()
                                    ->imageEditor()
                                    ->columnSpanFull()
                                    ->helperText('Image for social media previews (1200x630 px). Defaults to portrait photo if empty.'),
                            ]),

                        Tab::make('Contact & Emergency')
                            ->icon('heroicon-o-phone')
                            ->components([
                                TextInput::make('phone')
                                    ->label('Clinic Phone')
                                    ->tel()
                                    ->placeholder('+977-071-591486'),
                                TextInput::make('emergency_contact')
                                    ->label('Emergency / Direct Hotline')
                                    ->tel()
                                    ->placeholder('+977-9857012345'),
                                TextInput::make('email')
                                    ->label('Official Email')
                                    ->email()
                                    ->placeholder('dr.name@lumbinihealthcare.com'),
                                TextInput::make('facebook_url')
                                    ->label('Facebook Profile URL')
                                    ->url(),
                                TextInput::make('linkedin_url')
                                    ->label('LinkedIn Profile URL')
                                    ->url(),
                                TextInput::make('twitter_url')
                                    ->label('Twitter / X Profile URL')
                                    ->url(),
                                TextInput::make('instagram_url')
                                    ->label('Instagram Profile URL')
                                    ->url(),
                            ]),

                        Tab::make('SEO & Meta Tags')
                            ->icon('heroicon-o-magnifying-glass')
                            ->components([
                                TextInput::make('meta_title')
                                    ->label('SEO Meta Title')
                                    ->placeholder('e.g. Dr. Sushmita Adhikari - Senior Gynecologist in Bhairahawa')
                                    ->helperText('Defaults to doctor name + specialty + clinic name if empty.')
                                    ->maxLength(100)
                                    ->columnSpanFull(),
                                Textarea::make('meta_description')
                                    ->label('SEO Meta Description')
                                    ->placeholder('Consult Dr. Sushmita Adhikari at Lumbini Health Care Center, Bhairahawa for maternity, high-risk pregnancy and women wellness.')
                                    ->helperText('Defaults to doctor bio if left empty.')
                                    ->rows(3)
                                    ->maxLength(255)
                                    ->columnSpanFull(),
                                Textarea::make('meta_keywords')
                                    ->label('SEO Meta Keywords')
                                    ->placeholder('gynecologist bhairahawa, doctor butwal, maternity specialist rupandehi')
                                    ->helperText('Comma-separated keywords for search engine indexing.')
                                    ->rows(2)
                                    ->columnSpanFull(),
                                TextInput::make('canonical_url')
                                    ->label('Canonical URL')
                                    ->placeholder('https://lumbinihealthcare.com/doctors/dr-sushmita-adhikari')
                                    ->url()
                                    ->columnSpanFull(),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_url')
                    ->label('Photo')
                    ->circular(),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('specialty')
                    ->searchable()
                    ->badge()
                    ->color('danger'),
                TextColumn::make('service.title')
                    ->label('Department')
                    ->badge()
                    ->color('info')
                    ->toggleable(),
                TextColumn::make('nmc_number')
                    ->label('NMC Reg')
                    ->searchable()
                    ->color('gray'),
                TextColumn::make('consultation_fee')
                    ->label('Fee')
                    ->color('success'),
                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),
                IconColumn::make('is_available_for_booking')
                    ->label('Booking')
                    ->boolean(),
                TextColumn::make('display_order')
                    ->label('Order')
                    ->numeric()
                    ->sortable(),
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
            'index' => ManageDoctors::route('/'),
        ];
    }
}
