<x-app-layout>
    <header class="mb-8 relative">
        <div class="flex justify-between items-center mb-8">
            <div style="max-width: 270px">
                <a href="{{route('users.show', $user->username)}}">
                    <h2 class="font-blod text-2xl">{{$user->name}}</h2>
                </a>
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

        <div class="flex items-center">
            <div><a href="{{route('users.followers', $user->username)}}">{{count($user->followers())}} Followers</a>
            </div>
            <div class="ml-4"><a href="{{route('users.followings', $user->username)}}">{{count($user->followings())}}
                    Following</a></div>
            @if(!auth()->user()->followingExists($user))
            <div class="ml-4">
                <x-follow-button :user="$user"></x-follow-button>
            </div>
            @endif
        </div>

    </header>

    <p class="text-xl text-blue-500 font-bold mb-2">Tweets</p>

    @include('_tweets-list', [
    'tweets' => $tweets
    ])
</x-app-layout>