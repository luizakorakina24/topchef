<?php

namespace Tests\Feature;

use App\Mail\LeadReceived;
use App\Models\Lead;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class LeadTest extends TestCase
{
    use RefreshDatabase;

    public function test_valid_lead_is_saved_and_mailed(): void
    {
        Mail::fake();
        config(['leads.to' => 'manager@example.com']);

        $this->postJson('/lead', [
            'form_id' => 'form_2',
            'page' => '/',
            'name' => 'Иван',
            'phone' => '79388654665',
        ])->assertOk()->assertJson(['ok' => true]);

        $this->assertDatabaseHas('leads', ['phone' => '79388654665', 'name' => 'Иван']);
        Mail::assertSent(LeadReceived::class);
    }

    public function test_phone_starting_with_8_is_normalized(): void
    {
        Mail::fake();

        $this->postJson('/lead', ['phone' => '89388654665'])->assertOk();

        $this->assertDatabaseHas('leads', ['phone' => '79388654665']);
    }

    public function test_invalid_phone_is_rejected(): void
    {
        $this->postJson('/lead', ['name' => 'Иван', 'phone' => '123'])
            ->assertStatus(422)
            ->assertJsonValidationErrors('phone');

        $this->assertDatabaseCount('leads', 0);
    }

    public function test_honeypot_requests_are_not_saved(): void
    {
        $this->postJson('/lead', ['phone' => '79388654665', 'website' => 'http://spam.example'])
            ->assertOk();

        $this->assertDatabaseCount('leads', 0);
    }

    public function test_html_is_stripped_from_text_fields(): void
    {
        Mail::fake();

        $this->postJson('/lead', ['phone' => '79388654665', 'comment' => '<b>Привет</b><script>x</script>'])->assertOk();

        $this->assertSame('Приветx', Lead::first()->comment);
    }
}
