<?php

namespace App\Filament\Resources\PenggunaResource\Pages;

use App\Filament\Resources\PenggunaResource;
use App\Models\Pengguna;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Collection;

class ListPenggunas extends ListRecords
{
    protected static string $resource = PenggunaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('nonaktifkan')
                ->label('Nonaktifkan')
                ->action(function ($record) {
                    $record->update(['is_active' => false]);
                })
                ->visible(fn ($record) => $record->is_active)
                ->color('danger')
                ->icon('heroicon-o-user-x'),
        ];
    }

    protected function getTableBulkActions(): array
    {
        return [
            BulkAction::make('nonaktifkan')
                ->label('Nonaktifkan Pengguna')
                ->action(function (Collection $records) {
                    $records->each->update(['is_active' => false]);
                })
                ->requiresConfirmation()
                ->color('danger')
                ->icon('heroicon-o-user-minus'),
        ];
    }
}
