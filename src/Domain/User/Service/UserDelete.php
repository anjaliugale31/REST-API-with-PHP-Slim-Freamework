<?php

namespace App\Domain\User\Service;

use App\Domain\User\Data\UserReaderData;
use App\Domain\User\Repository\UserDeleteRepository;
use App\Exception\ValidationException;

/**
 * Service.
 */
final class UserDelete
{
    /**
     * @var UserDeleteRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param UserDeleteRepository $repository The repository
     */
    public function __construct(UserDeleteRepository $repository)
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
    public function deleteUserById(int $userId)
    {
        
        $userid = $this->repository->deleteUserById($userId);

        return $userid;
    }
}
