<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
   <div class="box">
       <div class="box-header">
           <h3 class="box-title">
               Tus Servicios
           </h3>
       </div>
       <div class="box-body">
           <table class="table table-bordered table-striped" id="tipousuario">
               <thead>
                   <th>N°</th>
                   <th>Usuario</th>
                   <th>Servicio</th>
                   <th>Descripcion</th>
                   <th width="150px">Acciones</th>
               </thead>
               <tbody>
               @foreach($usuariosServicios as $usuariosServicios)
                   <tr>
                       <td>{!! $usuariosServicios->id !!}</td>
                       <td>{!! $usuariosServicios->name !!}</td>
                       <td>{!! $usuariosServicios->nombre !!}</td>
                       <td>{!! $usuariosServicios->descripcion !!}</td>

                       <td>
                           <div class="col-sm-6 border-right">
                               <a class="btn btn-primary" href="{!! route('usuario.servicios.edit', [$usuariosServicios->id]) !!}" role="button" data-toggle="Editar"><i class="glyphicon glyphicon-pencil"></i></a>
                           </div>
                           <div class="col-sm-6 border-right">
                               <a class="btn btn-primary" href="{!! route('usuario.servicios.delete', [$usuariosServicios->id]) !!}" onclick="return confirm('Esta seguro que desea eliminar el Usuario Servicios?')" role="button" data-toggle="Eliminar"><i class="glyphicon glyphicon-remove"></i></a>
                           </div>
                       </td>
                   </tr>
               @endforeach
               </tbody>
           </table>
       </div>
   </div>
</div>

