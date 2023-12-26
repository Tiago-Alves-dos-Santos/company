<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->blade();
    }

    private function blade()
    {
        Blade::directive('checkAccess', function ($expression) {

            return "<?php if(auth()->check() && auth()->user()->level_access == $expression): ?>";
        });

        Blade::directive('endcheckAccess', function () {
            return '<?php endif; ?>';
        });

    }
}
