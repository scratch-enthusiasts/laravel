<html lang="en">
@include('components.head')
<body class="bg-gradient-to-r from-pink-500 to-red-500" >
    <div class="container bg-cover min-h-screen w-full flex justify-center items-center">
        <div class="w-2/3 bg-white p-5 rounded-xl bg-opacity-40 backdrop-filter backdrop-blur-lg">
            <div class="header-card flex justify-between font-semibold">
                <div class="text-center">
                    <h1 class="text-xl pb-5 pt-5" role="heading" aria-level="1">
                        Music party
                    </h1>
                    <div class="index">
                        <p class="text-lg pb-3">Using music party you can collaborate on your playlists and allow your friends to control your music with you</p>
                        
                        <div class="mb-4">
                            <a href="{{ route('spotifyLogin') }}" class='flex w-52 bg-gradient-to-r from-indigo-500 via-pink-500 to-yellow-500 hover:from-indigo-600 hover:via-pink-600 hover:to-red-600 focus:outline-none text-white text-lg font-bold shadow-md rounded-full mx-auto p-2'>
                                <div class="flex sm:flex-cols-12 gap-2">
                                    <div class="content-center col-span-2">Connect your Spotify!</div>
                                </div>    
                            </a>
                        </div>
                        
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>