<x-app-layout>
    <div class="py-8">
        <div class="flex">
            <div><a href="{{route('users.followers', auth()->user())}}">{{count(auth()->user()->followers())}}
                    Followers</a></div>
            <div class="ml-4"><a
                    href="{{route('users.followings', auth()->user())}}">{{count(auth()->user()->followings())}}
                    Following</a></div>
        </div>
    </div>

    @if(session()->has('message'))
    <div class="border-gray-500 bg-green-400 p-2 w-full mb-2 rounded-lg" onclick="this.style.display='none'">
        {{session()->get('message')}}
        <span class="text-sm text-gray-500">(click to dismiss)</span>
    </div>
    @elseif(session()->has('error'))
    <div class="alert alert-danger">
        {{session()->get('error')}}
    </div>
    @endif

    <p class="text-xl text-blue-500 font-bold mb-2">Tweets</p>

    @include('_tweets-list', [
    'tweets' => $tweets
    ])
</x-app-layout>