<?php

namespace KuCoin\SDK\PublicApi;

use KuCoin\SDK\Http\Request;
use KuCoin\SDK\KuCoinApi;

/**
 * Class Symbol
 * @package KuCoin\SDK\PublicApi
 * @see https://docs.kucoin.com/#symbols
 */
class Symbol extends KuCoinApi
{
    /**
     * Get a list of symbol
     * @param string|null $market
     * @return array
     * @throws \KuCoin\SDK\Exceptions\BusinessException
     * @throws \KuCoin\SDK\Exceptions\HttpException
     * @throws \KuCoin\SDK\Exceptions\InvalidApiUriException
     */
    public function getList($market = null)
    {
        $response = $this->call(Request::METHOD_GET, '/api/v1/symbols', compact('market'));
        return $response->getApiData();
    }

    /**
     * Get ticker
     * @param string $symbol
     * @return array
     * @throws \KuCoin\SDK\Exceptions\BusinessException
     * @throws \KuCoin\SDK\Exceptions\HttpException
     * @throws \KuCoin\SDK\Exceptions\InvalidApiUriException
     */
    public function getTicker($symbol)
    {
        $response = $this->call(Request::METHOD_GET, '/api/v1/market/orderbook/level1', compact('symbol'));
        return $response->getApiData();
    }

    /**
     * Get all tickers
     * @return array
     * @throws \KuCoin\SDK\Exceptions\BusinessException
     * @throws \KuCoin\SDK\Exceptions\HttpException
     * @throws \KuCoin\SDK\Exceptions\InvalidApiUriException
     */
    public function getAllTickers()
    {
        $response = $this->call(Request::METHOD_GET, '/api/v1/market/allTickers');
        return $response->getApiData();
    }

    /**
     * Get part order book(aggregated)
     * @param string $symbol
     * @param int $depth within 20 or 100, default 20.
     * @return array
     * @throws \KuCoin\SDK\Exceptions\BusinessException
     * @throws \KuCoin\SDK\Exceptions\HttpException
     * @throws \KuCoin\SDK\Exceptions\InvalidApiUriException
     */
    public function getAggregatedPartOrderBook($symbol, $depth = 20)
    {
        $response = $this->call(Request::METHOD_GET, '/api/v1/market/orderbook/level2_' . intval($depth), compact('symbol'));
        return $response->getApiData();
    }

    /**
     * Get full order book(aggregated)
     * @param string $symbol
     * @return array
     * @throws \KuCoin\SDK\Exceptions\BusinessException
     * @throws \KuCoin\SDK\Exceptions\HttpException
     * @throws \KuCoin\SDK\Exceptions\InvalidApiUriException
     */
    public function getAggregatedFullOrderBook($symbol)
    {
        $response = $this->call(Request::METHOD_GET, '/api/v1/market/orderbook/level2', compact('symbol'));
        return $response->getApiData();
    }

    /**
     * Get full order book(atomic)
     * @param string $symbol
     * @return array
     * @throws \KuCoin\SDK\Exceptions\BusinessException
     * @throws \KuCoin\SDK\Exceptions\HttpException
     * @throws \KuCoin\SDK\Exceptions\InvalidApiUriException
     */
    public function getAtomicFullOrderBook($symbol)
    {
        $response = $this->call(Request::METHOD_GET, '/api/v1/market/orderbook/level3', compact('symbol'));
        return $response->getApiData();
    }

    /**
     * Get trade histories
     * @param string $symbol
     * @return array
     * @throws \KuCoin\SDK\Exceptions\BusinessException
     * @throws \KuCoin\SDK\Exceptions\HttpException
     * @throws \KuCoin\SDK\Exceptions\InvalidApiUriException
     */
    public function getTradeHistories($symbol)
    {
        $response = $this->call(Request::METHOD_GET, '/api/v1/market/histories', compact('symbol'));
        return $response->getApiData();
    }

    /**
     * Get historic rates
     * @param string $symbol
     * @param int $beginAt
     * @param int $endAt
     * @param string $type
     * @return array
     * @throws \KuCoin\SDK\Exceptions\BusinessException
     * @throws \KuCoin\SDK\Exceptions\HttpException
     * @throws \KuCoin\SDK\Exceptions\InvalidApiUriException
     */
    public function getHistoricRates($symbol, $beginAt, $endAt, $type)
    {
        $response = $this->call(
            Request::METHOD_GET,
            '/api/v1/market/candles',
            compact('symbol', 'beginAt', 'endAt', 'type')
        );
        return $response->getApiData();
    }

    /**
     * Get 24hr stats
     * @param string $symbol
     * @return array
     * @throws \KuCoin\SDK\Exceptions\BusinessException
     * @throws \KuCoin\SDK\Exceptions\HttpException
     * @throws \KuCoin\SDK\Exceptions\InvalidApiUriException
     */
    public function get24HStats($symbol)
    {
        $response = $this->call(Request::METHOD_GET, '/api/v1/market/stats', compact('symbol'));
        return $response->getApiData();
    }

    /**
     * Get market list
     * @return array
     * @throws \KuCoin\SDK\Exceptions\BusinessException
     * @throws \KuCoin\SDK\Exceptions\HttpException
     * @throws \KuCoin\SDK\Exceptions\InvalidApiUriException
     */
    public function getMarkets()
    {
        $response = $this->call(Request::METHOD_GET, '/api/v1/markets');
        return $response->getApiData();
    }
}