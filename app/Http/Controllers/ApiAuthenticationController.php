<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiAuthenticationController extends Controller
{
    // Redirects to spotify to allow the user to login and authenticate
    function spotifyLogin() {
        header('Location: https://accounts.spotify.com/authorize?client_id='.env("SPOTIFY_CLIENT_ID").'&response_type=code&redirect_uri=http%3A%2F%2Flocalhost%2Fmusic-player%2Fpublic%2Fspotifycallback&scope=user-read-private%20playlist-read-private%20playlist-modify-public%20user-read-currently-playing');
        exit; 
    }

    // Callback function after logging in to spotify api, will return an access code
    function spotifyCallback() {
        if(isset($_GET['code']) ){
            session(['spotifyCode' => $_GET['code']]);
            $this->getSpotifyAccessToken();
            dd(session()->all());
        }
    }

    // Gets a user's accessToken and refreshToken, both are needed in future api calls
    function getSpotifyAccessToken() {
        $spotifyEncoded = base64_encode("".env('SPOTIFY_CLIENT_ID').":".env('SPOTIFY_CLIENT_SECRET'));
        
        $data = Http::asForm()->withHeaders([
            'Authorization' => 'Basic '.$spotifyEncoded,
        ])->post('https://accounts.spotify.com/api/token', [
            'grant_type' => 'authorization_code',
            'code' => session('spotifyCode'),
            'redirect_uri' => 'http://localhost/music-player/public/spotifycallback',
        ]);
        
        $dataJSON = $data->json();

        if(isset($dataJSON['error']['status'])) {
            if($dataJSON['error']['status'] == '401' || $dataJSON['error']['status'] == '400') {
                Session::forget('spotifyCode');
                return redirect('/');
            }
        }

        session(['spotifyAccess' => $dataJSON['access_token']]);
        session(['spotifyRefresh' => $dataJSON['refresh_token']]); 
    }

}
