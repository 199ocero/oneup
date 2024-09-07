<?php

namespace App\Http\Integrations\OpenWeather\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetWeather extends Request
{
    public function __construct(
        public string $latitude,
        public string $longitude,
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
        return "/onecall?lat={$this->latitude}&lon={$this->longitude}&appid={$this->apiKey}";
    }
}
