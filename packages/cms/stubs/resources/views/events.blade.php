<x-events-layout>

    <x-page-content :page="$page">

        @section('title')
        @stop

        <div
            @class([
                "divide-y-2",
                "mt-12" => trim($page->content)
            ])
        >
            @foreach( $events as $event)
                <div class="pt-8 pb-8 first:pt-0 last:pb-0 flex gap-8">
                    <div class="w-1/3">
                        <x-cms-media-image-renderer :mediaImage="$event->featured_image_id" conversion="thumbnail" class="w-full" />
                    </div>
                    <div class="flex-1 prose max-w-none">
                        <h2>{{ $event->title }}</h2>
                        <p class="line-clamp-3">{!! nl2br($event->summary) !!}</p>
                        <a
                            href="{{ route('event', $event->slug) }}"
                            class="px-4 py-2 bg-gray-800 text-white no-underline rounded-xl hover:bg-red-800"
                        >
                            READ MORE
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

    </x-page-content>

</x-events-layout>
