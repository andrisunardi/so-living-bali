<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LocaleRoutingTest extends TestCase
{
    use RefreshDatabase;

    public function test_english_home_has_no_locale_prefix(): void
    {
        $this->get('/')->assertOk();
    }

    public function test_english_sub_path_resolves_without_prefix(): void
    {
        $this->get('/property')->assertOk();
    }

    public function test_indonesian_prefix_resolves(): void
    {
        $this->get('/id')->assertOk();
        $this->get('/id/property')->assertOk();
        $this->assertSame('id', app()->getLocale());
    }

    public function test_french_prefix_resolves(): void
    {
        $this->get('/fr/property')->assertOk();
        $this->assertSame('fr', app()->getLocale());
    }

    public function test_unknown_locale_prefix_is_not_treated_as_locale(): void
    {
        $this->get('/en')->assertNotFound();
        $this->get('/es/property')->assertNotFound();
    }

    public function test_route_helper_generates_prefixed_url_for_non_default_locale(): void
    {
        app('url')->defaults(['locale' => 'id']);
        $this->assertSame('/id/property', route('property.index', [], false));

        app('url')->defaults(['locale' => null]);
        $this->assertSame('/property', route('property.index', [], false));
    }
}
