<?php

namespace App\Repositories\Ultra;

use GuzzleHttp\Client as GuzzleClient;

class UltraClient extends GuzzleClient
{
    public function __construct()
    {
        parent::__construct([
            'base_uri' => config('ultra.base_uri'),
        ]);
    }
}
