<div>
    <button wire:click="animate">Animate me!</button>
    <div id="animate-box" style="width:100px; height:100px; background-color: red;"></div>
</div>

@push('scripts')
<script>
    console.log('Testovací skript je načten!');  // Pro ověření
    document.addEventListener('startAnimation', function () {
        gsap.to("#animate-box", {
            duration: 1,
            x: 900,
            rotation: 360,
            backgroundColor: "#00ff00"
        });
    });
</script>
@endpush
