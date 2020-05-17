@extends('producto')

@section('something')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center">
            <h1><i class="fas fa-question-circle"></i> Preguntas frecuentes</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        @if(!empty($faq))
                   <div class="card">
                <div class="card-body text-center">
                  :/ Sin Contenido!!, ingrese mas tarde.
                </div>
              </div>
         @endif
         @foreach($faq as $f)
         <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                    <p class="text-info"> <i class="fas fa-tags"></i> {{$f->tags}}</p>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead text-center"><b>{{$f->titulo}}</b></h2>
                      <p class="text-muted text-sm"><b>Contenido: </b> {{$f->corto}} </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="text-secondary"><span class="fa-li"><i class="far fa-lightbulb"></i></span>{{$f->tipo}}</li>
                        <li class="text-secondary"><span class="fa-li"><i class="fas fa-user-ninja"></i></span>{{$f->user_id}}</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="{{$f->urlimagen}}" alt="" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                    <div class="content">
                    <div class="text-right">
                    <a href="#" class="btn btn-sm btn-primary">
                      <i class="fas fa-eye"></i> Ver FAQ
                    </a>
                  </div>
                    </div>
                </div>  
              </div>
            </div>
            </div>
            
        </div>
      </div>
         @endforeach
    </section>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection