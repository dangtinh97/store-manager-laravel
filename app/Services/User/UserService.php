<?php

namespace App\Services\User;

use App\Http\Responses\ApiResponse;
use App\Http\Responses\ResponseSuccess;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserService implements UserServiceInterface
{
    protected $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create($params):ApiResponse
    {
        $this->userRepository->create($params);
        return new ResponseSuccess();
    }

    public function list()
    {
        return $this->userRepository->getAll();
    }
}
