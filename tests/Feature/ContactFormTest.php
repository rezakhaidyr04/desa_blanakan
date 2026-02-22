<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    /**
     * Test that the contact page can be rendered.
     */
    public function test_contact_page_can_be_rendered(): void
    {
        $response = $this->get(route('kontak'));

        $response->assertStatus(200);
    }

    /**
     * Test that the contact form can be submitted with valid data.
     */
    public function test_contact_form_can_be_submitted_with_valid_data(): void
    {
        $data = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'subject' => 'Test Subject',
            'message' => 'This is a test message.',
        ];

        $response = $this->post(route('kontak.submit'), $data);

        $response->assertRedirect(route('kontak'));
        $response->assertSessionHas('success');
    }

    /**
     * Test that the contact form requires validation.
     */
    public function test_contact_form_validation_errors(): void
    {
        $response = $this->post(route('kontak.submit'), []);

        $response->assertSessionHasErrors(['name', 'email', 'subject', 'message']);
    }
}
