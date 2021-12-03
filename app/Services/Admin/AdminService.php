<?php

namespace App\Services\Admin;

use App\Http\Responses\ResponseCustomize;
use App\Repositories\Admin\AdminRepositoryInterface;

class AdminService implements AdminServiceInterface
{
    protected $adminRepository;
    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function index()
    {
        $admins = $this->adminRepository->findComparison([
           'email' => [
               '$ne' => 'admin@admin.com'
           ]
        ]);

        return $admins;
        $data = $admins->map(function ($admin){
            return [
                'full_name' => $admin->full_name,
                'email' => $admin->email,
                'status' => $admin->status,
                'dob' => $admin->dob,
                'address' => $admin->address,
                'type' => $admin->type,
                'id' => $admin->id
            ];
        })->toArray();
        return (new ResponseCustomize(count($data)===0 ? 204:200,"data admin",['list'=>$data]));
    }
}
