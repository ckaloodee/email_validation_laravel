<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

class RegisterUserTest extends TestCase
{

    /** @test */
    public function ensures_email_is_unique()
    {
        $email = 'test@mail.gr';

        $this->post(route('register'), ['email' => $email])->assertStatus(200);

        $this->assertDatabaseHas('users', ['email' => $email]);

        $this->post(route('register'), ['email' => $email])
            ->assertJsonFragment(['invalid_email_code']);
    }

    /** @test */
    public function saves_sanitized_email()
    {
        $this->post(route('register'), ['email' => 'Sanitize@mail.gr']);

        $this->assertDatabaseHas('users', ['email' => 'sanitize@mail.gr']);
    }

    /**
     * @test
     * @dataProvider data_invalid_emails
     */
    public function it_can_validate_invalid_emails($value)
    {

        $this->post(route('register'), ['email' => $value])
            ->assertJsonFragment(['invalid_email_code']);
    }

    public function data_invalid_emails()
    {
        return [
            'invalid_domain' => ['invalid@something'],
            'no_domain_1' => ['invalid_string'],
            'no_domain_2' => ['Abc.example.com'],
            'only_domain' => ['@humanfactor.gr'],
            'too_big_email' => ['this-is-a-big-part-for-an-email-in-order-to-create-an-account-here@mail.com'],
            'too_big_domain' => ['invalid@something-really-really-big123-to-accept-as-a-domain-to-register.what-the-bleep-solutions'],
            'numeric' => [12345347],
            'invalid_characters_1' => ['invalid@character@mail.com'],
            'invalid_characters_2' => ['invalid(character@mail.com'],
            'invalid_characters_3' => ['invalid)character@mail.com'],
            'invalid_characters_4' => ['invalid[character@mail.com'],
            'invalid_characters_5' => ['invalid]character@mail.com'],
            'invalid_characters_6' => ['invalid>character@mail.com'],
            'invalid_characters_7' => ['invalid<character@mail.com'],
            'invalid_characters_8' => ['invalid`character@mail.com'],
            'invalid_characters_space' => ['invalid character@mail.com'],
            'invalid_characters_comma' => ['my_email@humanfactor.solutions,another@email.com'],
            'gibberish' => ['ÎµÎ»Î»Î·Î½Î¹ÎºÎ¬character@mail.com'],
            'invalid_format' => ['this\ still\"not\\allowed@example.com'],
        ];
    }

    /** @test */
    public function email_should_be_trimmed()
    {
        $this->post(route('register'), ['email' => '  test@mail.gr']);
        $this->assertDatabaseHas('draft_users', ['email' => 'test@mail.gr']);
    }
}
