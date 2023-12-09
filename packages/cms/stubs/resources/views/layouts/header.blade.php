<header class="h-32 bg-gray-800">
    <div class="h-full container flex justify-between items-center">
        <a class="text-xl font-black text-white" href="{{ route('home') }}">
            {{ config('app.name') }}
        </a>
        <div>
            @if( $menus['primary'] )
                <ul class="flex items-center justify-end space-x-8">
                    @foreach($menus['primary'] as $link)
                        <a href="{{ $link['href'] }}" class="text-white font-bold">
                            {{ $link['label'] }}
                            <br>
                        </a>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</header>
