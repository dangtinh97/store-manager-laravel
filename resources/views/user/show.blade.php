@extends('layouts.app')
@section('title',"Khách hàng ".$user->full_name)
@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Chi tiết khách hàng</h6>
                </div>
            </div>
            <div class="card-body container">
                <table class="table">
                    <tbody>
                    <tr>
                        <td><label class="form-label">Tên khách hàng</label></td>
                        <td>
                            <div class="text-white ms-2">{{$user->full_name}}</div>
                        </td>
                    </tr>

                    <tr>
                        <td><label class="form-label">Số điện thoại</label></td>
                        <td>
                            <div class="text-white ms-2">{{$user->mobile}}</div>
                        </td>
                    </tr>

                    <tr>
                        <td><label class="form-label">Email</label></td>
                        <td>
                            <div class="text-white ms-2">{{$user->email}}</div>
                        </td>
                    </tr>

                    <tr>
                        <td><label class="form-label">Địa chỉ</label></td>
                        <td>
                            <div class="text-white ms-2">{{$user->address}}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="form-label">Thời gian tạo</label></td>
                        <td>
                            <div class="text-white ms-2">{{date('d/m/Y',strtotime($user->created_at))}}</div>
                        </td>
                    </tr>
{{--                    <tr>--}}
{{--                        <td><label class="form-label">Trạng thái</label></td>--}}
{{--                        <td>--}}
{{--                            <div class="text-white ms-2">{{$contract->statusText()}}</div>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
                    </tbody>
                </table>
                @if(count($user->contract)>0)
                </br>
                <hr>
                <h5>Thông tin dự án</h5>
                <table class="table">
                    <thead>
                    <tr>
                        <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên dự án</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ngày hiệu lực</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ngày kết thúc</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Số lượng</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Đơn giá</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trạng thái</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user->contract as $contract)
                        <tr>
                            <td><a class="text-decoration-underline" target="_blank" href="{{route('contracts.show',$contract->id)}}">{{$contract->name_contract}}</a></td>
                            <td class="align-middle text-center text-sm">
                                <span class="text-xs font-weight-bold mb-0">{{date('d/m/Y',strtotime($contract->effective_date))}}</span>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span class="text-xs font-weight-bold mb-0">{{date('d/m/Y',strtotime($contract->expiration_date))}}</span>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span class="text-xs font-weight-bold mb-0">{{number_format($contract->quantity)}}</span>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span class="text-xs font-weight-bold mb-0">{{number_format($contract->price)}}</span>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span class="text-xs font-weight-bold mb-0">{{$contract->statusText()}}</span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
@endsection
