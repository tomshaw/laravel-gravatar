# Laravel Gravatar 📸 

A zero config named parameter Laravel Gravatar Directive.

![GitHub Workflow Status](https://img.shields.io/github/actions/workflow/status/tomshaw/laravel-gravatar/run-tests.yml?branch=master&style=flat-square&label=tests)
![issues](https://img.shields.io/github/issues/tomshaw/laravel-gravatar?style=flat&logo=appveyor)
![forks](https://img.shields.io/github/forks/tomshaw/laravel-gravatar?style=flat&logo=appveyor)
![stars](https://img.shields.io/github/stars/tomshaw/laravel-gravatar?style=flat&logo=appveyor)
[![GitHub license](https://img.shields.io/github/license/tomshaw/laravel-gravatar)](https://github.com/tomshaw/laravel-gravatar/blob/master/LICENSE)

<div style="display: flex; justify-content: flex-start; gap: 0 8px;">
    <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?s=40&r=pg" alt="blank" width="40" height="40">
    <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?s=40&d=mp&r=pg" alt="mp" width="40" height="40">
    <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?s=40&d=identicon&r=pg" alt="identicon" width="40" height="40">
    <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?s=40&d=monsterid&r=pg" alt="monsterid" width="40" height="40">
    <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?s=40&d=wavatar&r=pg" alt="wavatar" width="40" height="40">
    <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?s=40&d=retro&r=pg" alt="retro" width="40" height="40">
    <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?s=40&d=robohash&r=pg" alt="robohash" width="40" height="40">
    <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?s=40&d=blank&r=pg" alt="blank" width="40" height="40">
</div>

## Installation

You can install the package via composer:

```bash
composer require tomshaw/laravel-gravatar
```

## Usage

Configure the Gravatar Image where you plan on utilizing it.

```php
<img src="@gravatar(email: 'email@example.com', size: 60, default: 'retro', rating: 'g')" />
```

> This generates an `60` pixels `retro` style image with a `g` rating.

## Parameters

The default parameters are described below:

- **`$email` (string)**: The email address of the user. This is required.

- **`$size` (int)**: The size of the Gravatar image in pixels. Default is `60`. Must be between `1` and `2048`.

- **`$default` (string)**: The default image to display if the user doesn't have a Gravatar. Default is `'mp'`. Options include: `'mp'`, `'identicon'`, `'monsterid'`, `'wavatar'`, `'retro'`, `'robohash'`, `'blank'`.

- **`$rating` (string)**: The rating of the Gravatar image. Default is `'g'`. Options include: `'g'`, `'pg'`, `'r'`, `'x'`.

- **`$secure` (bool)**: Whether to use the secure Gravatar URL. Default is `true`.

- **`$forceDefault` (string)**: Whether to always load the default image. Default is `'n'`.

- **`$forceExtension` (string)**: The file extension for the Gravatar image. Default is `'jpg'`.

## Requirements

The package is compatible with PHP 8 or later.

## License

The MIT License (MIT). See [License File](LICENSE) for more information.
