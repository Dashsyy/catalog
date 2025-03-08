<?php

namespace App\Filament\Tables\Columns;

use App\Enums\StatusEnum;
use Filament\Tables\Columns\TextColumn;

class StatusColumn extends TextColumn
{
    protected array $statusColors = [
        'active' => 'success',
        'inactive' => 'danger',
        'idle' => 'warning',
        'pending' => 'warning',
    ];

    protected function setUp(): void
    {
        parent::setUp();

        $this->badge()
            ->color(fn (string $state): string => match (strtolower($state)) {
                StatusEnum::ACTIVE->value => 'success',
                StatusEnum::INACTIVE->value => 'danger',
                StatusEnum::IDLE->value => 'warning',
                default => 'gray'
            })
            ->formatStateUsing(fn (string $state) => ucfirst($state));
    }

    // public function make(string $name = 'status
    // {
    //     return parent::name($name);
    // }

    public function statuses(array $statusColors): static
    {
        $this->statusColors = array_merge($this->statusColors, $statusColors);

        return $this;
    }

    protected function getStatusColor(string $state): string
    {
        return $this->statusColors[strtolower($state)] ?? 'gray';
    }
}

