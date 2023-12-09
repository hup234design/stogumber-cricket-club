@props(['blocks' => []])

@if( count($blocks) > 0 )

    @section('content-blocks')

        <div class="mt-16 content-blocks">

            @php
            $previousStyle = "-";
            @endphp

            @foreach( $blocks as $block )

                @php
                    $includeHeader     = $block['data']['include_header'] ?? false;
                    $headerTitle       = $block['data']['header_title'] ?? null;
                    $headerText        = $block['data']['header_text'] ?? null;
                    $headerAlignment   = $block['data']['header_alignment'] ?? 'center';
                    $style             = $block['data']['style'] ?? null;
                    $backgroundImageId = $block['data']['background_image_id'] ?? null;
                    $boxed             = $block['data']['boxed'] ?? false;
                @endphp

                <div
                    @class([
                        "relative content-block pb-12",
                        "pt-12" => ($style != $previousStyle) && ! ($loop->first && ! $style),
                        "bg-brand content-block-dark" => $style == "brand",
                        "bg-brand-light" => $style == "brand-light",
                        "bg-dark content-block-dark" => $style == "dark",
                        "bg-light" => $style == "light",
                        "bg-black content-block-dark" => $style == "bgimage",
                        "container" => $boxed
                    ])
                >
                        @if( $style == "bgimage" && $backgroundImageId)
                            <div class="absolute inset-0">
                                <x-cms-media-image-renderer
                                    :mediaImage="$backgroundImageId"
                                    class="object-cover object-center w-full h-full opacity-30"
                                />
                            </div>
                        @endif

                    <div class="relative container">

                                @if( $includeHeader && ($headerTitle || $headerText) )
                                <div
                                    @class([
                                        "prose max-w-5xl mb-12",
                                        "mx-auto text-center" => $headerAlignment == 'center'
                                    ])
                                >
                                    @if( $headerTitle)
                                        <h2 class="font-extrabold text-3xl">
                                            {{ $headerTitle }}
                                        </h2>
                                    @endif
                                    @if( $headerText)
                                        <p class="lead">
                                            {!! nl2br($headerText) !!}
                                        </p>
                                    @endif
                                </div>
                                @endif

                        @livewire($block['type'], ['data' => $block['data']])
                    </div>
                </div>

                @php
                $previousStyle = $style;
                @endphp

            @endforeach

            @if( $boxed )
                <div class="h-24 w-full"></div>
            @endif
        </div>
    @show

@endif


{{--$page->content_blocks ?? []--}}



{{--@props(['block'])--}}

{{--@php--}}
{{--$headerTitle = $block['data']['header_title'] ?? null;--}}
{{--$headerText  = $block['data']['header_text'] ?? null;--}}
{{--$style       = $block['data']['style'] ?? null;--}}
{{--$proseInvert = in_array($style, ["dark","brand","bgimage"]);--}}
{{--@endphp--}}

{{--<section--}}
{{--    @class([--}}
{{--        "relative py-20",--}}
{{--        "default"--}}
{{--        "bg-brand" => $style == "brand",--}}
{{--        "bg-brand-light" => $style == "brand-light",--}}
{{--        "bg-dark" => $style == "dark",--}}
{{--        "bg-light" => $style == "light",--}}
{{--        "bg-black" => $style == "bgimage",--}}
{{--    ])--}}
{{-->--}}
{{--    @if( $style == "bgimage" )--}}
{{--        <div class="absolute inset-0">--}}
{{--            <x-cms-media-image-renderer--}}
{{--                :mediaImage="$block['data']['background_image_id'] ?? null"--}}
{{--                class="obhect-cover object-center w-full h-full opacity-40"--}}
{{--            />--}}
{{--        </div>--}}
{{--    @endif--}}

{{--    <div class="relative container">--}}
{{--        @if( $headerTitle || $headerText)--}}
{{--        <div--}}
{{--            @class([--}}
{{--                "prose max-w-5xl mx-auto text-center mb-16",--}}
{{--                "prose-invert" => $proseInvert--}}
{{--            ])--}}
{{--        >--}}
{{--            @if( $headerTitle)--}}
{{--                <h2 class="font-extrabold text-3xl">--}}
{{--                    {{ $headerTitle }}--}}
{{--                </h2>--}}
{{--            @endif--}}
{{--            @if( $headerText)--}}
{{--                <p class="font-medium text-lg">--}}
{{--                    {!! nl2br($headerText) !!}--}}
{{--                </p>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--        @endif--}}
{{--        @livewire($block['type'], ['data' => $block['data']])--}}
{{--    </div>--}}
{{--</section>--}}







{{--<section class="py-20 bg-gray-900">--}}
{{--    <div class="container">--}}
{{--        <div class="prose prose-invert max-w-5xl mx-auto text-center mb-16">--}}
{{--            <h2 class="font-extrabold text-3xl">Block Title</h2>--}}
{{--            <p class="font-medium text-lg text-gray-200">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.</p>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="container">--}}
{{--        @livewire($block['type'], ['data' => $block['data']])--}}
{{--    </div>--}}
{{--</section>--}}

