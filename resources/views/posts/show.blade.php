<x-layout heading="Post">

    @if ($post)

        <div class="flex flex-col gap-2">
            <div class="border border-gray-100 ">
                <h2 class="font-bold text-2xl">{{ $post->id }}</h2>
                <p class="text-lg">{{ $post->body }}</p>
            </div>
            <a href="/posts/{{ $post->id }}/edit" class="self-start border border-blue-900 rounded-md py-2 px-4">Edit</a>
        </div>

    @else

        <div>Post not found</div>

    @endif

</x-layout>
