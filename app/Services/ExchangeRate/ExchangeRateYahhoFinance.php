<?php

/* * *************************************************************************
 *   Copyright (C) 2015 by Mikhail Ivantsov                                   *
 *                                                                         *
 * ************************************************************************* */
namespace App\Services\ExchangeRate;
use App\Services\ExchangeRate\Contracts\ExchangeRateContract as ExchangeRate;
/**
 * Description of ExchangeRateYahhoFinance
 *
 *
 */
class ExchangeRateYahhoFinance
implements ExchangeRate
{
	public function getRateValues($currencies = 'USD, EUR')
	{
		
	}
}

?>