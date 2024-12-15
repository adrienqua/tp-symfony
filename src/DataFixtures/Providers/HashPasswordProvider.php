<?php

namespace App\DataFixtures\Providers;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\User;

class HashPasswordProvider
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function hashPassword(string $plainPassword): string
    {
        // Utilisation d'un utilisateur temporaire pour hacher le mot de passe
        $user = new User();
        return $this->passwordHasher->hashPassword($user, $plainPassword);
    }
}