<x-layout heading="Job Listings">

    @foreach ($jobs as $job)

        <li class="text-blue-900 hover:underline list-none">
            <a href="/jobs/{{ $job["id"] }}">

                <strong>{{ $job["title"] ?? "" }}</strong> {{ $job["salary"] ?? "" }}

            </a>
        </li>

    @endforeach

</x-layout>
