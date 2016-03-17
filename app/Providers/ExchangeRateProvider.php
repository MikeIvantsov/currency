<?php

namespace App\Providers;

use App\Services\ExchangeRate\Contracts\ExchangeRateContract;
use Illuminate\Support\ServiceProvider;

class ExchangeRateProvider extends ServiceProvider
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
		$this->app->call([$this, 'registerMyService']);
	}

	protected function registerMyService(Request $request)
	{
		$selected = studly_case($request->get('user_selection'));

		$service = (in_array($selected, $this->availableServices))
			// if user selection is OK, then bind it
			? $selected
			// otherwise fallback to the default implementation
			: 'DefaultService';

		$this->app->bind('App\Services\ExchangeRate\Contracts\ExchangeRateContract', "App\Services\ExchangeRate\\{$service}");
	}
}
