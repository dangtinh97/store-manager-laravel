@extends('layouts.app')
@section('title','Thêm khách hàng')
@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header">Thêm khách hàng</div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm">
                        <div class="input-group input-group-outline">
                            <label class="form-label">Họ tên</label>
                            <input autocomplete="false" name="full_name" type="text" class="form-control text-white">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="input-group input-group-outline">
                            <label class="form-label">Địa chỉ</label>
                            <input autocomplete="false" type="text" name="address" class="form-control text-white">
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-sm">
                        <div class="input-group input-group-outline">
                            <label class="form-label">Số điện thoại</label>
                            <input autocomplete="false" type="text" name="mobile" class="form-control text-white">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="input-group input-group-outline">
                            <label class="form-label">Email</label>
                            <input autocomplete="off" name="email" type="text" class="form-control text-white">
                        </div>
                    </div>
                </div>

                <div class="row mb-6">
                    <div class="col-sm">
                        <div class="input-group input-group-static">
                            <label class="form-label">Ngày sinh</label>
                            <input autocomplete="false" type="date" name="dob" class="form-control text-white">
                        </div>
                    </div>

                    <div class="col-sm">
{{--                        <div class="input-group input-group-static">--}}
{{--                            <label class="form-label">Date</label>--}}
{{--                            <input autocomplete="false" type="date" name="dob" class="form-control text-white">--}}
{{--                        </div>--}}
                    </div>
                </div>

                <div class="row mb-5">

                    <div class="col-sm">
                        <label class="form-label">Giới tính:</label>
                        <div class="form-check mb-3">
                            <input checked class="form-check-input" value="MALE" type="radio" name="gender" id="customRadio1">
                            <label class="custom-control-label" for="customRadio1">Nam</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" value="FEMALE" type="radio" name="gender" id="customRadio2">
                            <label class="custom-control-label" for="customRadio2">Nữ</label>
                        </div>
                    </div>

                </div>

                <div class="">
                    <button type="button" id="save" class="btn btn-success">
                        <i class="material-icons">save</i>
                        Lưu</button>

                    <a type="button" class="btn btn-secondary" href="{{route('dashboard')}}">
                        <i class="material-icons">close</i>
                        Huỷ bỏ</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded",function (){
            $(this).on('click','#save',async function (){
               const create = await request('{{route('users.store')}}','POST',{
                   full_name:$('input[name="full_name"]').val().trim(),
                   address:$('input[name="address"]').val().trim(),
                   mobile:$('input[name="mobile"]').val().trim(),
                   email:$('input[name="email"]').val().trim(),
                   dob:$('input[name="dob"]').val().trim(),
                   gender:$('input[name="gender"]').val().trim(),
               })
               if(create.status!==200) return $.toaster({
                   message:create.content,
                   priority:'danger'
               });

               return window.location.href = '{{route('users.index')}}'
            })
        })
    </script>
@endsection
