<?php 
$sql="SELECT * FROM usuarios WHERE nombre='".$_SESSION['user']."'";
  $eje=$conexion->query($sql);
  $fil=$eje->fetch_assoc();
  if ($fil['tipo']=='admin') {
    $uno='admin';
  }
  elseif ($fil['tipo']=='user') {
    $uno='user';
  }
?>
	<nav class="navbar navbar-expand-lg navbar-dark bg-danger fixed-top" id="mainNav">
    <a class="navbar-brand" href=
      <?php 
        if ($fil['tipo']=='user') {
          echo "inicio_usuario.php";
        }
        elseif ($fil['tipo']=='admin') {
          echo "inicio.php";
        }
       ?>
    ><span class="badge-warning" style="padding: 5px; border-radius: 8px; color: white;">OQUIMSA</span></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item bg-faded" data-toggle="tooltip" data-placement="right" title="Usuario">
          <a class="nav-link" href="usuario.php">
            <!--<i class="fa fa-fw fa-dashboard"></i>-->
            <img src=
              <?php
                if ($fil['imagen']=="" || $fil['imagen']=='NULL') {
                  echo "images/none.png";
                }
                else{
                  $imag=$fil['imagen'];
                  $imag=substr($imag, 3);
                  echo $imag;
                }
              ?>
             width='30px' height="30px" class="rounded-circle">
            <span class="nav-link-text">&nbsp;&nbsp;<?php echo $_SESSION['user']; ?></span>
          </a>
        </li>
        <div class="divider"></div>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Mercadería">
          <a class="nav-link" href="ingresar_mercaderia.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text"> Insertar Mercadería</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Categorias">
          <a class="nav-link" href="categoria.php">
            <i class="fa fa-list"></i>
            <span class="nav-link-text"> Categorias</span>
          </a>
        </li>
        <?php if ($uno=='admin'): ?>
          
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Empleados">
          <a class="nav-link" href="empleados.php">
            <i class="fa fa-user"></i>
            <span class="nav-link-text"> Empleados</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Usuarios">
          <a class="nav-link" href="usuarios.php">
            <i class="fa fa fa-users"></i>
            <span class="nav-link-text"> Usuarios</span>
          </a>
        </li>


        <?php endif ?>


        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Productos">
          <a class="nav-link" href="productos.php">
            <i class="fa fa-th-large"></i>
            <span class="nav-link-text"> Productos</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Clientes">
          <a class="nav-link" href="clientes.php">
            <i class="fa fa-users"></i>
            <span class="nav-link-text"> Clientes</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Realizar venta">
          <a class="nav-link" href="ventas/ver.php">
            <i class="fa fa-fw fa-cart-arrow-down"></i>
            <span class="nav-link-text"> Realizar Ventas</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        
        <li class="nav-item">
            <a class="nav-link" href="calculadora.php">
            <i class="fa fa-table"></i> Calculadora</a>
        </li>

        <div class="bg-secondary" style="border-radius: 10px;">
        <li class="nav-item">
          <a class="nav-link" href="close.php">
            <i class="fa fa-fw fa-sign-out"></i>SALIR</a>
        </li>
        </div>
      </ul>
    </div>
  </nav>
