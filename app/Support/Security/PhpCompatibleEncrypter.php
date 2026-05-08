<?php

declare(strict_types=1);

namespace App\Support\Security;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Encryption\Encrypter;

class PhpCompatibleEncrypter extends Encrypter
{
    /**
     * @param  string  $payload
     * @param  bool  $unserialize
     * @return mixed
     *
     * @throws \Illuminate\Contracts\Encryption\DecryptException
     */
    public function decrypt($payload, $unserialize = true)
    {
        $payload = $this->getJsonPayload($payload);

        $iv = base64_decode($payload['iv']);

        $this->ensureTagIsValid(
            $tag = empty($payload['tag']) ? null : base64_decode($payload['tag'])
        );

        $foundValidMac = false;
        $cipher = strtolower($this->cipher);

        foreach ($this->getAllKeys() as $key) {
            if (
                $this->shouldValidateMac()
                && ! ($foundValidMac = $foundValidMac || $this->validMacForKey($payload, $key))
            ) {
                continue;
            }

            $decrypted = in_array($cipher, ['aes-128-gcm', 'aes-256-gcm'], true)
                ? \openssl_decrypt($payload['value'], $cipher, $key, 0, $iv, $tag ?? '')
                : \openssl_decrypt($payload['value'], $cipher, $key, 0, $iv);

            if ($decrypted !== false) {
                break;
            }
        }

        if ($this->shouldValidateMac() && ! $foundValidMac) {
            throw new DecryptException('The MAC is invalid.');
        }

        if (($decrypted ?? false) === false) {
            throw new DecryptException('Could not decrypt the data.');
        }

        return $unserialize ? unserialize($decrypted) : $decrypted;
    }
}
