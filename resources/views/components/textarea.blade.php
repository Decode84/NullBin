<textarea name="{{ $name }}" id="{{ $id }}" rows="{{ $rows }}"
    {{ $attributes->merge(['class' => 'shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md']) }}>{{ old($name, $slot) }}</textarea>
