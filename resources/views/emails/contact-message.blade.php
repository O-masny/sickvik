@component('mail::message')
# Nová zpráva od {{ $data['name'] }}

**Email:** {{ $data['email'] }}

**Zpráva:**

{{ $data['message'] }}

@endcomponent
