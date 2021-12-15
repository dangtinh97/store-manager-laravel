@extends('layouts.app')
@section('title',$contract->name_contract)
@section('content')
    <div class="row">
        <div class="card">
            <div class="card-body container">
                <div class="mb-4">
                    <div class="input-group input-group-outline focused is-focused">
                        <label class="form-label">Mã hợp đồng</label>
                        <input readonly autocomplete="false" name="number_contract" value="{{$contract->number_contract}}" type="text" class="form-control text-white">
                    </div>
                </div>
                <div class="mb-4">
                    <div class="input-group input-group-outline focused is-focused">
                        <label class="form-label">Tên hợp đồng</label>
                        <input readonly autocomplete="false" name="name_contract" value="{{$contract->name_contract}}" type="text" class="form-control text-white">
                    </div>
                </div>
                <div class="mb-4">
                    <div class="input-group input-group-outline focused is-focused">
                        <label class="form-label">Số lượng</label>
                        <input readonly autocomplete="false" name="quantity" value="{{number_format($contract->quantity)}}" type="text" class="form-control text-white">
                    </div>
                </div>
                <div class="mb-4">
                    <div class="input-group input-group-outline focused is-focused">
                        <label class="form-label">Đơn giá</label>
                        <input readonly autocomplete="false" name="quantity" value="{{number_format($contract->price)}}" type="text" class="form-control text-white">
                    </div>
                </div>
                <div class="mb-4">
                    <div class="input-group input-group-outline focused is-focused">
                        <label class="form-label">Người lập</label>
                        <input readonly autocomplete="false" value="{{($contract->admin->full_name)}}" type="text" class="form-control text-white">
                    </div>
                </div>
                <div class="mb-4">
                    <div class="input-group input-group-outline focused is-focused">
                        <label class="form-label">Khách hàng</label>
                        <span class="form-label">Khách hàng</span>
                        <input readonly autocomplete="false" value="{{($contract->user->full_name)}}" type="text" class="form-control text-white">
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
