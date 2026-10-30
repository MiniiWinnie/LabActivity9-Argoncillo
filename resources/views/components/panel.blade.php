@props(['title'])

<section {{ $attributes->merge(['class' => 'overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-slate-200']) }}>
    <div class="border-b border-slate-200 px-6 py-5">
        <h2 class="text-lg font-bold text-slate-900">{{ $title }}</h2>
    </div>
    {{ $slot }}
</section>
