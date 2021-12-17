@extends('layouts.app')
@section('title','Tạo dự án')
@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header">Cập nhật dự án</div>
            <div class="card-body container">
                <div class="mb-4">
                    <div class="input-group input-group-outline focused is-focused">
                        <label class="form-label">Tên dự án</label>
                        <input autocomplete="false" value="{{$project->name_project}}" name="name_project" type="text"
                               class="form-control text-white _in_form">
                    </div>
                </div>
                <div class="mb-4">
                    <div class="input-group input-group-outline focused is-focused">
                        <label class="form-label">Số lượng</label>
                        <input autocomplete="false" value="{{$project->quantity}}" type="number" name="quantity"
                               class="form-control text-white _in_form">
                    </div>
                </div>

                <div class="mb-4">
                    <div class="input-group input-group-outline focused is-focused">
                        <label class="form-label">Đơn giá</label>
                        <input autocomplete="false" type="number" value="{{$project->price}}" name="price"
                               class="form-control text-white _in_form">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Trạng thái:</label>
                    <div class="form-check">
                        <input @if($project->status==="NEW") checked @endif @if($project->status!=="NEW") disabled
                               @endif class="form-check-input" value="NEW" type="radio" name="status" id="customRadio1">
                        <label class="custom-control-label" for="customRadio1">Mới</label>
                    </div>
                    <div class="form-check">
                        <input @if($project->status==="ACTIVE") checked
                               @endif @if($project->status==="COMPLETED") disabled @endif class="form-check-input"
                               value="ACTIVE" type="radio" name="status" id="customRadio2">
                        <label class="custom-control-label" for="customRadio2">Đang hoạt động</label>
                    </div>
                    <div class="form-check">
                        <input @if($project->status==="COMPLETED") checked @endif class="form-check-input"
                               value="COMPLETED" type="radio" name="status" id="customRadio3">
                        <label class="custom-control-label" for="customRadio3">Hoàn thành</label>
                    </div>
                </div>
                <div class="">
                    @if($project->status!=="COMPLETED")
                        <button type="button" id="save" class="btn btn-success">
                            <i class="material-icons">save</i>
                            Lưu
                        </button>
                    @endif
                    @if($project->status!=="NEW")
                        <script>
                            document.addEventListener("DOMContentLoaded", function () {
                                $('._in_form').attr("readonly", true)
                            })
                        </script>
                    @endif
                    <a type="button" class="btn btn-secondary" href="{{route('projects.index')}}">
                        <i class="material-icons">close</i>
                        Huỷ bỏ</a>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            $(this).on('click', '#save', async function () {
                const create = await request('{{route('projects.update',$project->id)}}', 'PATCH', {
                    name_project: $('input[name="name_project"]').val().trim(),
                    price: $('input[name="price"]').val().trim(),
                    quantity: $('input[name="quantity"]').val().trim(),
                    status: $('input[name="status"]:checked').val().trim(),
                })
                if (create.status !== 200) return $.toaster({
                    message: create.content,
                    priority: 'danger'
                });
                return window.location.href = '{{route('projects.index')}}'
            })
        })
    </script>
@endsection
