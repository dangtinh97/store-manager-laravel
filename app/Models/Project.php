<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $fillable = ['admin_id','name_project','quantity','price','order','status'];
    const STATUS_NEW = "NEW";
    const STATUS_ACTIVE = "ACTIVE";

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = (float)$value;
    }

    public function setQuantityAttribute($value)
    {
        $this->attributes['quantity'] =  (int)$value;
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
