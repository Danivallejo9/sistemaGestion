<?php if(isset($_SESSION["admin_id"]) && $_SESSION["admin_id"]!=""):?>
    <?php 
    $u=null;
    if($_SESSION["admin_id"]!=""){
    $u = UserData::getById($_SESSION["admin_id"]);
    }?>
    <?php 
    $archivos = DocumentoData::getById($_GET["id_archivo"]);
     ?>
<div class="content-wrapper">
    <section class="content-header">
      <h1><i class="fa fa-file-pdf-o"></i> DETALLE DE <b style="color: blue;"><?php echo strtoupper($archivos->nombre_documento) ; ?></b></h1>
    </section>
    <section class="content">
      <div class="box">
        <div class="box-body">
          <center><iframe src="storage/documentos/<?php echo $archivos->otros; ?>"  width="70%" height="400px"></iframe> </center>
          <center><h2><b><?php echo strtoupper($archivos->nombre_documento) ; ?></b></h2></center>
          <h3>Descripcion:</h3>
                    <p><?php echo $archivos->descripcion ; ?></p>
          <h3>Detalles:</h3>
                    <p>Información relevante del documento con datos actualizados.</p>
                    <ul>
                    <li><b>Folio</b>: <?php echo $archivos->folio ; ?>.</li>
                    <li><b>Emetido a</b>: <?php echo $archivos->responsable ; ?>.</li>
                    <li><b>Actualizado por</b>: <?php if($archivos->usuario_id!=null){echo $archivos->getUsuario()->nombre." ".$archivos->getUsuario()->apellido;}else{ echo ""; }  ?>.</li>
                    <li><b>Nombre del Archivo</b>: <?php echo $archivos->otros ; ?>.</li>
                    <li><b>Fecha Registrado el Documento</b>: <?php echo $archivos->fecha ; ?>.</li>
                    </ul>
          <h3>Estado del Documento:</h3>
                    <p>Condicion en que se encuentra el Documento.</p>
                    <ul>
                    <li><b>publico</b>: <?php if($archivos->publico):?><b style="color: blue;">Si</b><?php else: ?><b style="color: blue;">No</b><?php endif; ?></li>
                    <li><b>activo</b>: <?php if($archivos->activo):?><b style="color: blue;">Si</b><?php else: ?><b style="color: red;">No</b><?php endif; ?></li>
                    <li><b>Perdido</b>: <?php if($archivos->perdido):?><b style="color: blue;">Si</b><?php else: ?><b style="color: red;">No</b><?php endif; ?></li>
                    </ul>
        </div>
      </div>
    </section>
  </div>
  <?php else:?>
    <?php endif;?>