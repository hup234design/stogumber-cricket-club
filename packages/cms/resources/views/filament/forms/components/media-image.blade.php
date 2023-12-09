<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <x-cms-media-image-renderer :mediaImage="$getRecord()->id" class="w-full" />

</x-dynamic-component>
