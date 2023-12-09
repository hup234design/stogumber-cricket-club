<div>
    <div class="grid gap-12 lg:grid-cols-3">

        @foreach( $posts as $post )
            <div class="shadow-lg bg-white">
                <x-cms-media-image-renderer :mediaImage="$post->featured_image_id" conversion="thumbnail" class="w-full" />
                <div class="prose prose-sm px-4 py-8">
                    <h2>
                        {{ $post->title }}
                    </h2>
                    <p class="line-clamp-3">
                        {{ $post->summary }}
                    </p>
                    <div class="mt-12">
                        <a href="{{ route('post', $post->slug) }}" class="no-underline px-6 py-2 rounded-lg bg-gray-200">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
