<?php

namespace Tests\Feature;

use Tests\TestCase;

class PagesTest extends TestCase
{
    public function test_russian_pages_open(): void
    {
        foreach (['/', '/menu', '/promo', '/services', '/jobs', '/privacy', '/agreement'] as $url) {
            $this->get($url)->assertOk();
        }
    }

    public function test_english_home_and_menu_open_in_english(): void
    {
        $this->get('/en')->assertOk()->assertSee('Delicious lunch delivery');
        $this->get('/en/menu')->assertOk()->assertSee('Set lunches');
    }

    public function test_old_html_urls_redirect_permanently(): void
    {
        $this->get('/menu.html')->assertStatus(301)->assertRedirect('/menu');
        $this->get('/index.html')->assertStatus(301)->assertRedirect('/');
    }

    public function test_unknown_page_returns_404(): void
    {
        $this->get('/no-such-page')->assertNotFound();
    }

    public function test_each_page_has_one_h1_and_unique_title(): void
    {
        $titles = [];

        foreach (['/', '/menu', '/promo', '/services', '/jobs', '/privacy', '/agreement'] as $url) {
            $html = $this->get($url)->getContent();

            $this->assertSame(1, preg_match_all('/<h1\b/i', $html), "$url: должен быть ровно один H1");

            preg_match('/<title>(.*?)<\/title>/s', $html, $m);
            $titles[] = $m[1];
        }

        $this->assertSame($titles, array_unique($titles), 'Заголовки <title> должны быть уникальными');
    }

    public function test_menu_has_search_and_services_form_uses_grid(): void
    {
        $this->get('/menu')
            ->assertOk()
            ->assertSee('id="menuFilter"', false)
            ->assertSee('/menu-filter.js', false);

        $this->get('/services')
            ->assertOk()
            ->assertSee('bootstrap-grid.min.css', false)
            ->assertSee('col-12 col-md-6', false);
    }
}
