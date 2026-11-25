<?php

namespace App\Filament\Widgets;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Service;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class HospitalStatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $totalAppointments = Appointment::count();
        $pendingAppointments = Appointment::where('status', 'pending')->count();
        $totalDoctors = Doctor::where('is_active', true)->count();
        $totalServices = Service::count();

        return [
            Stat::make('Total Appointments', $totalAppointments)
                ->description('All recorded bookings')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('primary'),

            Stat::make('Pending Appointments', $pendingAppointments)
                ->description('Requires staff confirmation')
                ->descriptionIcon('heroicon-m-clock')
                ->color($pendingAppointments > 0 ? 'warning' : 'success'),

            Stat::make('Active Doctors', $totalDoctors)
                ->description('Specialist consultants')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('success'),

            Stat::make('Clinical Services', $totalServices)
                ->description('Active departments')
                ->descriptionIcon('heroicon-m-sparkles')
                ->color('info'),
        ];
    }
}
