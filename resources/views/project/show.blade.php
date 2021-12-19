@extends('layouts.app')
@section('title',$project->name_project)
@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Chi tiết dự án</h6>
                </div>
            </div>
            <div class="card-body container">
                <table class="table">
                    <tbody>
                    <tr>
                        <td><label class="form-label">Tên dự án</label></td>
                        <td>
                            <div class="text-white ms-2">{{$project->name_project}}</div>
                        </td>
                    </tr>

                    <tr>
                        <td><label class="form-label">Số lượng</label></td>
                        <td>
                            <div class="text-white ms-2">{{number_format($project->quantity)}}</div>
                        </td>
                    </tr>

                    <tr>
                        <td><label class="form-label">Đơn giá</label></td>
                        <td>
                            <div class="text-white ms-2">{{number_format($project->price)}}</div>
                        </td>
                    </tr>

                    <tr>
                        <td><label class="form-label">Thành tiền</label></td>
                        <td>
                            <div class="text-white ms-2">{{number_format($project->price * $project->quantity)}}(đ)
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="form-label">Thời gian tạo</label></td>
                        <td>
                            <div class="text-white ms-2">{{date('d/m/Y',strtotime($project->created_at))}}</div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="form-label">Trạng thái</label></td>
                        <td>
                            <div class="text-white ms-2">{{$project->statusText()}}</div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                @if(!is_null($contract))
                </br>
                <hr>
                <h5>Thông tin hợp đồng</h5>
                <table class="table">
                    <tbody>
                    <tr>
                        <td><label class="form-label">Thên hợp đồng</label></td>
                        <td>
                            <a class="text-white ms-2 text-decoration-underline" href="{{route('contracts.show',$contract->id)}}">{{$contract->name_contract}}</a>
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
                            <div
                                class="text-white ms-2">{{date('d/m/Y',strtotime($contract->effective_date))}}</div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="form-label">Ngày kết thúc</label></td>
                        <td>
                            <div
                                class="text-white ms-2">{{date('d/m/Y',strtotime($contract->expiration_date))}}</div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="form-label">Trạng thái hợp đồng</label></td>
                        <td>
                            <div class="text-white ms-2">{{$contract->statusText()}}</div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
@endsection
