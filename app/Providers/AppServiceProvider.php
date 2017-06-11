<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       Schema::defaultStringLength(191);
       Blade::directive('strcut', function ($expression) {

          list($string, $length) = explode(',', str_replace(['(', ')', ' '], '', $expression));

          return "<?php echo e(mb_strlen({$string}) > {$length} ? mb_substr({$string},0,{$length}).'...' : {$string}); ?>";
       });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
