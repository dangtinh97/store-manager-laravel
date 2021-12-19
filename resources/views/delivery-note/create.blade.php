@extends('layouts.app')
@section('title','Phiếu xuất hàng')
@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header">Phiếu xuất hàng</div>
            <div class="card-body container">
                <div class="mb-4">
                    <div class="input-group input-group-static">
                        <label for="exampleFormControlSelect1" class="ms-0">Dự án</label>
                        <select class="form-control text-white" name="project_id" id="exampleFormControlSelect1">
                            <option id="empty-option" value="">-- Chọn dự án --</option>
                            @foreach($projects as $project)
                                @if($project->quantity - $project->order <=0) @continue @endif
                                <option value="{{$project->id}}" data-price="{{$project->price}}" data-quantity="{{$project->quantity - $project->order}}">{{$project->name_project}}</option>
                            @endforeach

{{--                            <option>2</option>--}}
{{--                            <option>3</option>--}}
{{--                            <option>4</option>--}}
{{--                            <option>5</option>--}}
                        </select>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="input-group input-group-outline focused is-focused">
                        <label class="form-label">Số lượng</label>
                        <input min = "1" autocomplete="false" type="number" value="1" name="quantity" class="form-control text-white">
                    </div>
                </div>

                <div class="mb-4">
                    <div class="input-group input-group-outline focused is-focused">
                        <label class="form-label">Đơn giá</label>
                        <input value="0" readonly autocomplete="false" type="text" name="price" class="form-control text-white">
                    </div>
                </div>

                <div class="mb-4">
                    <div class="input-group input-group-outline focused is-focused">
                        <label class="form-label">Tổng giá thành</label>
                        <input value="0 (vnđ)" readonly autocomplete="false" type="text" name="total" class="form-control text-white">
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
            let price = 0;
            let maxQuantity = 0;
            $(this).on('change','select[name="project_id"]',function (){
                $("#empty-option").remove();
                let quantity = $('select[name="project_id"] option:selected').data('quantity');
                maxQuantity = parseInt(quantity);
                price = $('select[name="project_id"] option:selected').data('price');
                $('input[name="quantity"]').val(quantity).attr('max',quantity)
                $('input[name="price"]').val(price.toLocaleString('it-IT', {style : 'currency', currency : 'VND'}))
                $('input[name="total"]').val((quantity*price).toLocaleString('it-IT', {style : 'currency', currency : 'VND'}))
            })

            $(this).on('change','input[name="quantity"]',function (){
                let quantity = $(this).val().trim();
                $('input[name="total"]').val((quantity*price).toLocaleString('it-IT', {style : 'currency', currency : 'VND'}))
            })

            $(this).on('click','#save',async function (){
                let quantity = parseInt($('input[name="quantity"]').val().trim());
                if(quantity===0 || quantity>maxQuantity) return $.toaster({
                    message:'số lượng chọn không hợp lệ',
                    priority:'danger'
                });


                const create = await request('{{route('delivery-notes.store')}}','POST',{
                    project_id:$('select[name="project_id"] option:selected').val().trim(),
                    quantity:quantity,
                })
                if(create.status!==200) return $.toaster({
                    message:create.content,
                    priority:'danger'
                });
                let url = '{{route('delivery-notes.show','__id')}}'
                return window.location.href = url.replace('__id',create.data.id)
            })
        })
    </script>
@endsection
