@extends('layouts.app')
@section('title','Cập nhật khách hàng')
@section('content')
    <div class="row">
        <div class="card">
            @if($errors->any())
                <div class="alert alert-primary text-white" role="alert">
                    {{$errors->first()}}
                </div>
            @endif
            <div class="card-header">Cập nhật khách hàng</div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm">
                        <div class="input-group input-group-outline focused is-focused ">
                            <label class="form-label">Họ tên</label>
                            <input autocomplete="false" value="{{$user->full_name}}" name="full_name" type="text" class="form-control text-white">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="input-group input-group-outline focused is-focused">
                            <label class="form-label">Địa chỉ</label>
                            <input value="{{$user->address}}" autocomplete="false" type="text" name="address" class="form-control text-white">
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-sm">
                        <div class="input-group input-group-outline focused is-focused">
                            <label class="form-label">Số điện thoại</label>
                            <input autocomplete="false" value="{{$user->mobile}}" readonly type="text" name="mobile" class="form-control text-white">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="input-group input-group-outline focused is-focused">
                            <label class="form-label">Email</label>
                            <input autocomplete="off" name="email" value="{{$user->email}}" type="text" class="form-control text-white">
                        </div>
                    </div>
                </div>

                <div class="row mb-6">
                    <div class="col-sm">
                        <div class="input-group input-group-static focused is-focused">
                            <label class="form-label">Ngày sinh</label>
                            <input value="{{date('Y-m-d', strtotime($user->dob))}}" autocomplete="false" type="date" name="dob" class="form-control text-white">
                        </div>
                    </div>

                    <div class="col-sm">

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
                            <input @if($user->gender==="FEMALE") checked @endif class="form-check-input" value="FEMALE" type="radio" name="gender" id="customRadio2">
                            <label class="custom-control-label" for="customRadio2">Nữ</label>
                        </div>
                    </div>

                </div>

                <div class="">
                    <button type="button" id="save" class="btn btn-success">
                        <i class="material-icons">save</i>
                        Lưu</button>
                    <form method="POST" action="{{route('users.destroy',$user->id)}}" class="d-inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" id="delete_user" class="btn btn-danger">
                            <i class="material-icons">close</i>
                            Xoá tài khoản
                        </button>
                    </form>
                    <a type="button" class="btn btn-secondary" href="{{route('users.index')}}">
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
            $(this).on('click','#delete_user',function (){
                let c = confirm("Bạn muốn xoá khách hàng này?");
                if(!c) return false;
                return true;
            })

            $(this).on('click','#save',async function (){
               const create = await request('{{route('users.update',$user->id)}}','PATCH',{
                   full_name:$('input[name="full_name"]').val().trim(),
                   address:$('input[name="address"]').val().trim(),
                   email:$('input[name="email"]').val().trim(),
                   dob:$('input[name="dob"]').val().trim(),
                   gender:$('input[name="gender"]:checked').val().trim(),
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
