<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="/css/app.css" rel="stylesheet">
        <livewire:styles />
</head>

<body class="">
        <div class="p-3 grid grid-cols-3 justify-items-center items-center border-b">
                <div class="">
                        <img src="https://www.instagram.com/static/images/web/mobile_nav_type_logo-2x.png/1b47f9d0e595.png"
                                alt="" class="h-5 cursor-pointer">
                </div>
                <div class="">
                        <input class="border border-gray-300 focus:outline-none focus:border-gray-400 rounded-sm px-2 bg-gray-100"
                                placeholder="Search" />
                </div>
                <div class="flex gap-7">
                        <a href="{{ URL::to('/') }}"><img
                                        src="https://img.icons8.com/material-outlined/30/000000/home--v2.png"
                                        class="h-6 cursor-pointer" /></a>
                        <a href="{{ URL::to('/inbox') }}"><img
                                        src="https://img.icons8.com/external-prettycons-lineal-prettycons/30/000000/external-messenger-social-media-prettycons-lineal-prettycons.png"
                                        class="h-6 cursor-pointer" /></a>
                        <a href="{{ URL::to('/') }}"><img src="https://img.icons8.com/pastel-glyph/30/000000/add.png"
                                        class="h-6 cursor-pointer" /></a>
                        <a href="{{ URL::to('/explore') }}"><img
                                        src="https://img.icons8.com/ios/50/000000/compass--v1.png"
                                        class="h-6 cursor-pointer" /></a>
                        <a href="{{ URL::to('/activity') }}"><img
                                        src="https://img.icons8.com/material-outlined/24/000000/like--v1.png"
                                        class="h-6 cursor-pointer" /></a>
                        <a href="{{ URL::to('/profile') }}/{{ App\Models\User::find(1)->username }}"><img
                                        src="data:image/png;base64,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"
                                        class="h-6 cursor-pointer rounded-full" /></a>
                </div>
        </div>
        <div class="grid grid-cols-6 gap-4">
                <div class="col-start-2 col-span-4">
                        {{ $slot }}
                </div>
        </div>
        <livewire:scripts />
        <script type="text/javascript">
                window.onscroll = function (ev) {
                    if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                        window.livewire.emit('load-more');
                    }
                };
        
        </script>
</body>

</html>