<?php

use Illuminate\Support\Facades\View;
use TomShaw\Gravatar\Services\Gravatar;

test('instance check', function () {
    $this->assertTrue($this instanceof \PHPUnit\Framework\TestCase);
});

beforeEach(function () {
    $this->email = 'email@example.com';
});

it('generates a valid gravatar url', function () {
    $gravatar = new Gravatar();

    $url = $gravatar->src($this->email);

    expect($url)->toMatch('~^https://(www\.)?(secure\.)?gravatar\.com/avatar/~');

    expect($url)->toContain(md5(strtolower($this->email)));

    expect($url)->toContain('s=80');
    expect($url)->toContain('d=mp');
    expect($url)->toContain('r=g');
    expect($url)->toContain('f=n');
});

it('throws an exception for an invalid email', function () {
    $gravatar = new Gravatar();

    $gravatar->src('invalid-email');
})->throws(InvalidArgumentException::class);

it('renders the gravatar directive with named parameters', function () {
    $html = View::make('test')->render();

    $expected = 'https://secure.gravatar.com/avatar/5658ffccee7f0ebfda2b226238b1eb6e.jpg?s=80&d=mp&r=pg&f=n';

    expect($html)->toEqual($expected);
});
