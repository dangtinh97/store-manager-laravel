@extends('layouts.app')
@section('title',$contract->name_contract)
@section('content')
    <div class="row">
        <div class="card">
            <div class="card-body container">
                <table class="table">
                    <tbody>
                    <tr class="">
                        <td><label class="form-label">Mã hợp đồng</label></td>
                        <td>
                            <div class="text-white ms-2">{{$contract->number_contract}}</div>
                        </td>
                    </tr>

                    <tr>
                        <td><label class="form-label">Tên hợp đồng</label></td>
                        <td>
                            <div class="text-white ms-2">{{$contract->name_contract}}</div>
                        </td>
                    </tr>

                    <tr>
                        <td><label class="form-label">Số lượng</label></td>
                        <td>
                            <div class="text-white ms-2">{{number_format($contract->quantity)}}</div>
                        </td>
                    </tr>

                    <tr>
                        <td><label class="form-label">Đơn giá</label></td>
                        <td>
                            <div class="text-white ms-2">{{number_format($contract->price)}}</div>
                        </td>
                    </tr>

                    <tr>
                        <td><label class="form-label">Thành tiền</label></td>
                        <td>
                            <div class="text-white ms-2">{{number_format($contract->price * $contract->quantity)}}(đ)
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="form-label">Người tạo</label></td>
                        <td>
                            <div class="text-white ms-2">{{($contract->admin->full_name)}}</div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="form-label">Khách hàng</label></td>
                        <td>
                            <div class="text-white ms-2">
                                <span class="d-block">Tên: {{($contract->user->full_name)}}</span>
                                <span class="d-block">Email: {{($contract->user->email)}}</span>
                                <span class="d-block">SĐT: {{($contract->user->mobile)}}</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="form-label">Ngày hiệu lực</label></td>
                        <td>
                            <div class="text-white ms-2">{{date('d/m/Y',strtotime($contract->effective_date))}}</div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="form-label">Ngày kết thúc</label></td>
                        <td>
                            <div class="text-white ms-2">{{date('d/m/Y',strtotime($contract->expiration_date))}}</div>
                        </td>
                    </tr>

                    <tr>
                        <td><label class="form-label">Trạng thái</label></td>
                        <td>
                            <div class="text-white ms-2">{{$contract->statusText()}}</div>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-2">
                        <a target="_blank" href="{{route('contracts.download',$contract->id)}}" class="btn bg-gradient-primary">
                            <span class="material-icons">file_download</span>Xuất hợp đồng
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
