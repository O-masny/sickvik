<button
    {{ $attributes->merge(['class' => 'flex items-center justify-center bg-white shadow px-2 py-1 rounded-r transition']) }}
    aria-label="Otevřít/zavřít filtr"
>
    <svg xmlns="http://www.w3.org/2000/svg"
         class="h-5 w-5 transition-transform duration-200"
         :class="{ 'rotate-180': filterOpen }"
         fill="currentColor"
         viewBox="0 0 20 20"
    >
        <path fill-rule="evenodd" d="M6.707 14.707a1 1 0 010-1.414L10 10 6.707 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
    </svg>
</button>