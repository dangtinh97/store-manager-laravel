@extends('layouts.app')
@section('title','Tạo dự án')
@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header">Tạo dự án</div>
            <div class="card-body container">

                <div class="mb-4">
                    <div class="input-group input-group-outline">
                        <label class="form-label">Tên dự án</label>
                        <input autocomplete="false" name="name_project" type="text" class="form-control text-white">
                    </div>
                </div>
                <div class="mb-4">
                    <div class="input-group input-group-outline">
                        <label class="form-label">Số lượng</label>
                        <input autocomplete="false" type="number" name="quantity" class="form-control text-white">
                    </div>
                </div>

                <div class="mb-4">
                    <div class="input-group input-group-outline">
                        <label class="form-label">Đơn giá</label>
                        <input autocomplete="false" type="number" name="price" class="form-control text-white">
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
                const create = await request('{{route('projects.store')}}','POST',{
                    name_project:$('input[name="name_project"]').val().trim(),
                    price:$('input[name="price"]').val().trim(),
                    quantity:$('input[name="quantity"]').val().trim(),
                })
                if(create.status!==200) return $.toaster({
                    message:create.content,
                    priority:'danger'
                });
                return window.location.href = '{{route('projects.index')}}'
            })
        })
    </script>
@endsection
