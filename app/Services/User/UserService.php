<?php

namespace App\Services\User;

use App\Http\Responses\ApiResponse;
use App\Http\Responses\ResponseError;
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

    public function show($id)
    {
        return $this->userRepository->findById($id);
    }

    public function update($id, $params):ApiResponse
    {
        $user = $this->userRepository->findById($id);
        $findUserByEmail = $this->userRepository->findComparison([
            'id' => [
                '$ne' => $id
            ],
            'email' => [
                '$eq' => $params['email']
            ]
        ]);
        if(count($findUserByEmail)>0) return new ResponseError(trans('validation.unique',[
            'attribute' => 'email'
        ]),422);
        $user->update($params);
        return new ResponseSuccess();
    }
}
