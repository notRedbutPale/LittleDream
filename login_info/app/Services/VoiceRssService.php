<?php

namespace App\Services;

class VoiceRssService
{
    protected $apiKey;

    public function __construct()
    {
        // Retrieve the API key from the .env file
        $this->apiKey = env('VOICE_RSS_API_KEY'); 
    }

    public function convertTextToSpeech($text, $language = 'en-us', $format = 'mp3')
    {
        $url = 'https://api.voicerss.org/';
        $params = [
            'key' => $this->apiKey,
            'src' => $text,
            'hl' => $language,
            'r' => 0,
            'c' => $format,
            'f' => '44khz_16bit_stereo',
        ];

        // Build the query string and make the HTTP request
        $query = http_build_query($params);
        $response = file_get_contents("{$url}?{$query}");

        if (!$response) {
            throw new \Exception('Error with Voice RSS API request.');
        }

        return $response;
    }
}
