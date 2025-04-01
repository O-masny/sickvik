<section 
    x-data="{ flipped: false, visible: false }" 
    x-intersect.once="visible = true"
    class="py-32 bg-white"
>
    <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-center items-center gap-16">

        <!-- LEVÝ SLOUPEC -->
        <div class="backdrop-blur-md bg-white/60 border border-white/20 shadow-xl p-10 rounded-2xl max-w-md text-center md:text-left">
            <h2 class="text-5xl font-bold text-gray-900 mb-4">
                {{ __('Kontakt') }}
            </h2>
            <p class="text-lg text-gray-700">
                {{ __('Máš otázku nebo projekt? Napiš mi a ozvu se zpět co nejdřív.') }}
            </p>
        </div>

        <!-- PRAVÝ SLOUPEC / KARTA -->
        <div 
            class="relative w-full max-w-md p-8 bg-white/70 backdrop-blur-md rounded-2xl shadow-xl transition-all duration-700 opacity-0 transform-style preserve-3d perspective"
            :class="{ 'opacity-100 translate-y-0': visible, 'translate-y-10': !visible }"
        >
            <!-- FLIP WRAPPER -->
            <div class="relative w-full transition-transform duration-700 transform-style preserve-3d"
                 :class="{ 'rotate-y-180': flipped }">

                <!-- FRONT SIDE -->
                <div class="absolute w-full backface-hidden">
                    <div class="mb-6 text-center md:text-left">
                        <button 
                            @click="flipped = true"
                            class="bg-blue-600 text-white text-lg px-6 py-3 rounded-lg hover:bg-blue-700 transition-transform transform hover:scale-105"
                        >
                            {{ __('Kontaktuj mě') }}
                        </button>
                    </div>
                </div>

                <!-- BACK SIDE -->
                <div 
                    class="absolute rotate-y-180 backface-hidden w-full"
                    x-init="
                        $watch('flipped', value => {
                            if (value) {
                                gsap.from('.form-field', {
                                    opacity: 0,
                                    y: 30,
                                    stagger: 0.1,
                                    duration: 0.5,
                                    ease: 'power2.out'
                                });
                            }
                        });
                    "
                >
                    <h3 class="text-2xl font-semibold mb-4 text-center md:text-left">
                        {{ __('Napiš mi zprávu') }}
                    </h3>

                    @if (session()->has('success'))
                        <div class="p-4 mb-4 bg-green-100 text-green-800 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form wire:submit.prevent="submit" class="space-y-4">
                        <input type="text" wire:model.defer="name" placeholder="{{ __('Jméno') }}" class="form-field w-full border p-3 rounded text-lg" />
                        <input type="email" wire:model.defer="email" placeholder="{{ __('Email') }}" class="form-field w-full border p-3 rounded text-lg" />
                        <textarea wire:model.defer="message" placeholder="{{ __('Zpráva') }}" class="form-field w-full border p-3 rounded text-lg"></textarea>

                        <div class="flex justify-between items-center">
                            <button type="submit" class="form-field bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                                {{ __('Odeslat') }}
                            </button>
                            <button 
                                type="button" 
                                @click="flipped = false"
                                class="form-field text-sm text-gray-500 underline"
                            >
                                {{ __('Zpět') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
