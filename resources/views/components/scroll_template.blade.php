@props([
    'id' => 'sticky-scroll',
    'height' => '400vh',
])

<section id="{{ $id }}" class="relative overflow-visible" style="height: {{ $height }}">
    <div class="sticky top-0 h-screen w-full overflow-hidden">
        <div class="flex h-full w-[400vmax] space-x-10 p-10 pin-wrap">
            {{ $slot }}
        </div>
    </div>
</section>

@once
    @push('scripts')
        <script type="module">
            import gsap from 'https://cdn.skypack.dev/gsap';
            import ScrollTrigger from 'https://cdn.skypack.dev/gsap/ScrollTrigger';

            gsap.registerPlugin(ScrollTrigger);

            const section = document.querySelector('#{{ $id }}');
            const wrapper = section.querySelector('.pin-wrap');

            if (section && wrapper) {
                ScrollTrigger.create({
                    trigger: section,
                    start: 'top top',
                    end: () => `+=${wrapper.scrollWidth - window.innerWidth}`,
                    pin: true,
                    scrub: true,
                    anticipatePin: 1,
                    onUpdate: self => {
                        gsap.to(wrapper, {
                            x: -self.progress * (wrapper.scrollWidth - window.innerWidth),
                            ease: 'none',
                            duration: 0.1,
                        });
                    },
                });
            }
        </script>
    @endpush
@endonce