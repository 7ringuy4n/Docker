<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Models\SettingsModel;
use Illuminate\Support\Facades\Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'real') {
            $this->app->register(\Way\Generators\GeneratorsServiceProvider::class);
            $this->app->register(\Xethron\MigrationsGenerator\MigrationsGeneratorServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $mail = json_decode(SettingsModel::where('key_value', 'setting-email')->first()->value, true);
        if (!empty($mail)) {
            Config::set('mail.username', $mail['email']);
            Config::set('mail.password', $mail['password']);
        }
        // app('view')->composer('*', function ($view) {
        // if (app('request')->route()) {
        //     $action = app('request')->route()->getAction();
        //     dump($action);
        //     $controller = class_basename($action['controller']);
        //     list($controller, $action) = explode('@', $controller);
        //     $controller = ucwords(str_replace('Controller', '', $controller));
        //     $action = ucwords($action);
        // } else {
        //     $controller = 'default';
        //     $action = 'default';
        // }
        // $locale = LaravelLocalization::getCurrentLocale();

        // view()->share(compact('locale'));
        // });
    }
}
