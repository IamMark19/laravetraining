<x-layout>
    <x-slot:headings>
       Job Listing
    </x-slot:headings>
    <ul>
        @foreach ($jobs as $job)
            <li>
                <a href="/jobs/{{$job['id']}}">
                    <strong>{{$job['title']}}</strong> Pays >{{$job['salary']}} per year.
                </a>
            </li>
        @endforeach
    </ul>

</x-layout>
