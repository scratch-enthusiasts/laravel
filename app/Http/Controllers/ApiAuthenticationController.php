<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiAuthenticationController extends Controller
{
    // Redirects to spotify to allow the user to login and authenticate
    function spotifyLogin() {
        header('Location: https://accounts.spotify.com/authorize?client_id='.env("SPOTIFY_CLIENT_ID").'&response_type=code&redirect_uri=http%3A%2F%2Flocalhost%2Fmusic-player%2Fpublic%2Fspotifycallback&scope=user-read-private%20playlist-read-private%20playlist-modify-public%20user-read-currently-playing');
        exit; 
    }

    // Callback function after logging in to spotify api, will return an access code and refresh code
    function spotifyCallback() {
        if(isset($_GET['code']) ){
            dd($_GET['code']);
        }
    }
}
