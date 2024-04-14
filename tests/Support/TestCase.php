<?php

namespace TomShaw\Gravatar\Tests\Support;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Illuminate\View\FileViewFinder;
use Orchestra\Testbench\TestCase as Orchestra;
use TomShaw\Gravatar\Providers\GravatarServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        config()->set('app.key', 'base64:'.base64_encode(Str::random(32)));

        $viewsPath = realpath(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'views');

        $paths = array_merge(app('view.finder')->getPaths(), [$viewsPath]);

        View::setFinder(new FileViewFinder(new Filesystem, $paths));
    }

    protected function getPackageProviders($app)
    {
        return [
            GravatarServiceProvider::class,
        ];
    }
}
