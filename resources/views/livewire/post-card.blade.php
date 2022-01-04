<div class="mb-8 border rounded-sm">
    <div class="flex justify-between px-4 py-4">
        <div class="flex content-center gap-3">
            <img loading="lazy" src="{{ $profile }}" alt=""
                class="rounded-full h-6 cursor-pointer w-6 flex items-center justify-center">
            <p class="font-semibold text-sm">{{ $creator }}</p>
        </div>
        <div>
            <img loading="lazy" src="https://img.icons8.com/ios-glyphs/30/000000/ellipsis.png"
                class="h-6 cursor-pointer" />
        </div>
    </div>
    <div>
        <img loading="lazy" src="{{ $image }}" alt="" class="w-full">
    </div>
    <div class="flex justify-between px-4 py-4">
        <div class="flex gap-4">
            <img loading="lazy"
                src="{{ $ownLike > 0 ? 'https://img.icons8.com/color/48/000000/like--v3.png':'https://img.icons8.com/material-outlined/24/000000/like--v1.png' }}"
                class="h-6 cursor-pointer" wire:click="like({{ $postId }})" />
            <img loading="lazy" src="https://img.icons8.com/material-outlined/24/000000/sms.png"
                class="h-6 cursor-pointer" />
            <img loading="lazy" src="https://img.icons8.com/material-rounded/24/000000/telegram-app.png"
                class="h-6 cursor-pointer" />
        </div>
        <div>
            <img loading="lazy" src="https://img.icons8.com/material-outlined/24/000000/price-tag.png"
                class="h-6 cursor-pointer" />
        </div>
    </div>
    <div class="px-4 pt-1 pb-4">
        <p class="font-semibold text-base mb-1">{{ $postLikes }} likes</p>
        <div class="pb-4">
            <p class="font-semibold text-sm"> {{ $creator }}</p>
            <p>
                {{ $caption }}
                @if ($readMore)
                <span wire:click="readMore" class="text-blue-400 cursor-pointer">read more</span>
                @endif
            </p>
        </div>

        @if ($postComments > 0)
        <p class="text-sm font-medium text-gray-400 pb-1 cursor-pointer" wire:click="loadComments">
            View all {{ $postComments }} comments
        </p>
        @else
        <p class="text-sm font-medium text-gray-400 pb-1">
            {{ $postComments }} comments
            @endif
        </p>
        @foreach ($comments as $comment)
        <div class="comment flex mb-1">
            <img src="{{ $comment->profile_url }}" class="h-6 rounded-full mr-3 mt-1" />
            <div class="flex flex-col">
                <div class="flex">
                    <p class="text-sm"><span class="font-semibold text-sm mr-1">{{ $comment->username
                            }}</span>{{
                        $comment->comment }}</p>
                </div>
                <div class="mt-1">
                    <p class="text-xs text-gray-500">{{ Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}
                    </p>
                </div>
            </div>

        </div>
        @endforeach
        <p class="text-blue-400 text-xs mb-1 cursor-pointer" wire:click="increaseCommentCount">read more</p>
        <p class="font-normal text-xs lowercase text-gray-500">{{ Carbon\Carbon::parse($createdTime)->diffForHumans() }}
        </p>
    </div>
    <div class="flex justify-between px-4 border-t py-4">
        <div class="flex content-center gap-3">
            <img loading="lazy"
                src="https://img.icons8.com/external-justicon-lineal-justicon/64/000000/external-smile-emoji-justicon-lineal-justicon-2.png"
                class="h-6" />
            <input type="text" class="px-2 w-96  focus:outline-none" placeholder="Add comment..." />
        </div>
        <p class="font-semibold text-sm text-blue-500 cursor-pointer">Post</p>
    </div>
</div>