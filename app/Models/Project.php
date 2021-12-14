<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $fillable = ['admin_id','name_project','quantity','price'];
    const STATUS_NEW = "NEW";

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = (float)$value;
    }

    public function setQuantityAttribute($value)
    {
        $this->attributes['quantity'] =  (int)$value;
    }

    public function getStatusAttribute($value)
    {
        switch ($value){
            case "NEW":
                $value = "Dự án mới";
                break;
            default:
                $value = "chưa xác định";
                break;
        }
        return $value;
    }
}
