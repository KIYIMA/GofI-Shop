<form  method="post" action="<?=site_url('añadirPcEscritorio')?>"  enctype="multipart/form-data" class="formulario iniRegis row g-3 h-auto" style="border-radius: 5px; background-color: grey; padding: 1%; margin: auto; margin-top: 5%; margin-bottom: 5%;">
  
  <div class="col-md-12">
    <h3 style="text-align: center;">Añadir computadora de escritorio</h3>
  </div>
  <div class="col-md-6">
    <label for="inputmodelo"  class="form-label">Modelo</label>
    <input type="text" name="modelo" class="form-control" id="inputmodelo">
  </div>
  <div class="col-md-6">
    <label for="inputdescripción" class="form-label">Descripción</label>
    <input name="descripcionPcEscri"  type="text" class="form-control" id="inputdescripción">
  </div>
  <div class="col-md-6">
    <label for="inputcantidad"  class="form-label">Cantidad</label>
    <input name="cantidad" type="text" class="form-control" id="inputcantidad">
  </div>
  <div class="col-md-6">
    <label for="inputprecio"  class="form-label">Precio</label>
    <input name="precio" type="text" class="form-control" id="inputprecio">
  </div>
      <div class="col-12" style="text-align: center;">
        <button type="submit" onclick="registr()" class="btn btn-dark BtnIniRegi">Añadir</button>
        <input type="reset" value="Cancelar" class="btn btn-danger" >
      </div>
</form>