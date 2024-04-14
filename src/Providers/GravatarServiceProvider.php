<?php

namespace TomShaw\Gravatar\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use TomShaw\Gravatar\Services\Gravatar;

class GravatarServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Blade::directive('gravatar', function ($expression) {
            return "<?php echo app('TomShaw\Gravatar\Services\Gravatar')->src({$expression}); ?>";
        });
    }

    public function register(): void
    {
        $this->app->singleton('gravatar', fn () => new Gravatar);
    }
}
