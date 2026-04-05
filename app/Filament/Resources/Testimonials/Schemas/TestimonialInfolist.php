<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use App\Models\Testimonial;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TestimonialInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('boarding_house_id')
                    ->numeric(),
                TextEntry::make('photo'),
                TextEntry::make('content'),
                TextEntry::make('rating'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (Testimonial $record): bool => $record->trashed()),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
