<div>
    @props([
    'type' => 'submit',
])
</div>

<button
    {{ $attributes->merge(['class' => 'inline-flex items-center px-3 py-2 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500']) }}
    type="{{ $type }}">
    {{ $slot }}
</button>
