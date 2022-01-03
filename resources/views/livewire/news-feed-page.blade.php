<div class="grid grid-cols-10 my-8">
    <div class="col-span-6" wire:init="loadPosts">
        @if (!empty($posts))
        @foreach ($posts as $post)
        <livewire:post-card :post="$post" :wire:key="$post->id" />
        @endforeach
        @else
        <livewire:animate-post-card />
        @endif

    </div>
    <div class="col-span-4">
    </div>
</div>