<?php

namespace App\Services;

use GuzzleHttp\Client;

class TextToSpeechService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function convertTextToSpeech($text)
    {
        $url = 'https://voicerss-text-to-speech.p.rapidapi.com/';
        $apiKey = env('RAPIDAPI_KEY'); // Get the API key from the .env file

        $response = $this->client->request('POST', $url, [
            'headers' => [
                'X-RapidAPI-Key' => $apiKey,
                'X-RapidAPI-Host' => 'voicerss-text-to-speech.p.rapidapi.com',
            ],
            'form_params' => [
                'key' => $apiKey,
                'src' => $text,
                'hl' => 'en-us', // Change to the language you need
                'r' => '0',      // Rate of speech
                'c' => 'mp3',    // Output format
                'f' => '44khz_16bit_stereo', // Output quality
            ],
        ]);

        return $response->getBody()->getContents();
    }
}
