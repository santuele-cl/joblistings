<x-layout heading="Job Listings">

    <div class="space-y-4">
        <div class="">
            <a href="/jobs/create" class="text-lg text-white bg-blue-900 py-2 px-5 rounded-md">Add New</a>
        </div>
        <div class="flex flex-col gap-2 ">
            @foreach ($jobs as $job)
                    <a href="/jobs/{{ $job["id"] }}" class=" border border-gray-300 flex flex-col  py-4 px-2 rounded-lg">
                        <span class="text-blue-900 font-bold">
                            {{ $job->employer->name }}
                        </span>
                        <span>
                            <strong class="font-bold">{{ $job["title"] ?? "" }}</strong> {{ $job["salary"] ?? "" }}
                        </span>
                        @if (count($job->tags ))
                            <div class="flex items-center">
                                <span class="text-sm">Tags :</span>
                                <span class="flex flex-wrap gap-2">
                                    @foreach ($job->tags as $tag)
                                    <span class="text-sm font-bold text-yellow-700 px-2 italic">{{ $tag["name"] }}</span>
                                    @endforeach
                                </span>
                            </div>
                        @endif
                    </a>
            @endforeach
            <div>
                {{ $jobs->links() }}
            </div>
        </div>
    </div>

</x-layout>
