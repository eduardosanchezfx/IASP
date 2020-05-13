<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12 text-center">
          <h1>Editar Usuario</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <form action="{{ route('Lista_Usuarios.update',$usuarios) }}" method="POST">
        @csrf
        @method('PUT')
      <!-- Timelime example  -->
      <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <div class="timeline">
            <!-- timeline time label -->
            <div class="time-label">
              <span class="bg-info">Editar Usuario(Editar los campos a cambiar)</span>
            </div>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <div>
              <i class="fas fa-users-cog bg-red"></i>
              <div class="timeline-item">
                <span class="time"> Paso 1 de 3</span>
                <h3 class="timeline-header"><a class="text-red" href="#">Informacion principal</a></h3>
                @foreach ($u as $user)

                <div class="timeline-body">
                  <div class="row">
                      <div class="col-md-6 form-group">
                        <label>Nombre:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-id-card"></i></span>
                          </div>
                          <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
                        </div>
                        <!-- /.input group -->
                      </div>
                      <!-- /.form-group -->
                      <div class="col-md-6 form-group">
                        <label>Correo</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                          </div>
                          <input type="mail" class="form-control" value="{{$user->email}}" name="mail" id="mail">
                        </div>
                        <!-- /.input group -->
                      </div>
                      <!-- /.form-group -->
                      </div>
                </div>
              </div>
            </div>
            <!-- END timeline item -->
            <!-- timeline item -->
            <div id="e1">
              <i class="fas fa-user-shield bg-warning"></i>
              <div class="timeline-item">
                <span class="time"><i class=""></i> Paso 2 de 3</span>
                <h3 class="timeline-header no-border"><a class="text-warning" href="#">Seguridad (Editar los dos campos si se quiere cambiar contraseña)</a></h3>
                <div class="timeline-body">
                  <div class="row">
                      <div class="col-md-6 form-group">
                        <label>Contraseña:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-key"></i></span>
                          </div>
                           
                        <input type="passsword" class="form-control" value="" name="password" id="password">
                        </div>
                        <!-- /.input group -->
                      </div>
                      <!-- /.form-group -->
                      <div class="col-md-6 form-group">
                        <label>Confirmacion de contraseña</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-key"></i></span>
                          </div>
                          <input type="password" class="form-control" placeholder="">
                        </div>
                        <!-- /.input group -->
                      </div>
                      <!-- /.form-group -->
                      </div>
                </div>
              </div>
              
            </div>
            <!-- END timeline item -->
            <!-- timeline item -->
            <div id="e3">
              <i class="fa fa-check bg-success"></i>
              <div class="timeline-item">
                <span class="time"><i class=""></i> Paso 3 de 3</span>
                <h3 class="timeline-header"><a class="text-green" href="#">Elegir tipo de usuario</a></h3>
                <div class="timeline-body">
                  <div class="row">
                  <div class="col-md-6 form-group">
                    <label></label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-key"></i></span>
                      </div>
                      <select class="custom-select" name="level" id="level">
                        <?php
                        if($user->level=='S'){
                          $text='Super Administrador';
                                            }
                          if($user->level=='A'){
                                                $text='Administrador';
                                            }
                          if($user->level=='M'){
                              $text='Empleado';
                          }?>
                      <option value="{{$user->level}}" selected>Selecciono: {{$text}}</option>
                        <option value="S">Super Administrador</option>
                        <option value="A">Administrador</option>
                        <option value="M">Empleado</option>
                      </select>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form-group -->
                      
                  <div class="alert alert-info alert-dismissible col-md-6">
                    <h5 class="text-center"><i class="icon far fa-address-card"></i> Existen 3 tipos de usuarios:</h5>
                    <li>Super Administrador</li>
                    <li>Administrador</li>
                    <li>Empleado</li>
                  </div>
                  </div>
                    </div>
                <div class="timeline-footer">
                  <button type="submit" onclick="alert('deseas enviar?')">Enviar</button>
                </div>
              </div>
            </div>
          @endforeach
        <!-- /.col -->
          </form>
      </div>
    </div>
    <!-- /.timeline -->
  </form>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->