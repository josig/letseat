@extends('layouts.app')


@section('styles')
    <link href="{{ asset('assets/css/pages/wizard/wizard-4.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Card-->
                <div class="card card-custom card-transparent">
                    <div class="card-body p-0">
                        <!--begin::Wizard-->
                        <div class="wizard wizard-4" id="kt_wizard" data-wizard-state="step-first"
                            data-wizard-clickable="true">
                            <!--begin::Wizard Nav-->
                            <div class="wizard-nav">
                                <div class="wizard-steps">
                                    <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                        <div class="wizard-wrapper">
                                            <div class="wizard-number">1</div>
                                            <div class="wizard-label">
                                                <div class="wizard-title">Perfil</div>
                                                <div class="wizard-desc">Datos personales del perfil</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wizard-step" data-wizard-type="step">
                                        <div class="wizard-wrapper">
                                            <div class="wizard-number">2</div>
                                            <div class="wizard-label">
                                                <div class="wizard-title">Cuenta</div>
                                                <div class="wizard-desc">Datos para el sistema</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wizard-step" data-wizard-type="step">
                                        <div class="wizard-wrapper">
                                            <div class="wizard-number">3</div>
                                            <div class="wizard-label">
                                                <div class="wizard-title">Institución</div>
                                                <div class="wizard-desc">Información sobre la institución</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wizard-step" data-wizard-type="step">
                                        <div class="wizard-wrapper">
                                            <div class="wizard-number">4</div>
                                            <div class="wizard-label">
                                                <div class="wizard-title">Salud</div>
                                                <div class="wizard-desc">Información sobre afecciones</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Wizard Nav-->
                            


                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif





                            <!--begin::Card-->
                            <div class="card card-custom card-shadowless rounded-top-0">
                                <!--begin::Body-->
                                <div class="card-body p-0">
                                    <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                                        <div class="col-xl-12 col-xxl-10">
                                            <!--begin::Wizard Form-->
                                            <form action="{{ route('users.store') }}" method="POST" class="form" id="kt_form">
                                                @csrf
                                                <div class="row justify-content-center">
                                                    <div class="col-xl-9">

                                                        <!--begin::Wizard Step 1-->
                                                        <div class="my-5 step" data-wizard-type="step-content"
                                                            data-wizard-state="current">
                                                            <h5 class="text-dark font-weight-bold mb-10">Detalles del perfil</h5>
                                                            {{--<!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-xl-3 col-lg-3 col-form-label text-left">Foto de perfil</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <div class="image-input image-input-outline"
                                                                        id="kt_user_add_avatar">
                                                                        <div class="image-input-wrapper"
                                                                            style="background-image: url({{ asset('assets/media/users/100_6.jpg') }})">
                                                                        </div>
                                                                        <label
                                                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                            data-action="change" data-toggle="tooltip"
                                                                            title="" data-original-title="Change avatar">
                                                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                                                            <input type="file" name="profile_avatar"
                                                                                accept=".png, .jpg, .jpeg" />
                                                                            <input type="hidden"
                                                                                name="profile_avatar_remove" />
                                                                        </label>
                                                                        <span
                                                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                            data-action="cancel" data-toggle="tooltip"
                                                                            title="Cancel avatar">
                                                                            <i
                                                                                class="ki ki-bold-close icon-xs text-muted"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->--}}
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Primer nombre</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input
                                                                        class="form-control form-control-solid form-control-lg"
                                                                        name="firstName" type="text" value="{{ old('firstName') }}" />
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Segundo nombre</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input
                                                                        class="form-control form-control-solid form-control-lg"
                                                                        name="middleName" type="text" value="{{ old('middleName') }}" />
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Apellido</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input
                                                                        class="form-control form-control-solid form-control-lg"
                                                                        name="lastName" type="text" value="{{ old('lastName') }}" />
                                                                    {{--<span class="form-text text-muted">-</span>--}}
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Apodo</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input
                                                                        class="form-control form-control-solid form-control-lg"
                                                                        name="nickName" type="text" value="{{ old('nickName') }}" />
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                            <!--begin::Group-->
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
                                                            <!--end::Group-->
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Fecha de nacimiento</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <div
                                                                        class="input-group input-group-solid input-group-lg">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="la la-calendar"></i>
                                                                            </span>
                                                                        </div>
                                                                        <input type="date"
                                                                            class="form-control form-control-solid form-control-lg"
                                                                            name="birthday" value="{{ old('birthday') }}"
                                                                            placeholder="" />
                                                                    </div>
                                                                    <span class="form-text text-muted">Seleccione la fecha desde el mapa.</span>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Número de documento</label>
                                                                <div class="col-lg-3 col-xl-3">
                                                                    <div
                                                                        class="input-group input-group-solid input-group-lg">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="la la-id-card-o"></i>
                                                                            </span>
                                                                        </div>
                                                                        <select
                                                                        class="form-control form-control-lg form-control-solid"
                                                                        name="governmentIdType">
                                                                        <option value="">Tipo</option>
                                                                        <option value="DNI">DNI</option>
                                                                        <option value="LC">LC</option>
                                                                        <option value="LE">LE</option>
                                                                        <option value="CI">CI</option>
                                                                        <option value="Pasaporte">Pasaporte</option>
                                                                    </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-xl-6">
                                                                    <div
                                                                        class="input-group input-group-solid input-group-lg">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="la la-id-card-o"></i>
                                                                            </span>
                                                                        </div>
                                                                        <input type="text"
                                                                            class="form-control form-control-solid form-control-lg"
                                                                            name="governmentId" placeholder="" autocomplete="off"
                                                                            value="{{ old('governmentId') }}" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                        </div>
                                                        <!--end::Wizard Step 1-->




                                                        <!--begin::Wizard Step 2-->
                                                        <div class="my-5 step" data-wizard-type="step-content">
                                                            <h5 class="text-dark font-weight-bold mb-10 mt-5">Detalles de la cuenta del usuario</h5>
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Nombre de usuario</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <div
                                                                        class="input-group input-group-solid input-group-lg">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="la la-user"></i>
                                                                            </span>
                                                                        </div>
                                                                        <input type="text"
                                                                            class="form-control form-control-solid form-control-lg"
                                                                            name="username" placeholder=""
                                                                            value="{{ old('username') }}" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Contraseña</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <div
                                                                        class="input-group input-group-solid input-group-lg">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="la la-key"></i>
                                                                            </span>
                                                                        </div>
                                                                        <input type="password"
                                                                            class="form-control form-control-solid form-control-lg"
                                                                            name="password" placeholder=""
                                                                            value="{{ old('password') }}" autocomplete="off" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Repetir contraseña</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <div
                                                                        class="input-group input-group-solid input-group-lg">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="la la-key"></i>
                                                                            </span>
                                                                        </div>
                                                                        <input type="password"
                                                                            class="form-control form-control-solid form-control-lg"
                                                                            name="password_confirmation" placeholder=""
                                                                            value="" autocomplete="off"  />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                            <div class="separator separator-dashed my-10"></div>
                                                            <h5 class="text-dark font-weight-bold mb-10">Información de contacto</h5>
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Email</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <div
                                                                        class="input-group input-group-solid input-group-lg">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="la la-envelope-o"></i>
                                                                            </span>
                                                                        </div>
                                                                        <input type="text"
                                                                            class="form-control form-control-solid form-control-lg"
                                                                            name="email" placeholder=""
                                                                            value="{{ old('email') }}" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Teléfono móvil</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <div
                                                                        class="input-group input-group-solid input-group-lg">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="la fab la-whatsapp"></i>
                                                                            </span>
                                                                        </div>
                                                                        <input type="text"
                                                                            class="form-control form-control-solid form-control-lg"
                                                                            name="mobile" placeholder=""
                                                                            value="{{ old('mobile') }}" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                        </div>
                                                        <!--end::Wizard Step 2-->




                                                        <!--begin::Wizard Step 3-->
                                                        <div class="my-5 step" data-wizard-type="step-content">
                                                            <h5 class="mb-10 font-weight-bold text-dark">Datos del alumno</h5>
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Institución</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <div
                                                                        class="input-group input-group-solid input-group-lg">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="la la-building"></i>
                                                                            </span>
                                                                        </div>
                                                                        <select class="custom-select h-auto form-control form-control-solid py-4 px-8" name="establishment">
                                                                            <option value="" selected="selected">Seleccione institución</option>
                                                                            <option value="1">Colegio San Bartolomé</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Grado</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <div
                                                                        class="input-group input-group-solid input-group-lg">
                                                                        <select class="custom-select form-control" name="degree">
                                                                            <option value="" selected="selected">Selecciona el grado</option>
                                                                            <option value="1">Sala de 3 años</option>
                                                                            <option value="2">Sala de 4 años</option>
                                                                            <option value="3">Preescolar</option>
                                                                            <option value="4">1er grado</option>
                                                                            <option value="5">2do grado</option>
                                                                            <option value="6">3er grado</option>
                                                                            <option value="7">4to grado</option>
                                                                            <option value="8">5to grado</option>
                                                                            <option value="9">6to grado</option>
                                                                            <option value="10">7mo grado</option>
                                                                            <option value="11">1er año</option>
                                                                            <option value="12">2do año</option>
                                                                            <option value="13">3er año</option>
                                                                            <option value="14">4to año</option>
                                                                            <option value="15">5to año</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Sección</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <div
                                                                        class="input-group input-group-solid input-group-lg">
                                                                        <select class="custom-select form-control" name="section">
                                                                            <option value="" selected="selected">Selecciona la sección</option>
                                                                            <option value="1">Sala A</option>
                                                                            <option value="2">Sala B</option>
                                                                            <option value="3">Sala C</option>
                                                                            <option value="4">Sala D</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Turno</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <div
                                                                        class="input-group input-group-solid input-group-lg">
                                                                        <select class="custom-select form-control" name="shift">
                                                                            <option value="" selected="selected">Selecciona el turno</option>
                                                                            <option value="1">Doble escolaridad</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                        </div>
                                                        <!--end::Wizard Step 3-->



                                                        <!--begin::Wizard Step 4-->
                                                        <div class="my-5 step" data-wizard-type="step-content">
                                                            <h5 class="mb-10 font-weight-bold text-dark">Afecciones alimentarias</h5>
                                                            <div class="checkbox-list">
                                                                @foreach($healthConditions as $healthCondition)
                                                                <label class="checkbox checkbox-square">
                                                                    <input type="checkbox" name="healthConditions[]" value="{{ $healthCondition->id }}" />
                                                                    <span></span>{{ $healthCondition->name }}
                                                                </label>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <!--end::Wizard Step 4-->
                                                        


                                                        <!--begin::Wizard Actions-->
                                                        <div class="d-flex justify-content-between border-top pt-10 mt-15">
                                                            <div class="mr-2">
                                                                <button type="button" id="prev-step"
                                                                    class="btn btn-light-primary font-weight-bolder px-9 py-4"
                                                                    data-wizard-type="action-prev">Anterior</button>
                                                            </div>
                                                            <div>
                                                                <button type="button"
                                                                    class="btn btn-success font-weight-bolder px-9 py-4"
                                                                    data-wizard-type="action-submit">Enviar</button>
                                                                <button type="button" id="next-step"
                                                                    class="btn btn-primary font-weight-bolder px-9 py-4"
                                                                    data-wizard-type="action-next">Siguiente</button>
                                                            </div>
                                                        </div>
                                                        <!--end::Wizard Actions-->
                                                    </div>
                                                </div>
                                            </form>
                                            <!--end::Wizard Form-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Wizard-->
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/pages/custom/user/add-user.js') }}"></script>
@endsection
