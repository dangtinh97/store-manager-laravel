<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $table = 'contracts';
    protected $fillable = ['admin_id','project_id','user_id','name_contract',
        'number_contract','effective_date','expiration_date','status',
        'quantity','price'
    ];
    const STATUS_NEW = 'NEW';

    function admin()
    {
        return $this->hasOne(Admin::class,'id','admin_id');
    }

    function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    function project()
    {
        return $this->hasOne(Project::class,'id','project_id');
    }

    public function statusText():string
    {
        $value = "";
        switch ($this->attributes['status']){
            case "NEW":
                $value = "Mới";
                break;
            case "ACTIVE":
                $value = "Đang hoạt động";
                break;
            default:
                $value = "Chưa xác định";
                break;
        }
        return $value;
    }
}
