<x-layout heading="Posts">

    <div class="space-y-4">
        <div class="">
            <a href="/posts/create" class="text-lg text-white bg-blue-900 py-2 px-5 rounded-md">Add New</a>
        </div>
        <div class="flex flex-col gap-2 ">
            @foreach ($posts as $post)
                    <a href="/posts/{{ $post["id"] }}" class=" border border-gray-300 flex flex-col  py-4 px-2 rounded-lg">
                        <strong class="font-bold">{{ $post["title"] ?? "" }}</strong>
                        <span class=" ">
                            {{ $post->body}}
                        </span>
                        <span class="font-bold italic text-xs">
                            {{ $post->user->last_name }}
                        </span>

                        @if (count($post->tags ))
                            <div class="flex items-center">
                                <span class="text-sm">Tags :</span>
                                <span class="flex flex-wrap gap-2">
                                    @foreach ($post->tags as $tag)
                                    <span class="text-sm font-bold text-yellow-700 px-2 italic">{{ $tag["name"] }}</span>
                                    @endforeach
                                </span>
                            </div>
                        @endif

                    </a>
            @endforeach
            <div>
                {{ $posts->links() }}
            </div>
        </div>
    </div>

</x-layout>
