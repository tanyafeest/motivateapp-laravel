<?php

namespace App\Actions\Util;

use Exception;
use GuzzleHttp\Client;

class Spotify
{
    private readonly \GuzzleHttp\Client $client;

    private ?array $headers = null;

    private ?string $status = null;

    private $id;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'https://api.spotify.com']);

        // get spotify id and access token if spotify connected
        if (session()->has('temp_spotify_id')) {
            $this->headers = [
                'Authorization' => 'Bearer '.session('temp_spotify_access_token'),
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ];

            $this->id = session('temp_spotify_id');
            $this->status = 'CONNECTED';
        } else {
            $this->status = 'DISCONNECTED';
        }
    }

    /**
     * Get status of spotify
     *
     * @return string
     */
    public function status()
    {
        return $this->status;
    }

    /**
     * Get user's top items
     *
     * @param  int  $limit = 10
     * @param  int  $offset = 0
     * @param  string  $time_range = medium_term
     * @return array
     */
    public function getTopItems($limit = 10, $offset = 0, $time_range = 'medium_term')
    {
        $endpoint = 'v1/me/top/tracks?limit='.$limit.'&offset='.$offset.'&time_range='.$time_range;

        try {
            $response = $this->client->get($endpoint, ['headers' => $this->headers]);

            $stream = $response->getBody();
            $size = $stream->getSize();

            return json_decode($stream->read($size), true, 512, JSON_THROW_ON_ERROR);

        } catch (Exception $e) {
            if ($e->getCode() == 401) {
                $this->status = 'TOKEN_EXPIRED';
            }

            if ($e->getCode() == 403) {
                $this->status = 'USER_NOT_REGISTERED';
            }

            return [
                'items' => [],
            ];
        }
    }

    /**
     * Search track
     *
     * @param  string  $query
     * @param  int  $limit = 5
     * @param  string  $include_external = audio
     * @return array
     */
    public function search($query, $limit = 5, $include_external = 'audio')
    {
        $endpoint = 'v1/search?query='.$query.'&type=track&limit='.$limit.'&include_external='.$include_external;

        try {
            $response = $this->client->get($endpoint, ['headers' => $this->headers]);

            $stream = $response->getBody();
            $size = $stream->getSize();
            $res = json_decode($stream->read($size), true, 512, JSON_THROW_ON_ERROR);

            return $res['tracks']['items'];
        } catch (Exception $e) {
            if ($e->getCode() == 401) {
                $this->status = 'TOKEN_EXPIRED';
            }

            return [];
        }
    }

    /**
     * Get track detail
     *
     * @param  string  $id
     * @return array
     */
    public function track($id)
    {
        $endpoint = 'v1/tracks/'.$id;

        try {
            $response = $this->client->get($endpoint, ['headers' => $this->headers]);

            $stream = $response->getBody();
            $size = $stream->getSize();

            return json_decode($stream->read($size), true, 512, JSON_THROW_ON_ERROR);

        } catch (Exception $e) {
            if ($e->getCode() == 401) {
                $this->status = 'TOKEN_EXPIRED';
            }

            return [];
        }
    }

    /**
     * Get artist detail
     *
     * @param  string  $id
     * @return array
     */
    public function artist($id)
    {
        $endpoint = 'v1/artists/'.$id;

        try {
            $response = $this->client->get($endpoint, ['headers' => $this->headers]);

            $stream = $response->getBody();
            $size = $stream->getSize();

            return json_decode($stream->read($size), true, 512, JSON_THROW_ON_ERROR);

        } catch (Exception $e) {
            if ($e->getCode() == 401) {
                $this->status = 'TOKEN_EXPIRED';
            }

            return [];
        }
    }

    public function createNewPlaylist($name = 'New Playlist', $description = 'New Playlist Description', $public = true, $collaborative = false)
    {
        $endpoint = 'v1/users/'.$this->id.'/playlists';
        $body = [
            'name' => $name,
            'public' => $public,
            'collaborative' => $collaborative,
            'description' => $description,
        ];

        try {
            $response = $this->client->post($endpoint, ['headers' => $this->headers, 'body' => json_encode($body, JSON_THROW_ON_ERROR)]);

            $stream = $response->getBody();
            $size = $stream->getSize();

            return json_decode($stream->read($size), true, 512, JSON_THROW_ON_ERROR);

        } catch (Exception $e) {
            if ($e->getCode() == 401) {
                $this->status = 'TOKEN_EXPIRED';
            }

            return json_decode('', true);
        }
    }

    public function addTracksToPlaylist($playlist_id, $uris, $position = 0)
    {
        $endpoint = 'v1/playlists/'.$playlist_id.'/tracks';
        $body = [
            'uris' => $uris,
            'position' => $position,
        ];

        try {
            $response = $this->client->post($endpoint, ['headers' => $this->headers, 'body' => json_encode($body, JSON_THROW_ON_ERROR)]);

            $stream = $response->getBody();
            $size = $stream->getSize();

            return json_decode($stream->read($size), true, 512, JSON_THROW_ON_ERROR);
        } catch (Exception $e) {
            if ($e->getCode() == 401) {
                $this->status = 'TOKEN_EXPIRED';
            }

            return json_decode('', true);
        }
    }
}
