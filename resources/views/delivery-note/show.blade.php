@extends('layouts.app')
@section('title','Chi tiết phiếu xuất hàng')
@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Chi tiết phiếu xuất hàng</h6>
                </div>
            </div>
            <div class="card-body container">
                <table class="table">
                    <tbody>
                    <tr class="">
                        <td><label class="form-label">Tên dự án</label></td>
                        <td>
                            <div class="text-white ms-2">{{$item->project->name_project}}</div>
                        </td>
                    </tr>

                    <tr>
                        <td><label class="form-label">Số lượng</label></td>
                        <td>
                            <div class="text-white ms-2">{{number_format($item->quantity)}}</div>
                        </td>
                    </tr>

                    <tr>
                        <td><label class="form-label">Đơn giá</label></td>
                        <td>
                            <div class="text-white ms-2">{{number_format($item->price)}}</div>
                        </td>
                    </tr>

                    <tr>
                        <td><label class="form-label">Thành tiền</label></td>
                        <td>
                            <div class="text-white ms-2">{{number_format($item->price * $item->quantity)}}(đ)
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="form-label">Người tạo</label></td>
                        <td>
                            <div class="text-white ms-2">{{($item->admin->full_name)}}</div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="form-label">Khách hàng</label></td>
                        <td>
                            <div class="text-white ms-2">
                                <span class="d-block">Tên: {{$user->full_name}}</span>
                                <span class="d-block">Email: {{$user->email}}</span>
                                <span class="d-block">SĐT: {{$user->mobile}}</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="form-label">Ngày lập</label></td>
                        <td>
                            <div class="text-white ms-2">{{date('d/m/Y',strtotime(($item->created_at)))}}</div>
                        </td>
                    </tr>

                    <tr>
                        <td><label class="form-label">Trạng thái</label></td>
                        <td>
                            <div class="text-white ms-2">{{$item->statusText()}}</div>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-2">
                        <a target="_blank" href="{{route('bill.print',$item->id)}}" class="btn bg-gradient-primary">
                            <span class="material-icons">file_download</span>Xuất hoá đơn
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded",function (){

        })
    </script>
@endsection