{{--<section class="py-20">--}}
{{--    <div class="container">--}}
{{--        <div class="prose max-w-5xl mx-auto text-center mb-16">--}}
{{--            <h2 class="font-extrabold text-3xl">Block Title</h2>--}}
{{--            <p class="font-medium text-lg text-gray-600">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.</p>--}}
{{--        </div>--}}
{{--        <div class="container">--}}
{{--            @livewire($block['type'], ['data' => $block['data']])--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

{{--<section class="py-20">--}}
{{--    <div class="container">--}}
{{--        <div class="prose max-w-5xl mx-auto text-center mb-16">--}}
{{--            <h2 class="font-extrabold text-3xl">Block Title</h2>--}}
{{--            <p class="font-medium text-lg text-gray-600">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.</p>--}}
{{--        </div>--}}
{{--        <div class="container">--}}
{{--            @livewire($block['type'], ['data' => $block['data']])--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

{{--<section class="container py-20 bg-red-900">--}}
{{--    <div class="container">--}}
{{--        <div class="prose prose-invert max-w-5xl mx-auto text-center mb-16">--}}
{{--            <h2 class="font-extrabold text-3xl">Block Title</h2>--}}
{{--            <p class="font-medium text-lg text-gray-200">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.</p>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="container">--}}
{{--        @livewire($block['type'], ['data' => $block['data']])--}}
{{--    </div>--}}
{{--</section>--}}

{{--<section class="py-20">--}}
{{--    <div class="container">--}}
{{--        <div class="prose max-w-5xl mx-auto text-center mb-16">--}}
{{--            <h2 class="font-extrabold text-3xl">Block Title</h2>--}}
{{--            <p class="font-medium text-lg text-gray-600">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.</p>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="container">--}}
{{--        @livewire($block['type'], ['data' => $block['data']])--}}
{{--    </div>--}}
{{--</section>--}}

{{--<section class="py-20 bg-gray-100">--}}
{{--    <div class="container">--}}
{{--        <div class="prose max-w-5xl mx-auto text-center mb-16">--}}
{{--            <h2 class="font-extrabold text-3xl">Block Title</h2>--}}
{{--            <p class="font-medium text-lg text-gray-600">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.</p>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="container">--}}
{{--        @livewire($block['type'], ['data' => $block['data']])--}}
{{--    </div>--}}
{{--</section>--}}


{{--<section class="py-20 bg-red-900">--}}
{{--    <div class="container">--}}
{{--        <div class="prose prose-invert max-w-5xl mx-auto text-center mb-16">--}}
{{--            <h2 class="font-extrabold text-3xl">Block Title</h2>--}}
{{--            <p class="font-medium text-lg text-gray-200">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.</p>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="container">--}}
{{--        @livewire($block['type'], ['data' => $block['data']])--}}
{{--    </div>--}}
{{--</section>--}}

{{--@props(['content_blocks' => []])--}}

{{--@if( count($content_blocks ?? []) > 0 )--}}

{{--    @php--}}
{{--        $previousStyle = '';--}}
{{--    @endphp--}}

{{--    <div id="content-blocks">--}}
{{--        @foreach( $content_blocks ?? [] as $block )--}}

{{--            @php--}}
{{--                $headerTitle = $block['data']['header_title'] ?? null;--}}
{{--                $headerText  = $block['data']['header_text'] ?? null;--}}
{{--                $style       = $block['data']['style'] ?? null;--}}
{{--            @endphp--}}

{{--            --}}{{--                    <div class="{{ $block['data']['full_width'] ? 'w-full' : 'container' }}">--}}
{{--            <div class="w-full">--}}
{{--                --}}{{--                    <div class="container">--}}
{{--                <section--}}
{{--                    @class([--}}
{{--                        "relative pt-8 pb-16",--}}
{{--                        $style,--}}
{{--                        "pt-16" => $previousStyle !== $style,--}}
{{--                        "bg-red-900" => $style == 'block-brand',--}}
{{--                        "bg-red-200" => $style == 'block-light',--}}
{{--                        "bg-gray-900" => $style == 'block-dark',--}}
{{--                        "bg-black" => $style == 'block-bgimage',--}}
{{--                        "block-dark" => $style && $style != 'block-light',--}}
{{--                    ])--}}
{{--                >--}}
{{--                    @if( $block['data']['style'] ?? null === 'block-bgimage' )--}}
{{--                        <div class="absolute inset-0 opacity-40">--}}
{{--                            <x-cms-media-image-renderer :mediaImage="$block['data']['background_image_id']" class="object-cover object-center w-full h-full" />--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    @if($block['data']['include_header'] ?? false)--}}
{{--                        <header class="relative mb-16">--}}
{{--                            <div class="container">--}}
{{--                                <div class="prose mx-auto text-center">--}}
{{--                                    @if ( trim($headerTitle) )--}}
{{--                                        <h1 id="block-title">--}}
{{--                                            {{ $headerTitle }}--}}
{{--                                        </h1>--}}
{{--                                    @endif--}}
{{--                                    @if ( trim($headerText) )--}}
{{--                                        <div class="lead">--}}
{{--                                            <p>{!! nl2br($headerText) !!}</p>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </header>--}}
{{--                    @endif--}}

{{--                    <div class="relative container">--}}
{{--                        @livewire($block['type'], ['data' => $block['data']])--}}
{{--                    </div>--}}
{{--                </section>--}}
{{--            </div>--}}

{{--            @php--}}
{{--                $previousStyle = $block['data']['style'] ?? null;--}}
{{--            @endphp--}}
{{--        @endforeach--}}
{{--    </div>--}}
{{--@endif--}}
