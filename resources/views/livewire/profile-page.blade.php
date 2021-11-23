<div class="grid grid-cols-3 gap-5 p-10">
    <div class="">
        <img loading="lazy" src="{{ $user->profile_url }}"
            class="rounded-full h-36 w-36 flex items-center justify-center" />
    </div>
    <div class="col-span-2">
        <div class="flex gap-10">
            <p class="text-2xl font-thin">{{ $user->username }}</p>
            <button class="border border-gray-200 px-3 rounded text-sm font-medium">Edit Profile</button>
        </div>
        <div class="flex gap-10 mt-5">
            <p class="font-normal"><strong>{{ count($user->posts) }}</strong> posts</p>
            <p class="font-normal"><strong>388</strong> followers</p>
            <p class="font-normal"><strong>366</strong> following</p>
        </div>
        <div class="mt-5">
            {!! $user->bio !!}
        </div>
    </div>
</div>

<div class="flex mt-10 gap-5">
    <x-status-component />
    <x-status-component />
    <x-status-component />
    <x-status-component />
    <x-status-component />
    <x-status-component />
</div>
<div class="flex justify-evenly border-t mt-10">
    <div class="flex p-3 gap-2">
        <img src="https://img.icons8.com/ios-glyphs/30/000000/grid.png" class="h-4" />
        <p class="uppercase font-medium text-xs text-gray-400 tracking-widest">Posts</p>
    </div>
    <div class="flex p-3 gap-2">
        <img src="https://img.icons8.com/external-vitaliy-gorbachev-lineal-vitaly-gorbachev/60/000000/external-player-stay-home-vitaliy-gorbachev-lineal-vitaly-gorbachev.png"
            class="h-4" />
        <p class="uppercase font-medium text-xs text-gray-400 tracking-widest">REELS</p>
    </div>
    <div class="flex p-3 gap-2">
        <img src="https://img.icons8.com/ios-glyphs/30/000000/play--v1.png" class="h-4" />
        <p class="uppercase font-medium text-xs text-gray-400 tracking-widest">VIDEOS</p>
    </div>
    <div class="flex p-3 gap-2">
        <img src="https://img.icons8.com/ios/50/000000/back-to-draft.png" class="h-4" />
        <p class="uppercase font-medium text-xs text-gray-400 tracking-widest">SAVED</p>
    </div>
    <div class="flex p-3 gap-2">
        <img src="https://img.icons8.com/ios-glyphs/30/000000/change-user-male.png" class="h-4" />
        <p class="uppercase font-medium text-xs text-gray-400 tracking-widest">TAGGED</p>
    </div>
</div>
@if (!Auth::check())
@if (!$user->posts->isEmpty())
<div class="grid grid-cols-3 gap-10 mt-2 justify-items-center">
    @foreach ($user->posts as $post)
    <x-grid-post-component :image="$post->image" />
    @endforeach
</div>
@else
<p class="text-center p-5 text-sm font-semibold uppercase tracking-widest my-10">There is no post to show
</p>
@endif
@endif