<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 28.11.2016 г.
 * Time: 19:02
 */

namespace StanimiraNikolova\Services\Application;

use StanimiraNikolova\Adapter\DatabaseInterface;
use StanimiraNikolova\Core\MVC\Message;
use StanimiraNikolova\Core\MVC\SessionInterface;
use StanimiraNikolova\Models\DB\User\User;
use StanimiraNikolova\Repositories\User\UserRepository;
use StanimiraNikolova\Repositories\User\UserRepositoryInterface;
use StanimiraNikolova\Services\AbstractService;

class AuthenticationService extends AbstractService implements AuthenticationServiceInterface
{
    const AUTHENTICATION_ID = 'id';

    private $db;
    private $session;
    private $encryptionService;

    /** @var  UserRepository */
    private $userRepository;

    public function __construct(DatabaseInterface $db, SessionInterface $session, EncryptionServiceInterface $encryptionService, UserRepositoryInterface $userRepository)
    {
        $this->db = $db;
        $this->session = $session;
        $this->encryptionService = $encryptionService;
        $this->userRepository = $userRepository;
    }

    public function isAuthenticated() : bool
    {
        return $this->session->exists(self::AUTHENTICATION_ID);
    }

    public function logout()
    {
        $this->session->destroy();
    }

    public function login($username, $password) : bool
    {
        $userParams = [
            'username' => $username
        ];

        /** @var User $user */
        $user = $this->userRepository->findByCondition($userParams, User::class, null, 'asc', 1, 0);

        if (empty($user)) {
            Message::postMessage('Not found user, with this username', Message::NEGATIVE_MESSAGE);
            return false;
        }

        $hash = $user->getPassword();

        if ($this->encryptionService->verify($password, $hash)) {
            $this->session->set('id', $user->getId());
            return true;
        }
        Message::postMessage('Please enter valid password', Message::NEGATIVE_MESSAGE);
        return false;
    }

    public function getUserId()
    {
        return $this->session->get(self::AUTHENTICATION_ID);
    }
}