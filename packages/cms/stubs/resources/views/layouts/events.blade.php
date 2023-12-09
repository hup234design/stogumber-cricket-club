<x-app-layout>

    <div class="container flex divide-x-2">

        <div class="flex-1 pr-8">

            {{ $slot  }}

        </div>

        <div class="w-64 pl-8 prose">

            <h2>Upcoming Events</h2>

            @foreach($upcomingEvents as $event)
                <a href="{{ route('event', $event->slug) }}" class="block no-underline">
                    <h4 class="my-0">{{ $event->title }}</h4>
                    <p>{{ $event->date }}</p>
                </a>
            @endforeach

            <h2>Categories</h2>

            @foreach( $categories as $category )
                <p>
                    {{ $category->title }} ( {{ $category->upcoming_events_count }} )
                </p>
            @endforeach

            <h2>Archives</h2>

        </div>

    </div>

</x-app-layout>
