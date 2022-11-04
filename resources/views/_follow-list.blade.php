<div class="border border-blue-400 rounded-lg mb-8 bg-white">
    @forelse ($users as $user)
    <div class="flex p-4 border-b {{$loop->last ? '' : 'border-b-gray-300'}} items-center justify-between">
        <a href="{{route('users.show', $user)}}">
            {{$user->name}} (@<span>{{$user->username}}</span>)
        </a>
        @if(!auth()->user()->followingExists($user))
        <x-follow-button :user="$user"></x-follow-button>
        @endif
    </div>

    @empty
    <p class="p-2">No friends yet</p>
    @endforelse

    {{ $users->links()}}
</div>