<?php

namespace Tests\Feature;

use App\Filament\Pages\SectionVisibility;
use Filament\Facades\Filament;
use Livewire\Livewire;
use Tests\TestCase;

class SectionVisibilityTest extends TestCase
{
    public function test_a_section_with_visible_children_is_shown_when_a_sibling_with_the_same_key_is_hidden(): void
    {
        Filament::setCurrentPanel(Filament::getPanel('admin'));

        Livewire::test(SectionVisibility::class)
            ->assertDontSee('First section')
            ->assertSee('Second section');
    }

    public function test_php_reuses_a_static_closure_that_captures_nothing(): void
    {
        $make = static fn (): \Closure => static fn (): bool => true;

        // PHP 8.5: false. PHP 8.6: true (stateless closure caching).
        $this->assertSame(PHP_VERSION_ID >= 80600, $make() === $make());
    }
}
