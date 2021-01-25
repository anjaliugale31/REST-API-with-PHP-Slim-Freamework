<?php

namespace App\Action;

use App\Domain\User\Service\UserDelete;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Action
 */
final class UserDeleteAction
{
    /**
     * @var UserDelete
     */
    private $userDelete;

    /**
     * The constructor.
     *
     * @param UserDelete $userReader The user reader
     */
    public function __construct(UserDelete $userDelete)
    {
        $this->userDelete = $userDelete;
    }

    /**
     * Invoke.
     *
     * @param ServerRequestInterface $request The request
     * @param ResponseInterface $response The response
     * @param array<mixed> $args The route arguments
     *
     * @return ResponseInterface The response
     */
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        array $args = []
    ): ResponseInterface {
        $userId = (int)$args['id'];

        $userData = $this->userDelete->deleteUserById($userId);

        $response->getBody()->write((string)json_encode("value deleted"));

        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}