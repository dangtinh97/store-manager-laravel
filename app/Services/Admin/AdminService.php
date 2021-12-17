<?php

namespace App\Services\Admin;

use App\Http\Responses\ResponseCustomize;
use App\Http\Responses\ResponseError;
use App\Http\Responses\ResponseSuccess;
use App\Models\Admin;
use App\Repositories\Admin\AdminRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use MongoDB\BSON\UTCDateTime;

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
           'type' => [
               '$ne' => Admin::TYPE_SUPPER_ADMIN
           ],
            'id' => [
                '$ne' => Auth::id()
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

    public function create($params)
    {
        $create = $params;
        $create['password'] = Hash::make($params['password']);
        $create['dob'] = new Carbon($params['dob']);
        $create['status'] = "ACTIVE";
        $set = $this->adminRepository->create($create);
        return new ResponseSuccess();
    }

    public function show($id)
    {
        return $this->adminRepository->findById($id);
    }

    public function destroy($id)
    {
        if($id==Auth::id()) return Redirect::back()->withErrors("Bạn không thể xoá tài khoản này");
        $admin = $this->adminRepository->findById($id);
        if($admin===Admin::TYPE_SUPPER_ADMIN) return Redirect::back()->withErrors("Bạn không thể xoá tài khoản này");
        $admin->update([
            'status' => Admin::STATUS_DELETE
        ]);
        return Redirect::route('admins.index');
    }

    public function update($id,$params)
    {
        $admin = $this->adminRepository->findById($id);
        if($admin->type===Admin::TYPE_SUPPER_ADMIN && $id!=Auth::id()) return new ResponseError("Bạn không thể cập nhật tài khoản này");
        $update = $params;
        if(isset($params['password']) && !empty($params['password'])){
            $update['password'] = Hash::make($params['password']);
        }
        if(empty($params['password'])){
            unset($update['password']);
        }
        if($admin->type===Admin::TYPE_SUPPER_ADMIN) unset($update['type']);
        $update['dob'] = new Carbon($params['dob']);
        $admin->update($update);
        return new ResponseSuccess();
    }
}
