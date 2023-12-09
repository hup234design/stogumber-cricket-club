<header class="py-8 bg-gray-900 space-y-8">
    @if( $menus['primary'] )
        <div class="container">
            <ul class="flex items-center justify-center space-x-8">
                @foreach($menus['primary'] as $link)
                    <a  href="{{ $link['href'] }}"  class="text-white">{{ $link['label'] }}</a>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="text-center text-white">
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </div>
</header>
