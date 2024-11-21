{{-- Debugging untuk melihat format data yang diterima --}}
@php
\Log::info('State Data:', ['state' => $state]);
@endphp

@if (is_array($state))
{{-- Ambil nama dari array dan gabungkan dengan koma --}}
{{ implode(', ', array_column($state, 'nama')) }}
@elseif (is_string($state))
@php
$state = json_decode($state, true);
@endphp
@if (is_array($state))
{{ implode(', ', array_column($state, 'nama')) }}
@else
-
@endif
@else
{{-- Fallback jika datanya Closure atau tipe lain --}}
-
@endif