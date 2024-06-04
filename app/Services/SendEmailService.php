<?php

declare(strict_types=1);

namespace App\Services;

class SendEmailService
{
    public function sendEmail(string $email, string $content): void
    {
        echo "Email enviado para $email com o conteúdo: $content";
    }
}
