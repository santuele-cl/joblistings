<x-layout heading="Job ">

    @if ($job)

        <div class="flex flex-col gap-2">
            <div class="border border-gray-100 ">
                <h2 class="font-bold text-2xl">{{ $job->title }}</h2>
                <p class="text-lg">{{ $job->salary }}</p>
            </div>
            <a href="/jobs/{{ $job->id }}/edit" class="self-start border border-blue-900 rounded-md py-2 px-4">Edit</a>
        </div>

    @else

        <div>Job not found</div>

    @endif

</x-layout>
