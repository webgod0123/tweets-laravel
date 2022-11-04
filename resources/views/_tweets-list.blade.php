<div class="border border-blue-400 rounded-lg mb-8 bg-white">
    @forelse ($tweets as $tweet)
    @include('_tweet')
    @empty
    <p class="p-4">Nothing yet.</p>
    @endforelse
    {{ $tweets->links()}}
</div>