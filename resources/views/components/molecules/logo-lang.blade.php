<!-- resources/views/components/molecules/logo-with-lang.blade.php -->
<div class="flex items-center space-x-2">
    <img src="{{ asset('assets/logo/logo.svg') }}" width="70" height="70" alt="Logo">
    @livewire('language-switcher')
</div>