@extends('auth.layouts.security')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <!--begin::Login Sign in form-->
    <div class="login-signin">
        <div class="mb-20">
            <h3>Acceso al sistema</h3>
            <div class="text-muted font-weight-bold">Ingrese sus datos para acceder a su cuenta:</div>
        </div>
        <form action="{{ route('login') }}" method="POST" autocomplete="off" class="form"
            id="kt_login_signin_form">
            @csrf
            <div class="form-group mb-5">
                <input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="Nombre de usuario" name="username"
                    value="{{ old('username') }}" autocomplete="off" />
            </div>
            <div class="form-group mb-5">
                <input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="Password"
                    name="password" />
            </div>
            <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                <div class="checkbox-inline">
                    <label class="checkbox m-0 text-muted">
                        <input type="checkbox" name="remember" />
                        <span></span>Recordarme</label>
                </div>
                {{--<a href="javascript:;" id="kt_login_forgot" class="text-muted text-hover-primary">Olvidaste la
                    contraseña?</a>--}}
            </div>
            <button id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Iniciar
                sesión</button>
        </form>
        <div class="mt-10">
            <span class="opacity-70 mr-4">Todavía no tenes una cuenta?</span>
            <a href="javascript:;" id="kt_login_signup"
                class="text-muted text-hover-primary font-weight-bold">Registrate!</a>
        </div>
    </div>
    <!--end::Login Sign in form-->
   
    <!--begin::Login Sign up form-->
    <div class="login-signup">
        <div class="mb-20">
            <h3>Registro</h3>
            <div class="text-muted font-weight-bold">Ingresá tus datos para crear una cuenta</div>
        </div>
        <form action="{{ route('register') }}" method="POST" class="form" id="kt_login_signup_form">
            @csrf
            <div class="form-group mb-5">
                <input class="form-control h-auto form-control-solid py-4 px-8" type="text" value="{{ old('firstName') }}"
                    placeholder="Nombre" name="firstName" autocomplete="firstName" autofocus />
            </div>
            <div class="form-group mb-5">
                <input class="form-control h-auto form-control-solid py-4 px-8" type="text" value="{{ old('middleName') }}"
                    placeholder="Segundo nombre" name="middleName" autocomplete="middleName" />
            </div>
            <div class="form-group mb-5">
                <input class="form-control h-auto form-control-solid py-4 px-8" type="text" value="{{ old('lastName') }}"
                    placeholder="Apellido" name="lastName" autocomplete="lastName" />
            </div>
            <div class="form-group mb-5">
                <input class="form-control h-auto form-control-solid py-4 px-8" type="text" value="{{ old('nickName') }}"
                    placeholder="Apodo" name="nickName" autocomplete="nickName" />
            </div>
            <div class="form-group mb-5">
                <input class="form-control h-auto form-control-solid py-4 px-8" type="date" value="{{ old('birthday') }}"
                    placeholder="Fecha de nacimiento" name="birthday" autocomplete="birthday" />
            </div>

            <div class="form-group mb-5">
                <select class="custom-select h-auto form-control form-control-solid py-4 px-8" name="governmentIdType">
                    <option value="" selected="selected">Tipo de documento</option>
                    <option value="DNI">DNI</option>
                    <option value="LC">LC</option>
                    <option value="LE">LE</option>
                    <option value="CI">CI</option>
                    <option value="Pasaporte">Pasaporte</option>
                </select>
                
            </div>

            <div class="form-group mb-5">
                <input class="form-control h-auto form-control-solid py-4 px-8" type="text" value="{{ old('governmentId') }}"
                    placeholder="Número de documento" name="governmentId" autocomplete="governmentId" />
            </div>
            
            <div class="form-group row">
                <label class="col-3 col-form-label">Género</label>
                <div class="col-9 col-form-label">
                    <div class="radio-inline">
                        <label class="radio radio-primary">
                        <input type="radio" name="gender" value="female">
                        <span></span>Femenino</label>
                        <label class="radio radio-primary">
                        <input type="radio" name="gender"  value="male">
                        <span></span>Masculino</label>
                        
                    </div>
                    {{--<span class="form-text text-muted">Some help text goes here</span>--}}
                </div>
            </div>

            <div class="form-group mb-5">
                <input class="form-control h-auto form-control-solid py-4 px-8" type="text" value="{{ old('username') }}"
                    placeholder="Nombre de usuario" name="username" required autocomplete="username" />
            </div>
            <div class="form-group mb-5">
                <input class="form-control h-auto form-control-solid py-4 px-8" type="text" value="{{ old('email') }}"
                    placeholder="Email" name="email" autocomplete="email" />
            </div>
            <div class="form-group mb-5">
                <input class="form-control h-auto form-control-solid py-4 px-8" type="text" value="{{ old('mobile') }}"
                    placeholder="Móvil" name="mobile" autocomplete="móvil" />
            </div>
            <div class="form-group mb-5">
                <input class="form-control h-auto form-control-solid py-4 px-8" type="password"
                    placeholder="Contraseña" name="password" required autocomplete="new-password" autocomplete="off" />
            </div>
            <div class="form-group mb-5">
                <input class="form-control h-auto form-control-solid py-4 px-8" type="password"
                    placeholder="Confirme contraseña" name="password_confirmation" required
                    autocomplete="new-password" />
            </div>
            <div class="form-group mb-5 text-left">
                <div class="checkbox-inline">
                    <label class="checkbox m-0">
                        <input type="checkbox" name="agree" />
                        <span></span>Estoy de acuerdo con los 
                        <a href="{{route('condiciones')}}" class="font-weight-bold ml-1">terminos y condiciones</a>.</label>
                </div>
                <div class="form-text text-muted text-center"></div>
            </div>
            <div class="form-group d-flex flex-wrap flex-center mt-10">
                <button id="kt_login_signup_submit"
                    class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Registrarme</button>
                <button id="kt_login_signup_cancel"
                    class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancelar</button>
            </div>
        </form>
    </div>
    <!--end::Login Sign up form-->
    <!--begin::Login forgot password form-->
    <div class="login-forgot">
        <div class="mb-20">
            <h3>Olvidaste la contraseña?</h3>
            <div class="text-muted font-weight-bold">Ingresá tu email para resetear la contraseña</div>
        </div>
        <form class="form" id="kt_login_forgot_form">
            <div class="form-group mb-10">
                <input class="form-control form-control-solid h-auto py-4 px-8" type="text" placeholder="Email" name="email"
                    autocomplete="off" />
            </div>
            <div class="form-group d-flex flex-wrap flex-center mt-10">
                <button id="kt_login_forgot_submit"
                    class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Solicitar</button>
                <button id="kt_login_forgot_cancel"
                    class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancelar</button>
            </div>
        </form>
    </div>
    <!--end::Login forgot password form-->
@endsection

@section('scripts')
<script src="{{ asset('assets/js/pages/custom/login/login-general.js') }}"></script>
@endsection