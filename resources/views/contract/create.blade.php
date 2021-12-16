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
                            <select class="form-control text-white" name="project_id" id="exampleFormControlSelect1">
                                <option value="">Chọn dự án</option>
                                @foreach($projects as $project)
                                    @if(($project->quantity - $project->order) <= 0) @continue @endif
                                    <option data-remaining-amount="{{$project->quantity - $project->order}}" value="{{$project->id}}">{{$project->id}} - {{$project->name_project}} - {{$project->quantity - $project->order}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-sm">
                        <div class="input-group input-group-outline focused is-focused">
                            <label class="form-label">Số lượng</label>
                            <input readonly min="1" value="0" autocomplete="false" name="quantity" type="number" class="form-control text-white">
                        </div>
                    </div>
                    <div class="col-sm">

                    </div>
                </div>

                <div class="">
                    <button type="button" id="save" class="btn btn-success">
                        <i class="material-icons">save</i>
                        Lưu</button>

                    <a type="button" class="btn btn-secondary" href="{{route('contracts.index')}}">
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
            let remainingAmount = 0;
            $(this).on('change','select[name="project_id"]',function (){
                remainingAmount = $('select[name="project_id"] option:selected').data('remaining-amount') ?? 0
                console.log(remainingAmount);
                $('input[name="quantity"]').val(remainingAmount).attr('max',remainingAmount)
            })

            // $('select[name="user_id"]').chosen()

            $(this).on('click','#save',async function (){
                let userId = $('select[name="user_id"] option:selected').val()
                let projectId = $('select[name="project_id"] option:selected').val()


                if(userId==="") return $.toaster({
                    message:'Vui lòng chọn khách hàng',
                    priority:'danger'
                });

                if(projectId==="") return $.toaster({
                    message:'Vui lòng chọn dự án',
                    priority:'danger'
                });

                const create = await request('{{route('contracts.store')}}','POST',{
                    name_contract:$('input[name="name_contract"]').val().trim(),
                    number_contract:$('input[name="number_contract"]').val().trim(),
                    effective_date:$('input[name="effective_date"]').val().trim(),
                    expiration_date:$('input[name="expiration_date"]').val().trim(),
                    quantity:$('input[name="quantity"]').val().trim(),
                    user_id:userId,
                    project_id:projectId,
                })
                if(create.status!==200) return $.toaster({
                    message:create.content,
                    priority:'danger'
                });

                return window.location.href = '{{route('contracts.index')}}'
            })
        })
    </script>
@endsection
