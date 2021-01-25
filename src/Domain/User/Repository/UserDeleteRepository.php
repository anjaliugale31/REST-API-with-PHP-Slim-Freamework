<?php

namespace App\Domain\User\Repository;

use App\Domain\User\Data\UserReaderData;
use DomainException;
use PDO;

/**
 * Repository.
 */
class UserDeleteRepository
{
    /**
     * @var PDO The database connection
     */
    private $connection;

    /**
     * Constructor.
     *
     * @param PDO $connection The database connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Get user by the given user id.
     *
     * @param int $userId The user id
     *
     * @throws DomainException
     *
     * @return UserReaderData The user data
     */
    public function deleteUserById(int $userId)
    {
        $sql = "DELETE FROM users WHERE id = $userId;";
        $statement = $this->connection->prepare($sql);
        $statement->execute(['id' => $userId]);

    }
}
