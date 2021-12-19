<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryBill extends Model
{
    use HasFactory;
    protected $table = 'histories_bill';
    protected $fillable = ['status','bill_id','admin_id','price','quantity','code'];
    const STATUS_NORMAL = "NORMAL";
    const STATUS_DELETE = "DELETED";

    public function statusText()
    {
        $text = "";
        $status = $this->attributes['status'];
        switch ($status){
            case self::STATUS_NORMAL:
                $text = "Đã xuất hoá đơn";
                break;
            case self::STATUS_DELETE:
                $text = "Đã xoá";
                break;
            default:
                break;

        }
        return $text;
    }

    public function admin()
    {
       return $this->hasOne(Admin::class,'id','admin_id');
    }

    public function bill(){
        return $this->hasOne(Bill::class,'id','bill_id');
    }
}
