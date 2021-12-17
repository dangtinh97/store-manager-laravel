@extends('layouts.app')
@section('title','ADMIN - Cập nhật tài khoản')
@section('content')
    <div class="row">
        <div class="card">
            @if($errors->any())
            <div class="alert alert-primary text-white" role="alert">
                {{$errors->first()}}
            </div>
            @endif
            <div class="card-header">Cập nhật tài khoản admin</div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm">
                        <div class="input-group input-group-outline focused is-focused">
                            <label class="form-label">Họ tên</label>
                            <input autocomplete="false" value="{{$admin->full_name}}" name="full_name" type="text" class="form-control text-white">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="input-group input-group-outline focused is-focused">
                            <label class="form-label">Địa chỉ</label>
                            <input value="{{$admin->address}}" autocomplete="false" type="text" name="address" class="form-control text-white">
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-sm">
                        <div class="input-group input-group-outline focused is-focused">
                            <label class="form-label">Số điện thoại</label>
                            <input value="{{$admin->mobile}}" autocomplete="false" type="text" name="mobile" class="form-control text-white">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="input-group input-group-outline focused is-focused">
                            <label class="form-label">Email</label>
                            <input readonly value="{{$admin->email}}" autocomplete="off" name="email" type="text" class="form-control text-white">
                        </div>
                    </div>
                </div>

                <div class="row mb-6">
                    <div class="col-sm">
                        <div class="input-group input-group-static focused is-focused">
                            <label class="form-label">Ngày sinh</label>
                            <input value="{{date('Y-m-d',strtotime($admin->dob))}}" autocomplete="false" type="date" name="dob" class="form-control text-white">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="input-group input-group-outline">
                            <label class="form-label">Mật khẩu</label>
                            <input autocomplete="false" type="password" name="password" class="form-control text-white">
                        </div>
                    </div>
                </div>

                <div class="row mb-5">
                    @if($admin->type!=="SUPPER_ADMIN")
                    <div class="col-sm">
                        <label class="form-label">Quyền:</label>
                        <div class="form-check mb-3">
                            <input @if($admin->type==="MANAGER") checked @endif class="form-check-input" value="MANAGER" type="radio" name="type" id="customRadio1">
                            <label class="custom-control-label" for="customRadio1">Quản lý</label>
                        </div>
                        <div class="form-check">
                            <input @if($admin->type==="STAFF") checked @endif class="form-check-input" value="STAFF" type="radio" name="type" id="customRadio2">
                            <label class="custom-control-label" for="customRadio2">Nhân viên</label>
                        </div>
                    </div>
                    @else
                        <input class="form-check-input d-none" checked value="SUPPER_ADMIN" type="radio" name="type" id="customRadio2">
                    @endif
                        <div class="col-sm">
                        <label class="form-label">Giới tính:</label>
                        <div class="form-check mb-3">
                            <input @if($admin->gender==="MALE") checked @endif class="form-check-input" value="MALE" type="radio" name="gender" id="customRadio1">
                            <label class="custom-control-label" for="customRadio1">Nam</label>
                        </div>
                        <div class="form-check">
                            <input @if($admin->gender==="FEMALE") checked @endif class="form-check-input" value="FEMALE" type="radio" name="gender" id="customRadio2">
                            <label class="custom-control-label" for="customRadio2">Nữ</label>
                        </div>
                    </div>

                </div>

                @if($admin->status==="ACTIVE")
                <div class="">
                    <button type="button" id="save" class="btn btn-success">
                        <i class="material-icons">save</i>
                        Lưu</button>

                    @if($admin->id!==Auth::id())
                        <form method="POST" action="{{route('admins.destroy',$admin->id)}}" class="d-inline">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">
                                <i class="material-icons">close</i>
                                Xoá tài khoản
                            </button>
                        </form>

                        <a type="button" class="btn btn-secondary" href="{{route('admins.index')}}">
                            <i class="material-icons">close</i>
                            Quay lại</a>
                        <script>
                            let _redirect = '{{route('admins.index')}}'
                        </script>
                    @else
                        <a type="button" class="btn btn-secondary" href="{{route('dashboard')}}">
                            <i class="material-icons">close</i>
                            Quay lại</a>
                        <script>
                            let _redirect = '{{route('dashboard')}}'
                        </script>
                    @endif


                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded",function (){
            $(this).on('click','#save',async function (){
               const create = await request('{{route('admins.update',$admin->id)}}','PATCH',{
                   full_name:$('input[name="full_name"]').val().trim(),
                   address:$('input[name="address"]').val().trim(),
                   mobile:$('input[name="mobile"]').val().trim(),
                   dob:$('input[name="dob"]').val().trim(),
                   password:$('input[name="password"]').val().trim(),
                   type:$('input[name="type"]:checked').val().trim(),
                   gender:$('input[name="gender"]:checked').val().trim(),
               })
               if(create.status!==200) return $.toaster({
                   message:create.content,
                   priority:'danger'
               });

               return window.location.href = _redirect
            })
        })
    </script>
@endsection
