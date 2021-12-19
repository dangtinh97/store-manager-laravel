@extends('layouts.app')
@section('title','Chi tiết hoá đơn - '.$history->id)
@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Chi tiết hoá đơn</h6>
                </div>
            </div>
            <div class="card-body container">
                <table class="table">
                    <tbody>
                    <tr class="">
                        <td><label class="form-label">Mã hoá đơn</label></td>
                        <td>
                            <div class="text-white ms-2">{{$history->code}}</div>
                        </td>
                    </tr>

                    <tr>
                        <td><label class="form-label">Giá</label></td>
                        <td>
                            <div class="text-white ms-2">{{$history->price}}</div>
                        </td>
                    </tr>

                    <tr>
                        <td><label class="form-label">Số lượng</label></td>
                        <td>
                            <div class="text-white ms-2">{{number_format($history->quantity)}}</div>
                        </td>
                    </tr>

                    <tr>
                        <td><label class="form-label">Đơn giá</label></td>
                        <td>
                            <div class="text-white ms-2">{{number_format($history->price)}}</div>
                        </td>
                    </tr>

                    <tr>
                        <td><label class="form-label">Thành tiền</label></td>
                        <td>
                            <div class="text-white ms-2">{{number_format($history->price * $history->quantity)}}(đ)
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="form-label">Người tạo</label></td>
                        <td>
                            <div class="text-white ms-2">{{($history->admin->full_name)}}</div>
                        </td>
                    </tr>

                    <tr>
                        <td><label class="form-label">Ngày tạo</label></td>
                        <td>
                            <div class="text-white ms-2">{{date('d/m/Y',strtotime($history->created_at))}}</div>
                        </td>
                    </tr>

                    <tr>
                        <td><label class="form-label">Trạng thái</label></td>
                        <td>
                            <div class="text-white ms-2">{{$history->statusText()}}</div>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-2">
                        <a target="_blank" href="{{route('bill.print',$history->bill->id)}}" class="btn bg-gradient-info">
                            <span class="material-icons">receipt</span>In hoá đơn
                        </a>
                    </div>

                    @if($history->status==="NORMAL")
                        <form method="POST" action="{{route('histories-bill.destroy',$history->id)}}" class="d-inline">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-sm btn-secondary">
                                <i class="material-icons">close</i>
                                Xoá tài khoản
                            </button>
                        </form>
                    @endif
                </div>


            </div>
        </div>
    </div>
@endsection
