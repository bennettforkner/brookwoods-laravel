<?php

declare(strict_types=1);

it('can load the home page', function (): void {
    $response = $this->get('/');

    $response->assertViewIs('pages.home');
});

it('passes the message to be displayed', function (): void {
    $response = $this->get('/');

    $response->assertSeeText('I do stuff with PHP and APIs!');
});