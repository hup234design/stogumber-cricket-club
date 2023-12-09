<x-app-layout>

    <div class="container flex divide-x-2">

        <div class="flex-1 pr-8">

            {{ $slot  }}

        </div>

        <div class="w-64 pl-8 prose">

            <h2>Featured Posts</h2>

            @foreach($featuredPosts as $post)
                <a href="{{ route('post', $post->slug) }}" class="block no-underline">
                    <h4 class="my-0">{{ $post->title }}</h4>
                    <p>{{ $post->publish_at }}</p>
                </a>
            @endforeach

            <h2>Recent Posts</h2>

            @foreach($latestPosts as $post)
                <a href="{{ route('post', $post->slug) }}" class="block no-underline">
                    <h4 class="my-0">{{ $post->title }}</h4>
                    <p>{{ $post->publish_at }}</p>
                </a>
            @endforeach

            <h2>Categories</h2>

            @foreach( $categories as $category )

                <p>
                    {{ $category->title }} ( {{ $category->visible_posts_count }} )
                </p>
            @endforeach

            <h2>Archives</h2>

        </div>

    </div>

</x-app-layout>
