@extends('auth.layouts.app')
@section('content')
    <div role="form" class="text-start">
        <div class="input-group input-group-outline my-3">
            <label class="form-label">Email</label>
            <input type="email" id="email" class="form-control">
        </div>
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">Password</label>
            <input type="password" id="password" class="form-control">
        </div>
        <div class="form-check form-switch d-flex align-items-center mb-3">
            <input class="form-check-input" type="checkbox" id="rememberMe">
            <label class="form-check-label mb-0 ms-2" for="rememberMe">Remember me</label>
        </div>
        <div class="text-center">
            <button type="button" id="login" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button>
        </div>
{{--        <p class="mt-4 text-sm text-center">--}}
{{--            Don't have an account?--}}
{{--            <a href="{{route('register')}}" class="text-primary text-gradient font-weight-bold">Sign up</a>--}}
{{--        </p>--}}
    </div>
@endsection
@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded",function (){


            $(this).on('click','#login',()=>{
                $.ajax({
                    url:'{{route('attempt.login')}}',
                    type:"POST",
                    dataType:"JSON",
                    headers:{
                      'X-CSRF-TOKEN':_token
                    },
                    data:{
                        email:$('#email').val().trim(),
                        password:$("#password").val().trim()
                    },
                    success:(res)=>{
                        if(res.status!==200) return $.toaster({
                            message:res.content,
                            priority:'error'
                        })
                        return window.location.href = "{{route('dashboard')}}"
                    }
                })
            })
        })
    </script>
@endsection
