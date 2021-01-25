<?php

namespace App\Domain\User\Service;

use App\Domain\User\Data\UserReaderData;
use App\Domain\User\Repository\UserUpdateRepository;
use App\Exception\ValidationException;

/**
 * Service.
 */
final class UserUpdate
{
    /**
     * @var UserUpdateRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param UserUpdateRepository $repository The repository
     */
    public function __construct(UserUpdateRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Read a user by the given user id.
     *
     * @param int $userId The user id
     *
     * @throws ValidationException
     *
     * @return UserReaderData The user data
     */
    public function updateUserById(int $userId,array $data)
    {
        
        $user = $this->repository->updateUserById($userId,$data);

        return $user;
    }
}
