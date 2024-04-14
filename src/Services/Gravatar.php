<?php

namespace TomShaw\Gravatar\Services;

use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class Gravatar
{
    protected int $minSize = 1;

    protected int $maxSize = 2048;

    protected array $allowed = ['mp', 'identicon', 'monsterid', 'wavatar', 'retro', 'robohash', 'blank'];

    protected array $ratings = ['g', 'pg', 'r', 'x'];

    protected array $urls = [
        'default' => 'https://www.gravatar.com/avatar/',
        'secure' => 'https://secure.gravatar.com/avatar/',
    ];

    public function src(
        string $email,
        int $size = 80,
        string $default = 'mp',
        string $rating = 'g',
        bool $secure = true,
        string $forceDefault = 'n',
        string $forceExtension = 'jpg'
    ): string {
        $this->validateEmail($email);
        $this->validateSize($size);
        $this->validateDefault($default);
        $this->validateRating($rating);

        $hash = md5(strtolower(trim($email)));

        $url = ($secure) ? $this->urls['secure'] : $this->urls['default'];

        $forceDefault = ($forceDefault === 'y') ? 'y' : 'n';

        return "{$url}{$hash}.{$forceExtension}?s={$size}&d={$default}&r={$rating}&f={$forceDefault}";
    }

    public function validateEmail(string $email): void
    {
        $validator = Validator::make(['email' => $email], ['email' => 'required|email']);

        if ($validator->fails()) {
            throw new InvalidArgumentException("Invalid email: {$email}.");
        }
    }

    public function validateSize(int $size): void
    {
        if ($size < $this->minSize || $size > $this->maxSize) {
            throw new InvalidArgumentException("Invalid size: {$size}. Size must be between {$this->minSize} and {$this->maxSize}.");
        }
    }

    public function validateDefault(string $default): void
    {
        if (! in_array($default, $this->allowed)) {
            throw new InvalidArgumentException("Invalid default: {$default}. Must be one of: ".implode(', ', $this->allowed));
        }
    }

    public function validateRating(string $rating): void
    {
        if (! in_array($rating, $this->ratings)) {
            throw new InvalidArgumentException("Invalid rating: {$rating}. Must be one of: ".implode(', ', $this->ratings));
        }
    }
}
