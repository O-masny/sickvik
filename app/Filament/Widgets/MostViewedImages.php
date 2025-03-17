<?php
namespace App\Filament\Widgets;

use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Gallery;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class MostViewedImages extends TableWidget
{
    protected static ?string $heading = 'Most Viewed Images';

    protected function getTableQuery(): Builder
    {
        $query = Gallery::query()->orderBy('views', 'desc')->limit(5);
        
       // dd($query->get()->toArray()); // Debugging - vypíše data do prohlížeče

        return $query;
    }

    protected function getTableColumns(): array
    {
        return [
       ImageColumn::make('file_name')
            ->label('Image')
            ->disk('public')
            ->width("50")
            ->height("100")
            ->state(fn (Gallery $record): ?string => $record->file_name ? asset("storage/gallery/{$record->file_name}") : null),
            TextColumn::make('title')->sortable(),
            TextColumn::make('views')->sortable()->label('Views'),
        ];
    }
}
