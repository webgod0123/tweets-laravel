<x-app-layout>
    @unless(auth()->user()->is($user))
    <a href="{{route('users.show', $user->username)}}">
        <h2 class="font-blod text-2xl">{{$user->name}}</h2>
    </a>
    @endunless
    <div class="py-8">
        @if(auth()->user()->is($user))
        <h2>My Followers</h2>
        @else
        <h2>{{$user->name}}'s Followers</h2>
        @endif
    </div>

    @include('_follow-list', [
    'users' => $user->followers()
    ])
</x-app-layout>