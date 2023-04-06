@extends('plantilla.layout')

@section('contenido')
    <div class="p-5 text-center bg-light" style="margin-top: 60px;">
        <h1 class="mb-3">Bienvenido (nombre_cliente)</h1>
        <h4 class="mb-3">Esta es tu agenda de tus proximos eventos.</h4>
    </div>


  <div class="container col-7">
  <table class="table table-hover" id="tablaCliente">
  <thead>
    <tr class="text-center">
      <th scope="col">#</th>
      <th scope="col">Evento</th>
      <th scope="col">Fecha</th>
      <th scope="col">Estado</th>
      <th>Imagenes</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr class="text-center">
      <th scope="row">1</th>
      <td>Boda</td>
      <td>30/04/2023</td>
      <td><input class="form-check-input" type="checkbox" value="" checked disabled></td>
      <td data-bs-toggle="modal" data-bs-target="#agregarImagenModal"><i class=" bi bi-images text-primary" style="font-size:20px;"></i></td>
      <td><a class="btn emp_button_plus" data-bs-target="#modalDetallesContratoBoda" data-bs-toggle="modal">Detalles</a></td>
    </tr>
    <tr class="text-center" id="#bautizo">
      <th scope="row">2</th>
      <td>Bautizo</td>
      <td>30/05/2023</td>
      <td><input class="form-check-input" type="checkbox" value="" checked disabled></td>
      <td data-bs-toggle="modal" data-bs-target="#agregarImagenModal"><i class=" bi bi-images text-primary" style="font-size:20px;"></i></td>
      <td><a class="btn emp_button_plus" data-bs-target="#modalDetallesContrato" data-bs-toggle="modal">Detalles</a></td>
    </tr>
    <tr class="text-center">
      <th scope="row">3</th>
      <td>Graduacion</td>
      <td>-</td>
      <td><input class="form-check-input" type="checkbox" value="" disabled></td>
      <td>-</td>
      <td> <a href="{{ route('principal') }}" class="btn emp_button_plus">Modificar</a></td>
    </tr>
  </tbody>
</table>

    </div>

    <!--modales-->
    <div class="modal fade" id="modalDetallesContrato" aria-hidden="true" aria-labelledby="modalDetallesContratoLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body" style="background-image: linear-gradient(rgba(250,250,250,0.5),rgba(250,250,250,0.5)),url(https://cdn.pixabay.com/photo/2020/02/05/13/32/religion-4821236_1280.jpg); background-size:100% 100%;">
        <h1 class="modal-title text-success text-center h3" id="modalDetallesContratoLabel">Bautizo</h1><br><br>
        <dl class="row">
          <p><strong>Fecha programada: </strong>30/04/2023</p>
          <p><strong>Paquete: </strong>Bautizo</p>
          <div class="col-sm-6"><p><strong> Hora inicial: </strong>13:00 pm</p></div>
          <div class="col-sm-6"><p><strong>Hora final: </strong>17:00 pm</p></div>
        
        
          <p><strong>Proposito: </strong> Bautizo de alguien</p>
          <p><strong>Invitados contemplados: </strong> 300</p>
          <div class="col-sm-6"><p><strong>Mobiliario: </strong>Sí</p></div>
          <div class="col-sm-6"><p><strong>Manteleria: </strong>Sí</p></div>
          
          <div class="col-sm-6"><p><strong>Servicio: </strong></p></div>
          <div class="col-sm-6"><p>Servicio_1, Servico_2, Servicio_5, Servicio_8, Aire_acondicionado...</p></div>
          <br>
          <p><strong>Estado de cuenta:</strong></p>
        </dl>
          <p class="text-end h3">$15,500.00/<strong class="text-success">$35,000.00</strong></p><br>
          <div class="text-end">
            <button class="btn btn-warning" data-bs-target="#modalDetallesContrato2" data-bs-toggle="modal">Cancelar Evento</button>
          </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalDetallesContrato2" aria-hidden="true" aria-labelledby="modalDetallesContratoLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
      <h1 class="modal-title fs-5 text-center" id="modalDetallesContratoLabel2"><i class="bi bi-exclamation-octagon-fill text-warning" style="font-size: 30px"></i></h1>
      <h1 class="display-6 text-center">Estimado Cliente</h1>
      <p><em>Le informamos que nuestra politica de devoluciones establace que, el establecimiento se queda con el 25% del costo total del pago para los eventos que ya han sido programados y organizados. <br> Esto se debe a que hemos reservado el tiempo y los recursos necesarios para su evento. Nosotros nos hemos comprometido a cumplir con nuestros servicios según lo acordado.</em></p>
      <p class="text-center"><em>Gracias por su preferencia.</em></p>
      <div class="text-end">
        <button class="btn btn-danger" aria-label="Close" data-bs-toggle="modal" id="#eliminar">Confirmar</button>
      </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modalDetallesContratoBoda" aria-hidden="true" aria-labelledby="modalDetallesContratoBodaLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
<div class="modal-body" style="background-image: linear-gradient(rgba(250,250,250,0.7),rgba(250,250,250,0.7)),url(https://cdn.pixabay.com/photo/2018/05/17/15/23/flower-3408809_1280.jpg); background-size:100% 100%;">
        <h1 class="modal-title text-success text-center h3" id="modalDetallesContratoLabel">Boda</h1><br><br>
        <dl class="row">
          <p><strong>Fecha programada: </strong>30/05/2023</p>
          <p><strong>Paquete: </strong>Boda</p>
          <div class="col-sm-6"><p><strong> Hora inicial: </strong>15:00 pm</p></div>
          <div class="col-sm-6"><p><strong>Hora final: </strong>23:00 pm</p></div>
        
        
          <p><strong>Proposito: </strong> Alguien se Caza</p>
          <p><strong>Invitados contemplados: </strong> 300</p>
          <div class="col-sm-6"><p><strong>Mobiliario: </strong>Sí</p></div>
          <div class="col-sm-6"><p><strong>Manteleria: </strong>Sí</p></div>
          
          <div class="col-sm-6"><p><strong>Servicio: </strong></p></div>
          <div class="col-sm-6"><p>Servicio_1, Servico_2, Servicio_5, Servicio_8, Servicio_9, Servicio_10, Aire_acondicionado, Alberca, Reposteria, Tematica, Musica, Meseros, ...</p></div>
          <br>
          <p><strong>Estado de cuenta:</strong></p>
        </dl>
          <p class="text-end h3"><strong class="text-success">$80,000.00</strong></p>
          <p class="text-end"><em>Completamente Pagado</em></p>
      </div>
    </div>
  </div>
</div>

<!--modal imagen-->
<div class="modal fade" id="agregarImagenModal" tabindex="-1" aria-labelledby="agregarImagenLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!--<div class="modal-header">
        <h1 class="modal-title fs-5" id="agregarImagenLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>-->
      <div class="modal-body text-center" style="background-image: url(https://cdn.pixabay.com/photo/2016/01/09/18/27/camera-1130731_1280.jpg);">
        <div class="card" style="height:400px; background-image: url(https://cdn.pixabay.com/photo/2016/01/09/18/27/camera-1130731_1280.jpg); background-size:100% 100%;">
          <div class="card-body">
          <form action="" method="post" enctype="multipart/form-data">
          <div class="container" style="width=100%; height=100px;">
            <input class="bg-light rounded-5 text-muted h3" type="file" name="archivoImg">
            <button class="btn bg-light rounded-circle"><i class="bi bi-plus-lg"></i></button>
          </div>
        </form>
          </div>
        </div>
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>-->
    </div>
  </div>
</div>

    </div>

   
@endsection