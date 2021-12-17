@extends('layouts.app')
@section('title','Danh sách khách hàng')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Danh sách khách hàng</h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table id="myTable" class="table align-items-center mb-0">
                        <thead>
                        <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">id khách hàng</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tên khách hàng</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Số điện thoại</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Giới tính</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Địa chỉ</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ngày sinh</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ngày tạo</th>
                            <th class="text-secondary opacity-7"></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($list as $user)

                            <tr>
                                <td>
                                    <p class="text-center text-xs font-weight-bold mb-0">{{$user->id}}</p>
                                    {{--                                    <p class="text-xs text-secondary mb-0">Organization</p>--}}
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$user->full_name}}</h6>
                                            <p class="text-xs text-secondary mb-0">{{$user->email}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs text-center font-weight-bold mb-0">{{$user->mobile}}</p>
                                    {{--                                    <p class="text-xs text-secondary mb-0">Organization</p>--}}
                                </td>
                                <td>
                                    <p class="text-xs text-center font-weight-bold mb-0">{{$user->gender}}</p>
                                    {{--                                    <p class="text-xs text-secondary mb-0">Organization</p>--}}
                                </td>
                                <td>
                                    <p class="text-xs text-center font-weight-bold mb-0">{{$user->address}}</p>
{{--                                    <p class="text-xs text-secondary mb-0">Organization</p>--}}
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <p class="text-xs font-weight-bold mb-0">{{date('d/m/Y',strtotime($user->dob))}}</p>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{date('d/m/Y',strtotime($user->created_at))}}</span>
                                </td>
                                <td class="align-middle">
                                    <a href="{{route('users.show',$user->id)}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                        <span class="badge bg-gradient-info">Xem</span>
                                    </a>
                                    <a href="{{route('users.edit',$user->id)}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                        <span class="badge bg-gradient-danger">Sửa</span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded",function (){
             $('#myTable').DataTable();
        })
    </script>
@endsection
