@extends('web.partials.master')

@section('title')
    Cuenta - Telepráctica
@endsection

@section('estilos')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@endsection

@section('content')

    <ul class="nav nav-tabs">

        @if (auth()->user()->rol_id == 1)
            <li class="nav-item">
                <a class="nav-link active" href="#">Cuenta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Currículum</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Postulaciones</a>
            </li>

        @elseif (auth()->user()->rol_id == 2)
            <li class="nav-item">
                <a class="nav-link active" href="#">Cuenta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Ofertas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Postulaciones</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Entrevistas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Supervisores</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Estadísticas</a>
            </li>

        @elseif (auth()->user()->rol_id == 3)
            <li class="nav-item">
                <a class="nav-link active" href="#">Cuenta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Carreras</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Estadísticas</a>
            </li>

        @elseif (auth()->user()->rol_id == 4)
            <li class="nav-item">
                <a class="nav-link active" href="#">Cuenta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Ofertas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Postulaciones</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Entrevistas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Supervisores</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Estadísticas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Selección</a>
            </li>

        @elseif (auth()->user()->rol_id == 5)
            <li class="nav-item">
                <a class="nav-link active" href="#">Cuenta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Módulo administrativo</a>
            </li>

        @else
            <li class="nav-item">
                <a class="nav-link active" href="#">Cuenta</a>
            </li>

        @endif
    </ul>

    <section class="content m-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">

                    <!-- About Me Box -->
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h4 class="card-title">Acerca de mí</h4>
                        </div>

                        <div class="text-center mt-3">
                            <img class="profile-user-img img-fluid img-circle" src="/img/user-128x128.png"
                                alt="User profile picture">
                        </div>

                        <h4 class="profile-username text-center">{{ auth()->user()->name }}</h4>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-envelope mr-1"></i> Email</strong>
                            <p class="text-muted">{{ auth()->user()->email }}</p>
                            <hr>

                            <strong><i class="fas fa-user-shield mr-1"></i> Rol</strong>
                            <p class="text-muted">{{ auth()->user()->rol->nombre }}</p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->

                <div class="col-md-8">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Editar</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('user.post-profile') }}" method="POST">
                            @csrf
                            <div class="card-body ml-5 mr-5">
                                <label>R.U.N.</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="run" name="run"
                                        value='{{ auth()->user()->run }}'>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-signature"></span>
                                        </div>
                                    </div>
                                </div>

                                <label>Nombre</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="name" name="name"
                                        value='{{ auth()->user()->name }}'>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>

                                <label>Email</label>
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control" id="email" name="email"
                                        value='{{ auth()->user()->email }}'>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <div class="form-group button float-right">
                                    <button type="submit" class="btn btn-secondary">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
