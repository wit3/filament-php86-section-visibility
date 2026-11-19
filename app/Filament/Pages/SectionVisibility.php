<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;
use Filament\Schemas\Components\EmbeddedSchema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SectionVisibility extends Page
{
    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->components([
                // Both sections write into the same nested array, so they share the key `form.details`.
                Section::make('First section')
                    ->statePath('details')
                    ->hiddenWhenAllChildComponentsHidden()
                    ->schema([
                        TextInput::make('first')->hidden(),
                    ]),
                Section::make('Second section')
                    ->statePath('details')
                    ->hiddenWhenAllChildComponentsHidden()
                    ->schema([
                        TextInput::make('second'),
                    ]),
            ]);
    }

    public function content(Schema $schema): Schema
    {
        return $schema->components([
            EmbeddedSchema::make('form'),
        ]);
    }
}
