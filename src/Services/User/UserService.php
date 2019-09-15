<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 25.11.2016 г.
 * Time: 21:26
 */

namespace StanimiraNikolova\Services\User;


use StanimiraNikolova\Adapter\DatabaseInterface;
use StanimiraNikolova\Core\MVC\Message;
use StanimiraNikolova\Models\Binding\User\UserProfileEditBindingModel;
use StanimiraNikolova\Models\DB\User\User;
use StanimiraNikolova\Repositories\User\UserRepository;
use StanimiraNikolova\Repositories\User\UserRepositoryInterface;
use StanimiraNikolova\Services\AbstractService;
use StanimiraNikolova\Services\Application\EncryptionServiceInterface;

class UserService extends AbstractService  implements UserServiceInterface
{
    private $db;
    private $encryptionService;

    /** @var  UserRepository */
    private $userRepository;

    public function __construct(DatabaseInterface $db, EncryptionServiceInterface $encryptionService, UserRepositoryInterface $userRepository)
    {
        $this->db = $db;
        $this->encryptionService = $encryptionService;
        $this->userRepository = $userRepository;
    }

    public function register($username, $password) : bool
    {
        if (strlen($username) < 5) {
            Message::postMessage('Username must be, at least five or more symbols', Message::NEGATIVE_MESSAGE);
            return false;
        }

        if (strlen($password) < 5) {
            Message::postMessage('Password must be, at least five or more symbols', Message::NEGATIVE_MESSAGE);
            return false;
        }

        $isExistUsername = $this->userRepository->findByCondition(['username' => $username]);

        if (! empty($isExistUsername)) {
            Message::postMessage('Username exist', Message::NEGATIVE_MESSAGE);
            return false;
        }

        $userRegister = $this->userRepository->create([
            'username' => $username,
            'password' => $this->encryptionService->hash($password)
        ]);

        if ($userRegister) {
            Message::postMessage('Successfully register user', Message::POSITIVE_MESSAGE);
        } else {
            Message::postMessage('Please try again', Message::NEGATIVE_MESSAGE);
        }

        return $userRegister;
    }

    public function findOne($id) : User
    {
        /** @var User $user */
        $user = $this->userRepository->findOneRowById($id, User::class);

        return $user;
    }

    public function edit(UserProfileEditBindingModel $bindingModel)
    {
        if ($bindingModel->getPassword() != $bindingModel->getConfirmPassword()) {
            return false;
        }

        $params = [
            'username' => $bindingModel->getUsername(),
            'password' => $this->encryptionService->hash($bindingModel->getPassword()),
            'email' => $bindingModel->getEmail(),
            'birthday' => $bindingModel->getBirthday(),
        ];

        return $this->userRepository->update($bindingModel->getId(), $params);
    }
}