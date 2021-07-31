<html lang="en">
@include('components.head')
<body class="bg-gradient-to-r from-pink-500 to-red-500" >
<div role="main">
    <div class="container-fluid text-center justify-content-center">
        <div class="index-center">
            <h1 class=" justify-content-center pb-5 pt-5" role="heading" aria-level="1">
                Music party
            </h1>
            <div class="index">
                <p class="lead text-card pb-3">Using music player you can collaborate on your playlists and allow your friends to control your music with you</p>
                <a href="{{ route('spotifyLogin') }}" class="btn btn-primary my-3">Connect your Spotify!</a>
                </p>
            </div>
        </div>
    </div>
</div>

</body>
</html>