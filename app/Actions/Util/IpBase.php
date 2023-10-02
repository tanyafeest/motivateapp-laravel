<?php

namespace App\Actions\Util;

use GuzzleHttp\Client;

class IpBase
{
    public $client = null;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'https://api.ipbase.com']);
    }

    /**
     * Get ip information
     *
     * @param  string  $ip
     * @return object   $info
     */
    public function info($ip)
    {
        try {

            $response = $this->client->get('/v2/info?apikey='.config('IPBASE_API_KEY').'&ip='.$ip);

            if ($stream = $response->getBody()) {
                $size = $stream->getSize();
                $info = json_decode((string) $stream->read($size), true, 512, JSON_THROW_ON_ERROR);

                return $info['data'];
            } else {
                return new \stdClass();
            }
        } catch (\Throwable) {
            return new \stdClass();
        }
    }
}
