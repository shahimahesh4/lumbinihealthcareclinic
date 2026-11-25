<?php

namespace App\Filament\Resources\Appointments;

use App\Filament\Resources\Appointments\Pages\ManageAppointments;
use App\Models\Appointment;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AppointmentResource extends Resource
{
    protected static ?string $model = Appointment::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCalendar;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('patient_name')
                    ->label('Patient Name')
                    ->required(),
                TextInput::make('patient_email')
                    ->label('Email Address')
                    ->email(),
                TextInput::make('patient_phone')
                    ->label('Phone Number')
                    ->tel()
                    ->required(),
                Select::make('doctor_id')
                    ->label('Assigned Doctor')
                    ->relationship('doctor', 'name')
                    ->searchable()
                    ->preload(),
                Select::make('service_id')
                    ->label('Clinical Service')
                    ->relationship('service', 'title')
                    ->searchable()
                    ->preload(),
                DatePicker::make('appointment_date')
                    ->label('Appointment Date')
                    ->required(),
                TextInput::make('appointment_time')
                    ->label('Preferred Time (e.g. 10:30 AM)'),
                Select::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending Review',
                        'confirmed' => 'Confirmed',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->default('pending')
                    ->required(),
                Textarea::make('message')
                    ->label('Patient Notes / Chief Complaint')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('patient_name')
                    ->label('Patient')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('patient_phone')
                    ->label('Phone')
                    ->searchable(),
                TextColumn::make('doctor.name')
                    ->label('Doctor')
                    ->searchable(),
                TextColumn::make('service.title')
                    ->label('Service')
                    ->searchable(),
                TextColumn::make('appointment_date')
                    ->label('Date')
                    ->date('M d, Y')
                    ->sortable(),
                TextColumn::make('appointment_time')
                    ->label('Time'),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'confirmed' => 'success',
                        'completed' => 'info',
                        'cancelled' => 'danger',
                        default => 'warning',
                    })
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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
            'index' => ManageAppointments::route('/'),
        ];
    }
}
