<div class="mb-4">
    <label class="block mb-2 text-sm font-medium">{{ $label }}</label>
    <select {{ $attributes->merge(['class' => 'w-full border p-2 rounded']) }}>
        @if ($default ?? null)
            <option value="">{{ $default }}</option>
        @endif
        @foreach ($options as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
    </select>
</div>