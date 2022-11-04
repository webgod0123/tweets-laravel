<div class="border border-blue-400 rounded-lg py-4 px-4 my-8 bg-white">
    <form action="/tweets" method="POST" enctype="multipart/form-data">
        @csrf
        <textarea name="body" id="" class=" w-full border-none rounded-lg bg-gray-100" placeholder="What's on your mind"
            required autofocus></textarea>
        <hr class="my-2" />
        <footer class="flex justify-between items-center">
            <div class="flex items-center">
                <button type="submit"
                    class="bg-blue-500 rounded-lg shadow py-1 px-2 text-white h-10 hover:bg-blue-900">Post</button>
            </div>
        </footer>
    </form>
    @error('body')
    <p class="mt-2 text-red-500 text-sm">{{$message}}</p>
    @enderror
</div>