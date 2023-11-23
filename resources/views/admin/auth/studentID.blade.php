
@extends('admin.layouts.loginlayouts')


@section('content')

<form class="login100-form validate-form" method="POST" action="{{ route('studentidpost') }}">
                    @csrf
  
  
                    <span class="login100-form-title">Student Id</span>
                    @if (Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    <div class="wrap-input100 validate-input" data-validate="Valid studentID is required: ex@abc.xyz">
                        <input class="input100" type="text" name="studentID" id="studentID" placeholder="studentID">
                        @if ($errors->has('studentID'))
                            <span class="text-danger">{{ $errors->first('studentID') }}</span>
                        @endif
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                  
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">Login</button>
                    </div>
                  
                 
                </form>
       @endsection