@props(['thumbnail'])

@if (str_contains($thumbnail, "images/illustration"))
    <img src="{{ asset($thumbnail) }}" alt="Blog Post illustration" class="rounded-xl"
    {{ $attributes }}
    >
@else
    <img src="{{ asset('storage/' . $thumbnail) }}" alt="Blog Post illustration" class="rounded-xl" {{ $attributes }}>
@endif
