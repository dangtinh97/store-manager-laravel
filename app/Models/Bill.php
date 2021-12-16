<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    const STATUS_BILL_NEW = "NEW";
    const STATUS_EXPORT = "EXPORT";
    protected $table = 'bills';
    protected $fillable = ['project_id','admin_id','status','price','quantity','name_bill'];

    public function statusText()
    {
        $value = "";
        switch ($this->attributes['status']){
            case self::STATUS_BILL_NEW:
                $value = "Chưa xuất hoá đơn";
                break;
            case self::STATUS_EXPORT:
                $value = "Đã xuất hoá đơn";
                break;
            default:
                break;
        }
        return $value;
    }

    public function project()
    {
       return $this->hasOne(Project::class,'id','project_id');
    }

    public function admin(){
        return $this->hasOne(Admin::class,'id','admin_id');
    }

    public function user(){
        return $this->project->contract->user;
    }
}
