<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    public function __construct(private UserRepositoryInterface $userRepository) {}

    public function getAllUsers(): Collection
    {
        return $this->userRepository->all();
    }

    public function findUser(int $id): ?User
    {
        return $this->userRepository->find($id);
    }

    public function findByEmail(string $email): ?User
    {
        return $this->userRepository->findByEmail($email);
    }

    public function createUser(array $data): User
    {
        return $this->userRepository->create($data);
    }

    public function updateUser(int $id, array $data): bool
    {
        return $this->userRepository->update($id, $data);
    }

    public function deleteUser(int $id): bool
    {
        return $this->userRepository->delete($id);
    }

    public function getUsersByRole(string $role): Collection
    {
        return $this->userRepository->getByRole($role);
    }
}
