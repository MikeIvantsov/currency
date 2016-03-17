<?php

/* * *************************************************************************
 *   Copyright (C) 2015 by Mikhail Ivantsov                                   *
 *                                                                         *
 * ************************************************************************* */
namespace App\Services\ExchangeRate\Contracts;
/**
 * Description of ExchangeRateContract
 *
 *
 */
interface ExchangeRateContract
{
	/**
	 * 
	 * @param type $currencies
	 */
	public function getRateValues($currencies = 'USD, EUR');
}
?>