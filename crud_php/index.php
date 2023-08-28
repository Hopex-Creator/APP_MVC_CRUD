<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        background-image: radial-gradient(#dc45f7 0.5px, #333 0.5px);
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
    .search-radius{
        border-radius: 10px;
    }



</style>


<link rel="stylesheet" href="https://bootswatch.com/4/cosmo/bootstrap.min.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <a class="navbar-brand" href="index.php">Administrar <strong>Productos</strong></a>
    <ul class="navbar-nav ml-auto">
            <form class="form-inline my-2 my-lg-0">
                <input type="buscar" id="buscar" class="form-control mr-sm-2" placeholder="No funciona :(">
                <button class="btn btn-success my-2 my-sm-0" type="submit">
                    Buscar
                </button>
            </form>
        </ul>

</nav>



    <div class="contenedor">
        
        <div  class="form izquierda">
            
        <form method="POST">
                <h2 class="form__title">Agregar Producto</h2>

                <?php 
                    include "modelo/conexion.php";
                    include "controlador/eliminar.php";
                    include "controlador/index.php";
                ?>
                <div class="form__container">
                <div class="form__group">
                    <input type="text" id="nombre" class="form__input" placeholder=" " name="nombre">
                    <label for="nombre" class="form__label">Nombre de producto:</label>
                    <span class="form__line"></span>
                </div>
                

                <div class="form__group">
                    <input type="text" id="categoria" class="form__input" placeholder=" " name="categoria">
                    <label for="categoria" class="form__label">Categoria:</label>
                    <span class="form__line"></span>
                </div>
                <div class="form__group">
                    <input type="number" id="stock" class="form__input" placeholder=" " name="stock">
                    <label for="stock" class="form__label">Stock:</label>
                    <span class="form__line"></span>
                </div>
                <div class="form__group">
                    <input type="text" pattern="[0-9]+(\.[0-9]+)?" id="precio" class="form__input" placeholder=" " name="precio">
                    <label for="precio" class="form__label">Precio:</label>
                    <span class="form__line"></span>
                </div>
                
                <input type="submit" class="form__submit" value="Agregar Producto" name="btnInsertar">
                </div>
                <?php
                    include "modelo/conexion.php";
                    include "controlador/index.php";
                ?>
            </form>
            
        </div>
        <div class="card my-4 p-2" id="producto-resultado" style="display: none;">
                    <div class="car-body">
                        <ul id="container"></ul>
                    </div>
                </div>
        <table class="table custom-table table-light table-striped table-sm">
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
                <th><?= $datos->id ?></th>
                <td><?= $datos->nombre ?></td>
                <td><?= $datos->categoria ?></td>
                <td><?= $datos->stock ?></td>
                <td><?= $datos->precio ?></td>
                <td>
                    <a href="editar.php?id=<?= $datos->id ?>" class="btn btn-small bg-primary "><i class="fa-solid fa-pen " style="color: #ffffff;"></i></a>
                    <a onclick="return eliminar()" href="index.php?id=<?= $datos->id ?>" class="btn btn-small bg-primary"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></a>
                </td>
            </tr>
        
            <?php
            
            }
            ?>
            
            
            
        </tbody>
        </table>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>

$(function() {
    console.log("Jquery funciona");

    $('#producto-resultado').hide();

    $('#buscar').keyup(function() {
        if ($('#buscar').val()) {
            let buscar = $('#buscar').val();
            $.ajax({
                url: 'busqueda/buscar.php',
                type: 'POST',
                data: { buscar },
                success: function(response) {
                    let producto = JSON.parse(response);
                    let template = '';

                    tasks.forEach(producto => {
                        template += `<li>
                            ${producto.nombre}
                        </li>`;
                    });

                    $('#container').html(template);
                    $('#producto-resultado').show();
                }
            });
        }
    });

    $('#btn-mostrar-formulario').click(function() {
        $('#registro-producto').show();
        $('#codigo').focus();
    });

    $('#task-form').submit(function(event) {
        event.preventDefault();
        // Aquí puedes agregar el código para enviar los datos del formulario si lo deseas
        $('#task-form')[0].reset();
        $('#registro-producto').hide();
    });
});

    </script>



</body>
</html>