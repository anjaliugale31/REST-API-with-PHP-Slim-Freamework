<?php

namespace App\Action;

use App\Domain\User\Service\UserUpdate;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Action
 */
final class UserUpdateAction
{
    /**
     * @var UserUpdate
     */
    private $userUpdate;

    /**
     * The constructor.
     *
     * @param UserUpdate $userReader The user reader
     */
    public function __construct(UserUpdate $userUpdate)
    {
        $this->userUpdate = $userUpdate;
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
        $data = (array)$request->getParsedBody();

        $userId = (int)$args['id'];

        $userData = $this->userUpdate->updateUserById($userId,$data);

        $response->getBody()->write((string)json_encode($data));

        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}