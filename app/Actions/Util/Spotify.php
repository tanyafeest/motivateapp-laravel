<?php

namespace App\Actions\Util;

use GuzzleHttp\Client;
use Exception;

class Spotify {
    private $client;
    private $headers;
    private $status;
    private $id;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'https://api.spotify.com']);

        // get spotify id and access token if spotify connected
        if(session()->has("temp_spotify_id")) {
            $this->headers = [
                'Authorization' => 'Bearer ' . session("temp_spotify_access_token"),
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ];

            $this->id = session("temp_spotify_id");
            $this->status = 'CONNECTED';
        } else {
            $this->status = 'DISCONNECTED';
        }
    }

    /**
     * Get status of spotify
     * 
     * @return String 
     */
    public function status()
    {
        return $this->status;
    }

    /**
     * Get user's top items
     * 
     * @param Integer $limit = 10
     * @param String $offset = 0
     * @param String $time_range = medium_term
     * 
     * @return Array
     */
    public function getTopItems($limit = 10, $offset = 0, $time_range = 'medium_term')
    {
        $endpoint = "v1/me/top/tracks?limit=" . $limit . "&offset=" . $offset . "&time_range=" . $time_range;

        try {
            $response = $this->client->get($endpoint, ['headers' => $this->headers]);

            if($stream = $response->getBody()) {
                $size = $stream->getSize();
                return json_decode($stream->read($size), true);
            }
        } catch (Exception $e) {
            if($e->getCode() == 401) {
                $this->status = 'TOKEN_EXPIRED';
            }

            if($e->getCode() == 403) {
                $this->status = 'USER_NOT_REGISTERED';
            }

            return [
                'items' => []
            ];
        }
    }

    /**
     * Search track
     * 
     * @param String $query
     * @param Integer $limit = 5
     * @param String $include_external = audio
     * 
     * @return Array 
     */
    public function search($query, $limit = 5, $include_external = 'audio')
    {
        $endpoint = "v1/search?query=" . $query . "&type=track&limit=" . $limit . "&include_external=" . $include_external; 

        try {
            $response = $this->client->get($endpoint, ['headers' => $this->headers]);

            if($stream = $response->getBody()) {
                $size = $stream->getSize();
                $res = json_decode($stream->read($size), true);

                return $res['tracks']['items'];
            }
        } catch (Exception $e) {
            if($e->getCode() == 401) {
                $this->status = 'TOKEN_EXPIRED';
            }

            return null;
        }
    }

    /**
     * Get track detail
     * 
     * @param String $id
     * 
     * @return Array
     */
    public function track($id)
    {
        $endpoint = "v1/tracks/" . $id;

        try {
            $response = $this->client->get($endpoint, ['headers' => $this->headers]);

            if($stream = $response->getBody()) {
                $size = $stream->getSize();
                return json_decode($stream->read($size), true);
            }
        } catch (Exception $e) {
            if($e->getCode() == 401) {
                $this->status = 'TOKEN_EXPIRED';
            }
            
            return null;
        }
    }

    /**
     * Get artist detail
     * 
     * @param String $id
     * 
     * @return Array
     */
    public function artist($id)
    {
        $endpoint = "v1/artists/" . $id;

        try {
            $response = $this->client->get($endpoint, ['headers' => $this->headers]);

            if($stream = $response->getBody()) {
                $size = $stream->getSize();
                return json_decode($stream->read($size), true);
            }
        } catch (Exception $e) {
            if($e->getCode() == 401) {
                $this->status = 'TOKEN_EXPIRED';
            }
            
            return null;
        }
    }

    /**
     * Create new playlist
     * 
     * @param String $name = "New Playlist"
     * @param String $description = "New Playlist Description"
     * @param Boolean $public = true
     * @param Boolean $collaborative = false
     * 
     * @return JSON
     */
    public function createNewPlaylist($name = "New Playlist", $description = "New Playlist Description", $public = true, $collaborative = false)
    {
        $endpoint = "v1/users/" . $this->id . "/playlists";
        $body = [
            "name" => $name,
            "public" => $public,
            "collaborative" => $collaborative,
            "description" => $description
        ];

        try {
            $response = $this->client->post($endpoint, ['headers' => $this->headers, 'body' => json_encode($body)]);

            if($stream = $response->getBody()) {
                $size = $stream->getSize();
                return json_decode($stream->read($size), true);
            }
        } catch (Exception $e) {
            if($e->getCode() == 401) {
                $this->status = 'TOKEN_EXPIRED';
            }
            
            return null;
        }
    }

    /**
     * Add track to specific playlist
     * 
     * @param String $playlist_id
     * @param Array $uris
     * @param Integer $position = 0
     * 
     * @return JSON
     */
    public function addTracksToPlaylist($playlist_id, $uris, $position = 0)
    {
        $endpoint = "v1/playlists/" . $playlist_id . "/tracks";
        $body = [
            "uris" => $uris,
            "position" => $position
        ];

        try {
            $response = $this->client->post($endpoint, ['headers' => $this->headers, 'body' => json_encode($body)]);

            if($stream = $response->getBody()) {
                $size = $stream->getSize();
                return json_decode($stream->read($size), true);
            }
        } catch (Exception $e) {
            dd($e);
            if($e->getCode() == 401) {
                $this->status = 'TOKEN_EXPIRED';
            }
            
            return null;
        }
    }
}