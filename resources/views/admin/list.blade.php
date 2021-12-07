@extends('layouts.app')
@section('title','Danh sách admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Danh sách admin</h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table id="myTable" class="table align-items-center mb-0">
                        <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Function</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created</th>
                            <th class="text-secondary opacity-7"></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($admins as $admin)

                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$admin->full_name}}</h6>
                                            <p class="text-xs text-secondary mb-0">{{$admin->email}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{$admin->type}}</p>
{{--                                    <p class="text-xs text-secondary mb-0">Organization</p>--}}
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span class="badge badge-sm bg-gradient-success">Online</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{date('Y/m/d',strtotime($admin->created_at))}}</span>
                                </td>
                                <td class="align-middle">
                                    <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach

{{--                        @for($i=0;$i<100;$i++)--}}
{{--                        <tr>--}}
{{--                            <td>--}}
{{--                                <div class="d-flex px-2 py-1">--}}
{{--                                    <div>--}}
{{--                                        <img src="../assets/img/team-3.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user2">--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex flex-column justify-content-center">--}}
{{--                                        <h6 class="mb-0 text-sm">Alexa Liras</h6>--}}
{{--                                        <p class="text-xs text-secondary mb-0">alexa@creative-tim.com</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                <p class="text-xs font-weight-bold mb-0">Programator</p>--}}
{{--                                <p class="text-xs text-secondary mb-0">Developer</p>--}}
{{--                            </td>--}}
{{--                            <td class="align-middle text-center text-sm">--}}
{{--                                <span class="badge badge-sm bg-gradient-secondary">Offline</span>--}}
{{--                            </td>--}}
{{--                            <td class="align-middle text-center">--}}
{{--                                <span class="text-secondary text-xs font-weight-bold">11/01/19</span>--}}
{{--                            </td>--}}
{{--                            <td class="align-middle">--}}
{{--                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">--}}
{{--                                    Edit--}}
{{--                                </a>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        @endfor--}}
{{--                        <tr>--}}
{{--                            <td>--}}
{{--                                <div class="d-flex px-2 py-1">--}}
{{--                                    <div>--}}
{{--                                        <img src="../assets/img/team-4.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user3">--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex flex-column justify-content-center">--}}
{{--                                        <h6 class="mb-0 text-sm">Laurent Perrier</h6>--}}
{{--                                        <p class="text-xs text-secondary mb-0">laurent@creative-tim.com</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                <p class="text-xs font-weight-bold mb-0">Executive</p>--}}
{{--                                <p class="text-xs text-secondary mb-0">Projects</p>--}}
{{--                            </td>--}}
{{--                            <td class="align-middle text-center text-sm">--}}
{{--                                <span class="badge badge-sm bg-gradient-success">Online</span>--}}
{{--                            </td>--}}
{{--                            <td class="align-middle text-center">--}}
{{--                                <span class="text-secondary text-xs font-weight-bold">19/09/17</span>--}}
{{--                            </td>--}}
{{--                            <td class="align-middle">--}}
{{--                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">--}}
{{--                                    Edit--}}
{{--                                </a>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td>--}}
{{--                                <div class="d-flex px-2 py-1">--}}
{{--                                    <div>--}}
{{--                                        <img src="../assets/img/team-3.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user4">--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex flex-column justify-content-center">--}}
{{--                                        <h6 class="mb-0 text-sm">Michael Levi</h6>--}}
{{--                                        <p class="text-xs text-secondary mb-0">michael@creative-tim.com</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                <p class="text-xs font-weight-bold mb-0">Programator</p>--}}
{{--                                <p class="text-xs text-secondary mb-0">Developer</p>--}}
{{--                            </td>--}}
{{--                            <td class="align-middle text-center text-sm">--}}
{{--                                <span class="badge badge-sm bg-gradient-success">Online</span>--}}
{{--                            </td>--}}
{{--                            <td class="align-middle text-center">--}}
{{--                                <span class="text-secondary text-xs font-weight-bold">24/12/08</span>--}}
{{--                            </td>--}}
{{--                            <td class="align-middle">--}}
{{--                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">--}}
{{--                                    Edit--}}
{{--                                </a>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td>--}}
{{--                                <div class="d-flex px-2 py-1">--}}
{{--                                    <div>--}}
{{--                                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user5">--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex flex-column justify-content-center">--}}
{{--                                        <h6 class="mb-0 text-sm">Richard Gran</h6>--}}
{{--                                        <p class="text-xs text-secondary mb-0">richard@creative-tim.com</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                <p class="text-xs font-weight-bold mb-0">Manager</p>--}}
{{--                                <p class="text-xs text-secondary mb-0">Executive</p>--}}
{{--                            </td>--}}
{{--                            <td class="align-middle text-center text-sm">--}}
{{--                                <span class="badge badge-sm bg-gradient-secondary">Offline</span>--}}
{{--                            </td>--}}
{{--                            <td class="align-middle text-center">--}}
{{--                                <span class="text-secondary text-xs font-weight-bold">04/10/21</span>--}}
{{--                            </td>--}}
{{--                            <td class="align-middle">--}}
{{--                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">--}}
{{--                                    Edit--}}
{{--                                </a>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td>--}}
{{--                                <div class="d-flex px-2 py-1">--}}
{{--                                    <div>--}}
{{--                                        <img src="../assets/img/team-4.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user6">--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex flex-column justify-content-center">--}}
{{--                                        <h6 class="mb-0 text-sm">Miriam Eric</h6>--}}
{{--                                        <p class="text-xs text-secondary mb-0">miriam@creative-tim.com</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                <p class="text-xs font-weight-bold mb-0">Programator</p>--}}
{{--                                <p class="text-xs text-secondary mb-0">Developer</p>--}}
{{--                            </td>--}}
{{--                            <td class="align-middle text-center text-sm">--}}
{{--                                <span class="badge badge-sm bg-gradient-secondary">Offline</span>--}}
{{--                            </td>--}}
{{--                            <td class="align-middle text-center">--}}
{{--                                <span class="text-secondary text-xs font-weight-bold">14/09/20</span>--}}
{{--                            </td>--}}
{{--                            <td class="align-middle">--}}
{{--                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">--}}
{{--                                    Edit--}}
{{--                                </a>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
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
