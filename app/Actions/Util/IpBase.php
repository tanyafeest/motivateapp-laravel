<?php

namespace App\Actions\Util;

use GuzzleHttp\Client;

class IpBase {
    public $client = null;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'https://api.ipbase.com']);
    }

    /**
     * Get ip information
     *
     * @param  String   $ip
     * @return Object   $info
    */
    public function info($ip)
    {
        try {

            $response = $this->client->get('/v2/info?apikey=' . config('ipbase.api_key') . '&ip=' . $ip);

            if($stream = $response->getBody()) {
                $size = $stream->getSize();
                $info = json_decode($stream->read($size), true);
                return $info['data'];
            } else {
                return null;
            }
        } catch (\Throwable $th) {
            return null;
        }
    }
}