@props(['page', 'ignoreFeaturedImage' => false])

<div>
    <div class="container">
        <div class="prose max-w-none">
            @section('before-title')
            @show
            @section('title')
                <h1>{{ $page->title }}</h1>
            @show
            @section('before-title')
            @show
            @section('content')
                @if( ! $ignoreFeaturedImage )
                    <x-cms-media-image-renderer :mediaImage="$page->featured_image_id" class="w-full" />
                @endif
                {!! $page->content !!}
            @show
        </div>
        {{ $slot }}
    </div>

    <x-content-blocks :blocks="$page->content_blocks ?? []" />

{{--    @if( count($page->content_blocks ?? []) > 0)--}}
{{--        <div class="mt-20">--}}
{{--            @section('content-blocks')--}}
{{--                @foreach( $page->content_blocks ?? [] as $block )--}}
{{--                    <x-cms::content-block :block="$block" />--}}
{{--                @endforeach--}}
{{--            @show--}}
{{--        </div>--}}
{{--    @endif--}}

{{--            @php--}}
{{--                $previousStyle = '';--}}
{{--            @endphp--}}

{{--            <div id="content-blocks">--}}
{{--                @foreach( $page->content_blocks ?? [] as $block )--}}

{{--                    @php--}}
{{--                        $headerTitle = $block['data']['header_title'] ?? null;--}}
{{--                        $headerText  = $block['data']['header_text'] ?? null;--}}
{{--                        $style       = $block['data']['style'] ?? null;--}}
{{--                    @endphp--}}

{{--                    <div class="{{ $block['data']['full_width'] ? 'w-full' : 'container' }}">--}}
{{--                    <div class="w-full">--}}
{{--                    <div class="container">--}}
{{--                    <section--}}
{{--                        @class([--}}
{{--                            "relative pb-16",--}}
{{--                            $style,--}}
{{--                            "pt-16" => $previousStyle !== $style,--}}
{{--                            "bg-red-900" => $style == 'block-brand',--}}
{{--                            "bg-gray-100" => $style == 'block-light',--}}
{{--                            "bg-gray-900" => $style == 'block-dark',--}}
{{--                            "bg-black" => $style == 'block-bgimage',--}}
{{--                            "block-dark" => $style && $style != 'block-light',--}}
{{--                        ])--}}
{{--                    >--}}
{{--                            @if( $block['data']['style'] ?? null === 'block-bgimage' )--}}
{{--                                <div class="absolute inset-0 opacity-40">--}}
{{--                                    <x-cms-media-image-renderer :mediaImage="$block['data']['background_image_id']" class="object-cover object-center w-full h-full" />--}}
{{--                                </div>--}}
{{--                            @endif--}}

{{--                        @if($block['data']['include_header'] ?? false)--}}
{{--                            <header class="relative mb-16">--}}
{{--                                <div class="container">--}}
{{--                                    <div class="prose mx-auto text-center">--}}
{{--                                        @if ( trim($headerTitle) )--}}
{{--                                            <h1 id="block-title">--}}
{{--                                                {{ $headerTitle }}--}}
{{--                                            </h1>--}}
{{--                                        @endif--}}
{{--                                        @if ( trim($headerText) )--}}
{{--                                            <div class="lead">--}}
{{--                                                <p>{!! nl2br($headerText) !!}</p>--}}
{{--                                            </div>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </header>--}}
{{--                        @endif--}}

{{--                        <div class="relative container">--}}
{{--                            @livewire($block['type'], ['data' => $block['data']])--}}
{{--                        </div>--}}
{{--                    </section>--}}
{{--                    </div>--}}

{{--                    @php--}}
{{--                        $previousStyle = $block['data']['style'] ?? null;--}}
{{--                    @endphp--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        @endif--}}


</div>
