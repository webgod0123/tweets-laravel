<x-app-layout>
    @unless(auth()->user()->is($user))
    <a href="{{route('users.show', $user->username)}}">
        <h2 class="font-blod text-2xl">{{$user->name}}</h2>
    </a>
    @endunless
    <div class="flex justify-between items-center py-8">
        @if(auth()->user()->is($user))
        <h2>My Followings</h2>
        @else
        <h2>{{$user->name}}'s Followings</h2>
        @endif

        @if(auth()->user()->is($user))
        <a href="{{route('followings.user')}}">
            <button class="bg-blue-500 rounded-lg shadow py-1 px-2 text-white h-10 hover:bg-blue-900">Follow another
                user</button>
        </a>
        @endif
    </div>

    @include('_follow-list', [
    'users' => $user->followings()
    ])
</x-app-layout>