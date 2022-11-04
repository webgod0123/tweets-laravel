<div class="flex p-4 border-b {{$loop->last ? '' : 'border-b-gray-300'}}">
    <div>
        <div class="flex justify-between" style="width: 600px">
            <div>
                <h5 class="font-bold mb-4">
                    <a href="{{route('users.show', $tweet->user)}}">
                        {{ $tweet->user->name }}, <span>@</span>{{$tweet->user->username}}
                    </a>
                    <span>- {{$tweet->created_at}}</span>
                </h5>
            </div>
        </div>
        <div class="flex justify-between">
            <p class="text-sm">
                {{ $tweet->body }}
            </p>
        </div>
    </div>
</div>