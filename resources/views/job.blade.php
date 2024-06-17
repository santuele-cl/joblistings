<x-layout heading="Job ">

    @if ($job)

        <div class="border border-gray-100 ">
            <h2 class="font-bold text-2xl">{{ $job["title"] ?? "" }}</h2>
            <p class="text-lg">{{ $job["salary"] ?? "" }}</p>
        </div>

    @else

        <div>Job not found</div>

    @endif

</x-layout>
