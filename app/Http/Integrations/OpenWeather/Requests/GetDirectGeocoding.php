<?php

namespace App\Http\Integrations\OpenWeather\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetDirectGeocoding extends Request
{
    public function __construct(
        public string $cityName,
        public string $countyCode,
        public string $apiKey
    ) {}

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return "/direct?q={$this->cityName},{$this->countyCode}&limit=1&appid={$this->apiKey}";
    }
}
