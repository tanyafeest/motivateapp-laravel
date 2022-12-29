<?php

namespace App\Actions\Util;

use GuzzleHttp\Client;

class IpBase {
    /*
    *   Calculate grade year
    *
    *   @param  int current_grade
    *   @return int grade_year
    */
    public function info($ip)
    {
        try {
            $client = new Client(['base_uri' => 'https://api.ipbase.com']);

            $response = $client->get('/v2/info?apikey=' . config('ipbase.api_key') . '&ip=' . $ip);

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