<?php namespace Rtablada\VersionMaster;

use Illuminate\Support\ServiceProvider;

class GitVersionProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('git-hash', function($app) {
            $gitPath = $app->make('config')->get('git-version.gitPath', '.git');

            return new GitHashReader($app->make('files'), $app->basePath(), $gitPath);
        });

        $this->app->alias('git-hash', GitHashReader::class);
    }

    public function boot()
    {
        $compiler = $this->app['view']->getEngineResolver()->resolve('blade')->getCompiler();
        $compiler->directive('version', function($expression) {
            return "<?php echo app('git-hash')->getShortVersion(); ?>";
        });
    }
}
