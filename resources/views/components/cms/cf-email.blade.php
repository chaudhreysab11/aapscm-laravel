@props([
    'email' => null,
    'cfemail' => null,
])

@php
    $resolvedEmail = is_string($email) && $email !== '' ? $email : null;

    if ($resolvedEmail === null && is_string($cfemail) && $cfemail !== '' && strlen($cfemail) >= 4 && strlen($cfemail) % 2 === 0) {
        $key = hexdec(substr($cfemail, 0, 2));
        $decoded = '';

        for ($i = 2, $len = strlen($cfemail); $i < $len; $i += 2) {
            $decoded .= chr(hexdec(substr($cfemail, $i, 2)) ^ $key);
        }

        $resolvedEmail = $decoded !== '' ? $decoded : null;
    }
@endphp

@if ($resolvedEmail)
    <a {{ $attributes->merge(['href' => 'mailto:' . $resolvedEmail]) }}>{{ $resolvedEmail }}</a>
@endif
