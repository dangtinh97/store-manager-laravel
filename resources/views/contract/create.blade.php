@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.css" integrity="sha512-0nkKORjFgcyxv3HbE4rzFUlENUMNqic/EzDIeYCgsKa/nwqr2B91Vu/tNAu4Q0cBuG4Xe/D1f/freEci/7GDRA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@section('title','Tạo hợp đồng')
@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header">Tạo tài hợp đồng</div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm">
                        <div class="input-group input-group-outline">
                            <label class="form-label">Tên hợp đồng</label>
                            <input autocomplete="false" name="name_contract" type="text" class="form-control text-white">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="input-group input-group-outline focused is-focused">
                            <label class="form-label">Mã hợp đồng</label>
                            <input autocomplete="false" readonly type="text" value="{{$numberContract}}" name="number_contract" class="form-control text-white">
                        </div>
                    </div>
                </div>

                <div class="row mb-6">
                    <div class="col-sm">
                        <div class="input-group input-group-static focused is-focused">
                            <label class="form-label">Ngày hiệu lực</label>
                            <input value="{{date('Y-m-d')}}" autocomplete="false" type="date" name="effective_date" class="form-control text-white">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="input-group input-group-static focused is-focused">
                            <label class="form-label">Ngày hết hạn</label>
                            <input value="{{date('Y-m-d',strtotime('+1month'))}}" autocomplete="false" type="date" name="expiration_date" class="form-control text-white">
                        </div>
                    </div>
                </div>

                <div class="row mb-6">
                    <div class="col-sm">
                        <div class="input-group input-group-static">
                            <label for="exampleFormControlSelect1" class="ms-0 text-white">Khách hàng</label>
                            <select class="form-control text-white" name="user_id" id="exampleFormControlSelect1">
                                <option value="">Chọn khách hàng</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->full_name}} - {{$user->email}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="input-group input-group-static">
                            <label for="exampleFormControlSelect1" class="ms-0 text-white">Dự án</label>
                            <select class="form-control text-white" name="user_id" id="exampleFormControlSelect1">
                                <option value="">Chọn dự án</option>
                                @foreach($projects as $project)
                                    <option value="{{$project->id}}">{{$project->name_project}} - {{$project->id}}</option>
                                @endforeach
                            </select>
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
<style>
    .chosen-single{
        height: 30px;
    }
</style>
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js" integrity="sha512-rMGGF4wg1R73ehtnxXBt5mbUfN9JUJwbk21KMlnLZDJh7BkPmeovBuddZCENJddHYYMkCh9hPFnPmS9sspki8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        document.addEventListener("DOMContentLoaded",function (){

            // $('select[name="user_id"]').chosen()

            $(this).on('click','#save',async function (){
                const create = await request('{{route('contracts.store')}}','POST',{
                    full_name:$('input[name="full_name"]').val().trim(),
                    address:$('input[name="address"]').val().trim(),
                    mobile:$('input[name="mobile"]').val().trim(),
                    email:$('input[name="email"]').val().trim(),
                    dob:$('input[name="dob"]').val().trim(),
                    password:$('input[name="password"]').val().trim(),
                    type:$('input[name="type"]').val().trim(),
                    gender:$('input[name="gender"]').val().trim(),
                })
                if(create.status!==200) return $.toaster({
                    message:create.content,
                    priority:'danger'
                });

                return window.location.href = '{{route('admins.index')}}'
            })
        })
    </script>
@endsection
