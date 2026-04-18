@props(['email'])

@php
    // Cloudflare email-protection encoding: a 2-hex-digit random key k,
    // followed by each character of the email XOR'd with k, hex-encoded.
    $cfemail = '';
    if (is_string($email) && $email !== '') {
        $k = random_int(1, 255);
        $cfemail = sprintf('%02x', $k);
        for ($i = 0, $len = strlen($email); $i < $len; $i++) {
            $cfemail .= sprintf('%02x', ord($email[$i]) ^ $k);
        }
    }
@endphp

{{--
    Matches Cloudflare's email-protection output so the rendered markup is
    indistinguishable from the live WP page. The companion decoder script
    lives in resources/js/app.js (cfEmailProtection).
--}}
<a
    href="/cdn-cgi/l/email-protection"
    class="__cf_email__"
    data-cfemail="{{ $cfemail }}"
>[email&#160;protected]</a>
