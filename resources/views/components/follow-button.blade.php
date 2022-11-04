@unless (auth()->user()->is($user))
<form action="/users/follow" method="POST">
    @csrf
    <input type="hidden" value="{{$user->id}}" name="id" />
    <button type="submit" class='bg-green-700
    rounded-lg shadow px-3 py-2 text-white text-md hover:bg-blue-400'>
        Follow
    </button>
</form>
@endunless