<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ExchangeRateServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;
	
	protected $availableServices = ['ExchangeRateCbrRu', 'ExchangeRateYahhoFinance'];
	
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['App\Services\ExchangeRate\Contracts\ExchangeRateContract'];
    }

	public function register()
	{
		$this->app->when(App\Console\Commands\ExchangeRateCbrRuCommand::class)
          ->needs('App\Services\ExchangeRate\Contracts\ExchangeRateContract')
          ->give(App\Services\ExchangeRate\ExchangeRateCbrRu::class);
		
		$this->app->when(App\Console\Commands\ExchangeRateYahhoFinanceCommand::class)
          ->needs('App\Services\ExchangeRate\Contracts\ExchangeRateContract')
          ->give(App\Services\ExchangeRate\ExchangeRateYahhoFinance::class);
	}

	public function registerService($service)
	{
		$this->app->bind(
			'App\Services\ExchangeRate\Contracts\ExchangeRateContract',
			"App\Services\ExchangeRate\\{$service}"
		);
	}

}
