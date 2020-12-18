<?php
declare(strict_types=1);

namespace App\Domain\Spotify;

use GuzzleHttp\Client;

class SpotifyApi implements SpotifyApiInterface
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $clientId;

    /**
     * @var string
     */
    protected $clientSecret;

    /**
     * @var string|null
     */
    protected $token;

    /**
     * SpotifyApi constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @return bool
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function authenticate() : bool{
        $response = $this->client->post(
            self::SPOTIFY_URL_TOKEN,
            $this->getCredentials()
        );

        $data = json_decode($response->getBody()->getContents());

        if($data){
            $this->token = (isset($data->access_token)) ? $data->access_token:null;
        }

        return $response->getStatusCode() == self::HTTP_SUCCEED;
    }

    /**
     * @param $query
     * @return mixed|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function search($query){
        if(!$this->token){
            $this->authenticate();
        }
        $data = null;

        if($this->token){
            $response = $this->client->get(
                self::SPOTIFY_API_URL_BASE . self::SPOTIFY_URL_SEARCH,
                [
                    'headers'   => $this->getHeaders(),
                    'query'     => $this->getBody($query, self::SPOTIFY_ALBUM_TYPE)
                ]
            );

            $data = json_decode($response->getBody()->getContents());
        }

        return (isset($data->albums)) ? $data->albums : $data;
    }

    /**
     * @return string[][]
     */
    private function getCredentials() : array{
        return [
            'form_params' => [
                'grant_type'        => self::SPOTIFY_GRANT_TYPE,
                'client_id'         => $this->getClientId(),
                'client_secret'     => $this->getClientSecret(),
            ]
        ];
    }

    /**
     * @return string[]
     */
    private function getHeaders() : array{
        return [
            "Authorization" => self::TOKEN_BEARER . $this->token
        ];
    }

    /**
     * @param $query
     * @param $type
     * @return array
     */
    private function getBody($query, $type) : array{
        return [
            'query' => $query,
            'type'  => $type
        ];
    }

    /**
     * @return string
     */
    private function getClientId() : string
    {
        return 'a2df81d85e124f3d8151bbec2b1607dd';
    }

    /**
     * @return string
     */
    private function getClientSecret(): string
    {
        return '49ec7d43a2cf472c92cb879a67775d9d';
    }
}