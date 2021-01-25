<?php

namespace App\Domain\User\Service;

use App\Domain\User\Data\UserReaderData;
use App\Domain\User\Repository\UserReaderRepository;
use App\Exception\ValidationException;

/**
 * Service.
 */
final class UserReader
{
    /**
     * @var UserReaderRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param UserReaderRepository $repository The repository
     */
    public function __construct(UserReaderRepository $repository)
    {
        $this->repository = $repository;
    }



   /**
    * get the list of users
    *
    * @return UserRederData
    */
   public function getListOfUsers(): array
{
    $result = $this->repository->getAllUsers();
    return $result;
}
}

