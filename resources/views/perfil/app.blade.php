  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @include('alerts')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{auth()->user()->name}}</h3>
                @if(auth()->user()->level=='S')
                <p class="text-muted text-center">Super Administrador</p>
                @endif
                @if(auth()->user()->level=='A')
                <p class="text-muted text-center">Administrador</p>
                @endif
                @if(auth()->user()->level=='M')
                <p class="text-muted text-center">Empleado</p>
                @endif
                

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Almacenes a cargo</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Envios Realizados</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Envios Completos</b> <a class="float-right">13,287</a>
                  </li>
                  <li class="list-group-item">
                    <b>Envios Con Reporte</b> <a class="float-right">13,287</a>
                  </li>
                </ul>
                <a class="nav-link btn btn-primary btn-block" href="#settings" data-toggle="tab" onclick="toastr.info('Su contraseña es privada, no se la de a nadie'); toastr.options.progressBar = true;">Editar perfil</a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Acerca de</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Envios</strong>

                <p class="text-muted">
                  15,000
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Ubicacion</strong>

                <p class="text-muted">Ciudad de Mexico</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Productos que ha enviado</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">Llaves</span>
                  <span class="tag tag-success">Candados</span>
                  <span class="tag tag-info">Papel</span>
                  <span class="tag tag-warning">Plastico</span>
                  <span class="tag tag-primary">Mochilas</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Ultimo reporte</strong>

                <p class="text-muted">No llego completos los candados.</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Almacenes</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Envios</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab" onclick="toastr.info('Su contraseña es privada, no se la de a nadie')">Editar perfil</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Shared publicly - 7:30 PM today</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>

                      <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>

                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post clearfix">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Sarah Ross</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Sent you a message - 3 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>

                      <form class="form-horizontal">
                        <div class="input-group input-group-sm mb-0">
                          <input class="form-control form-control-sm" placeholder="Response">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-danger">Send</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Posted 5 photos - 5 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <div class="row mb-3">
                        <div class="col-sm-6">
                          <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                          <div class="row">
                            <div class="col-sm-6">
                              <img class="img-fluid mb-3" src="../../dist/img/photo2.png" alt="Photo">
                              <img class="img-fluid" src="../../dist/img/photo3.jpg" alt="Photo">
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                              <img class="img-fluid mb-3" src="../../dist/img/photo4.jpg" alt="Photo">
                              <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>

                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>Destino</th>
                        <th>Productos</th>
                        <th>Estatus</th>
                        <th>Acciones</th>
                      </tr>
                      </thead>
                      <tbody>
                        
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><span class="badge bg-danger">Completo</span></td>
                        <td>
                          <button type="button" class="btn  btn-outline-success btn-xs col-md-6">Reporte</button>
                          
                        </td>
                      </tr>

                      </tbody>
                    </table>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    
                        
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control text-center" id="inputName" value="{{auth()->user()->name}}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Correo</label>
                        <div class="col-sm-10">
                        <input type="email" class="form-control text-center" id="inputEmail" value="{{auth()->user()->email}}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label"> Contraseña</label>
                        <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputExperience" value="Confirme con su contraseña cualquier cambio"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Vuelva a ingresar</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="inputExperience" ></textarea>
                        </div>
                      </div>
                      <?php
                        if(auth()->user()->level=='S'){
                          $text='Super Administrador';
                                            }
                          if(auth()->user()->level=='A'){
                                                $text='Administrador';
                                            }
                          if(auth()->user()->level=='M'){
                              $text='Empleado';
                          }?>
                      @if(auth()->user()->level!='M')
                      <div class="form-group row">
                      <label for="inputExperience" class="col-sm-2 col-form-label">Nivel de Usuario</label>
                      <div class="col-sm-10">
                      <select class="form-control" id="inputExperience" name="level" id="level">
                      <option value="{{auth()->user()->level}}" selected>Selecciono: {{$text}}</option>
                        <option value="S">Super Administrador</option>
                        <option value="A">Administrador</option>
                        <option value="M">Empleado</option>
                      </select>
                    </div>
                    <!-- /.input group -->
                      </div>
                      @else
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Vuelva a ingresar</label>
                        <div class="col-sm-10">
                        <input type="text" disabled class="form-control" id="inputExperience" value="{{$text}}">
                        </div>
                      </div>
                      @endif
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
  </div>
  <!-- /.content-wrapper -->