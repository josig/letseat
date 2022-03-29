@extends('layouts.front')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Row-->
            <div class="row">
                <div class="col-xl-12 text-center mb-10">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('assets/media/logos/logo_letseat.png') }}" class="max-h-100px" alt="" />
                    </a>
                </div>
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row">
                <div class="col-xl-2"></div>
                <div class="col-xl-8">
                    <h1 class="mb-5">TUTORIAL</h1>
                    <h2>Roles</h2>
                    <p>Dentro de la plataforma actuarán diversos perfiles de usuarios.<br/>Los mas importantes son:<br/><b>1) Responsable de cuenta:</b> Personas adultas con la capacidad de realizar pagos y cargar las cuentas con crédito. Puede dar de alta perfiles de alumno.<br/><b>2) Alumno:</b> Puede utilizar el crédito de la cuenta para canjear productos ofrecidos por el comercio. 
                    </p>
                    <h2>Cómo instalar la App en móviles?</h2>
                    <p>Para una mejor experiencia de usuario, se deberá insatlar la APP en el dispositivo móvil. La misma se puede instalar, tanto en dispositivos Android como iOS, aunque cada sistema tiene sus particularidades.<br/>Android sugerirá la instalación con un display al pie de la pantalla indicando la instalación. En iOS se deberá acceder por medio del botón compartir y luego seleccionar el "Guardar en el escritorio".</p>
                    <h2>Cómo instalar la App en PC?</h2>
                    <p>En la barra de direcciones aparecerá un ícono ("Instalar Let's Eat"), haga click y aceptar la instalación.</p>
                    <h2>Cómo crear una cuenta para Responsables?</h2>
                    <p>Para la creación de una cuenta de Responsable, en la pantalla de acceso al sistema debe seguir el link ubicado en la parte inferior del formulario de ingreso de credenciales ("Registrate!").<br/>Una vez que se presente el formulario de registro deberá completar todos los campos presentados con información real y aceptar los términos y condiciones de la plataforma.
                    </p>
                    <h2>Cómo crear una cuenta para Alumnos?</h2>
                    <p>Las cuentas de alumnos solo pueden ser cargadas por un responsable. El mismo, deberá ingresar a la plataforma con las credenciales generadas y crear la cantidad de perfiles de Alumno necesarios, completando todos los campos con la información solicitada.</p>
                </div>
                <div class="col-xl-2"></div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
</div>
@endsection