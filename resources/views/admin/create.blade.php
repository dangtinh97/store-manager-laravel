@extends('layouts.app')
@section('title','ADMIN - Tạo tài khoản')
@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header">Tạo tài khoản admin</div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm">
                        <div class="input-group input-group-outline">
                            <label class="form-label">Họ tên</label>
                            <input type="text" class="form-control text-white">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="input-group input-group-outline">
                            <label class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control text-white">
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-sm">
                        <div class="input-group input-group-outline">
                            <label class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control text-white">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="input-group input-group-outline">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control text-white">
                        </div>
                    </div>
                </div>

                <div class="row mb-6">
                    <div class="col-sm">
                        <div class="input-group input-group-static">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control text-white">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="input-group input-group-outline">
                            <label class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control text-white">
                        </div>
                    </div>
                </div>

                <div class="row mb-5">
                    <label class="form-label">Quyền:</label>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="type" id="customRadio1">
                        <label class="custom-control-label" for="customRadio1">Toggle this custom radio</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type" id="customRadio2">
                        <label class="custom-control-label" for="customRadio2">Or toggle this other custom radio</label>
                    </div>
                </div>

                <div class="">
                    <button type="button" class="btn btn-success">
                        <i class="material-icons">save</i>
                        Lưu</button>

                    <button type="button" class="btn btn-secondary">
                        <i class="material-icons">close</i>
                        Huỷ bỏ</button>
                </div>
            </div>
        </div>
    </div>
@endsection
