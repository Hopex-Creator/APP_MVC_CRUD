
<?php
                    include "modelo/conexion.php";


$id=$_GET["id"];

$sql=$conexion->query(" select * from producto where id=$id ");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Adm Empresa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/d11e1e54b1.js" crossorigin="anonymous"></script>


    <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap');
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body {
        background-color: #e5e5f7;
        opacity: 0.8;
        background-image: radial-gradient(#dc45f7 0.5px, #B0E0E6 0.5px);
        background-size: 10px 10px;
    }
    .form {
        background-color: #fff;
        width: 100%;
        max-width: 400px;
        padding: 3em 3em;
        border-radius: 10px;
        box-shadow: 0 5px 10px -5px rgb(0 0 0 /30%);
        text-align: center;
        margin: 1em; /* Para centrar subir bajar etc..*/
    }
    .form__title {
        font-size: 2rem;
        margin-bottom: .5em;
    }
    .form__paragraph {
        font-weight: 300;
    }
    .form__link {
        font-weight: 400;
        color: #000;
    }
    .form__container {
        margin-top: 3em;
        display: grid;
        gap: 2.5em;
        
    }
    .form__group {
        position: relative;
        --color: #5757577e;
    }
    .form__input {
        width: 100%;
        background: none;
        color: #706c6c;
        font-size: 1rem;
        padding: .6em .3em;
        border: none;
        outline: none;
        border-bottom: 1px solid var(--color);
        font-family: 'Roboto', sans-serif;
    }
    .form__input:not(:placeholder-shown) {
        color: #4d4646;
    }
    .form__input:focus + .form__label,
    .form__input:not(:placeholder-shown) + .form__label {
        transform: translateY(-12px) scale(.7);
        transform-origin: left top;
        color: #3866f2;
    }
    .form__label {
        color: var(--color);
        cursor: pointer;
        position: absolute;
        top: 0;
        left: 5px;
        transform: translateY(10px);
        transition: transform .5s, color .3s;
    }
    .form__submit {
        background: #0d6efd;
        color: #fff;
        font-family: 'Roboto', sans-serif;
        font-weight: 300;
        font-size: 1rem;
        padding: .8em 0;
        border: none;
        border-radius: .5em;
    }
    .form__line {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 1px;
        background-color: #3866f2;
        transform: scale(0);
        transform: left bottom;
        transition: transform .4s;
    }
    .form__input:focus ~ .form__line,
    .form__input:not(:placeholder-shown) ~ .form__line {
        transform: scale(1);
    }
    @media (max-width: 245px) {
        .form__title {
            font-size: 1.8rem;
        }
    }


    .contenedor{
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem;
    }
    .izquierda {
        width: 50%;
        float: left;
    }
    .derecha{
        width: 50%;
        float: right;
        margin: 1rem;
    }
    .custom-table {
        border-collapse: separate;
        border-spacing: 0;
        border-radius: 10px;
        overflow: hidden;
        width: 50%;
        max-width: 800px;
        box-shadow: 0 5px 10px -5px rgb(0 0 0 /30%);
        text-align: center;
    }
    .custom-table th,
    .custom-table td {
      padding: 8px 12px;
    }




</style>



</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <a class="navbar-brand" href="index.php">Administrar <strong>Productos</strong></a>
    <ul class="navbar-nav ml-auto">
            <form class="form-inline my-2 my-lg-0">
                
                
            </form>
        </ul>

</nav>


    <div class="contenedor">
        
        <div  class="form izquierda">
            
        <form method="POST">
                <h2 class="form__title">Modificar Producto</h2>
                <input type="hidden"name="id" value="<?= $_GET["id"] ?>">

                <?php include "controlador/modificar.php"; ?>
                <div class="form__container">

                <?php
                    
                    while ($datos=$sql->fetch_object()) { ?>
                        
                        <div class="form__group">
                            <input type="text" id="nombre" class="form__input" placeholder=" " name="nombre" value="<?= $datos->nombre ?> ">
                            <label for="nombre" class="form__label">Nombre de producto:</label>
                            <span class="form__line"></span>
                        </div>
                        

                        <div class="form__group">
                        <input type="text" id="categoria" class="form__input" placeholder=" " name="categoria" value="<?= $datos->categoria ?> ">
                            <label for="categoria" class="form__label">Categoria:</label>
                            <span class="form__line"></span>
                        </div>
                        <div class="form__group">
                            <input type="text" id="stock" class="form__input" placeholder=" " name="stock" value="<?= $datos->stock ?> ">
                            <label for="stock" class="form__label">Stock:</label>
                            <span class="form__line"></span>
                        </div>
                        <div class="form__group">
                            <input type="text" id="precio" pattern="[0-9]+(\.[0-9]+)?" class="form__input" placeholder=" " name="precio" value="<?= $datos->precio ?> ">
                            <label for="precio" class="form__label">Precio:</label>
                            <span class="form__line"></span>
                        </div>

                    
                    <?php }
                    include "controlador/modificar.php";
                ?>

                
                
                <button type="submit" class="form__submit btn btn-primary" name="btnregistrar" value="ok">Modificar producto</button>
                </div>
                
            </form>
            
        </div>
        
    <table class="table custom-table table-light table-striped derecha">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Producto</th>
        <th scope="col">Categoria</th>
        <th scope="col">Stock</th>
        <th scope="col">Precio</th>
        <th scope="col" colspan="2"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "modelo/conexion.php";
        $sql=$conexion->query(" select * from producto ");
        while($datos=$sql->fetch_object()){ ?>

        <tr>
            <th scope="row"><?= $datos->id ?></th>
            <td><?= $datos->nombre ?></td>
            <td><?= $datos->categoria ?></td>
            <td><?= $datos->stock ?></td>
            <td><?= $datos->precio ?></td>
            <td>
                
            </td>
            <td>
                
            </td>
        </tr>

        <?php
        }
        ?>
        
        
        
    </tbody>
    </table>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>


    </script>



</body>
</html>