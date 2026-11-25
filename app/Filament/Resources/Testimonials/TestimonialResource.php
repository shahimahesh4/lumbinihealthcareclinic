<?php

namespace App\Filament\Resources\Testimonials;

use App\Filament\Resources\Testimonials\Pages\ManageTestimonials;
use App\Models\Testimonial;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChatBubbleBottomCenterText;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('patient_name')
                    ->label('Patient Name')
                    ->required(),
                TextInput::make('patient_role')
                    ->label('Role / Treatment Location')
                    ->default('Patient'),
                TextInput::make('avatar_url')
                    ->label('Photo Avatar URL')
                    ->url(),
                TextInput::make('rating')
                    ->numeric()
                    ->default(5)
                    ->minValue(1)
                    ->maxValue(5)
                    ->required(),
                Toggle::make('is_active')
                    ->label('Show on Homepage')
                    ->default(true),
                Textarea::make('review')
                    ->label('Patient Review')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('patient_name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('patient_role')
                    ->searchable(),
                TextColumn::make('rating')
                    ->badge()
                    ->color('warning'),
                IconColumn::make('is_active')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
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
            'index' => ManageTestimonials::route('/'),
        ];
    }
}
