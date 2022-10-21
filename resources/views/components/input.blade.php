<input name="{{ $name }}" type="{{ $type }}" id="{{ $id }}"
    @if ($value) value="{{ $value }}" @endif
    {{ $attributes->merge(['class' => 'mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) }} />
