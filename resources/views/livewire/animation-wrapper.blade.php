<div id="animation-wrapper" 
    class="opacity-0"
    data-animation="{{ $animation }}" 
    data-duration="{{ $duration }}" 
    data-delay="{{ $delay }}"
>
    {{ $slot }}
</div>

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        Livewire.hook('message.processed', (message, component) => {
            initAnimations();
        });

        function initAnimations() {
            document.querySelectorAll("#animation-wrapper").forEach(el => {
                let animationType = el.dataset.animation;
                let duration = parseFloat(el.dataset.duration);
                let delay = parseFloat(el.dataset.delay);

                let tl = gsap.timeline({ delay: delay });

                switch (animationType) {
                    case "fade-in":
                        tl.to(el, { opacity: 1, duration: duration });
                        break;
                    case "fade-out":
                        tl.to(el, { opacity: 0, duration: duration });
                        break;
                    case "slide-left":
                        tl.from(el, { x: 100, opacity: 0, duration: duration });
                        break;
                    case "slide-right":
                        tl.from(el, { x: -100, opacity: 0, duration: duration });
                        break;
                    case "zoom-in":
                        tl.from(el, { scale: 0.5, opacity: 0, duration: duration });
                        break;
                    case "zoom-out":
                        tl.to(el, { scale: 0.5, opacity: 0, duration: duration });
                        break;
                    default:
                        console.warn("Unknown animation:", animationType);
                }
            });
        }

        initAnimations();
    });
</script>
@endpush
