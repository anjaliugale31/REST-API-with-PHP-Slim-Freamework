<?php

namespace App\Domain\User\Repository;

use App\Domain\User\Data\UserReaderData;
use DomainException;
use PDO;

/**
 * Repository.
 */
class UserUpdateRepository
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
    public function updateUserById(int $userId,array $user)
    {
        $sql = "update users set username=:username,last_name=:last_name,first_name=:first_name,email=:email where id=$userId";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam("username",$user['username']);
        $statement->bindParam("last_name",$user['last_name']);
        $statement->bindParam("first_name",$user['first_name']);
        $statement->bindParam("email",$user['email']);
        $statement->execute();
    }
}
