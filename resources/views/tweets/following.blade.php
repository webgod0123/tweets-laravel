<x-app-layout>
    <div class="border border-blue-400 rounded-lg py-4 px-4 my-8 bg-white">
        <h2>Follow Users</h2>
        @if(session()->has('message'))
        <div class="border-gray-500 p-2 w-full mb-2 rounded-lg" style="background-color: rgb(251 146 60)"
            onclick="this.style.display='none'">
            {{session()->get('message')}}
            <span class="text-sm text-gray-500">(click to dismiss)</span>
        </div>
        @elseif(session()->has('error'))
        <div class="alert alert-danger">
            {{session()->get('error')}}
        </div>
        @endif
        <form method="POST" action="{{route('users.follow')}}" enctype="multipart/form-data" class="mt-4">
            @csrf
            <x-label for="username" :value="__('Username')" />
            <select class="w-1/3  bg-gray-100" id="id" name="id" required>
                <option value="">Select Username</option>
                @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->username}}</option>
                @endforeach
            </select>
            <hr class="my-2" />
            <footer class="flex justify-between items-center">
                <div class="flex items-center">
                    <button type="submit"
                        class="bg-blue-500 rounded-lg shadow py-1 px-2 text-white h-10 hover:bg-blue-900">Follow
                        user</button>
                </div>
            </footer>
        </form>
        @error('body')
        <p class="mt-2 text-red-500 text-sm">{{$message}}</p>
        @enderror
    </div>
</x-app-layout>