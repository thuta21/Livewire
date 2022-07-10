<div>
    <h1 class="text-3xl">Comments</h1>
    {{--    @error('newComment') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror--}}
    <div>
        {{--        @if (session()->has('message'))--}}
        {{--        <div class="p-3 bg-green-300 text-green-800 rounded shadow-sm">--}}
        {{--            {{ session('message') }}--}}
        {{--        </div>--}}
        {{--        @endif--}}
    </div>

    <section>
        {{--        @if($image)--}}
        {{--        <img src={{$image}} width="200" />--}}
        {{--        @endif--}}
        <input type="file" id="image">
    </section>

{{--    <form class="my-4 flex">--}}
        <input type="text" wire:model="newComment" class="w-full rounded border shadow p-2 mr-2 my-2" placeholder="What's in your mind." />
        <div class="py-2">
            <button type="submit" class="p-2 bg-blue-500 w-20 rounded shadow text-white" wire:click="addComment">Add</button>
        </div>
{{--    </form>--}}
    @foreach($comments as $comment)
            <div class="rounded border shadow p-3 my-2">
        <div class="flex justify-between my-2">
            <div class="flex">
                <p class="font-bold text-lg">{{$comment['creator']}}</p>
                <p class="mx-3 py-1 text-xs text-gray-500 font-semibold">{{$comment['created_at']}}
                </p>
            </div>
            <i class="fas fa-times text-red-200 hover:text-red-600 cursor-pointer"></i>
        </div>
        <p class="text-gray-800">{{$comment['body']}}</p>
        {{--        @if($comment->image)--}}
        {{--        <img src="{{$comment->imagePath}}" />--}}
        {{--        @endif--}}
    </div>
    @endforeach

</div>

<script>

</script>
