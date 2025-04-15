@props(['images' => [], 'reverse' => false])

<div x-data="{ y: 0 }" x-init="() => {
        const track = $el.querySelector('.inner-track');
        window.addEventListener('scroll', () => {
            const rect = $el.getBoundingClientRect();
            const scrollRatio = Math.max(0, Math.min(1, 1 - rect.top / window.innerHeight));
            const distance = scrollRatio * 150;
            track.style.transform = `translateY(${ {{ $reverse ? '-' : '' }}distance }px)`;
        });
    }" class="w-[240px] h-[720px] overflow-hidden relative">
    <div
        class="inner-track flex flex-col items-center gap-6 will-change-transform transition-transform duration-75 ease-linear">
        @foreach ($images as $image)
            <div class="w-[200px] h-[380px] bg-cover bg-center rounded-xl shadow-md"
                style="background-image: url('{{ is_string($image) ? $image : asset('storage/' . $image->image) }}')"></div>
        @endforeach
    </div>
</div>