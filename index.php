<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.svg" type="image/svg">
    <title>Tasks App</title>

    <!-- Fontawesome -->
    <script src="lib/js/all.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="lib/css/bootstrap.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <!-- Navegación -->
    <nav class="navegacion">
        <div class="contenedor px-1 py-3">
            <!-- Logo -->
            <a href="" class="logo" title="Home">
                <i class="fas fa-address-book text-primary"></i><strong> Tasks </strong>App
            </a>

            <!-- Filtros -->
            <div class="filtros ml-auto">
                <form id="search-form" action="" class="form-inline">
                    <!-- Filtro: ID -->
                    <input type="number" id="search-id" class="form-control mr-2" placeholder="Buscar: Clave">
                    <!-- Filtro: Tarea -->
                    <input type="search" id="search-title" class="form-control mr-2" placeholder="Buscar: Nombre">
                    <!-- Filtro: Descripción -->
                    <input type="search" id="search-description" class="form-control mr-2" placeholder="Buscar: Descripción">
                    <!-- Botón: Reiniciar -->
                    <button type="button" id='button-reload' class="btn btn-primary" title="Reiniciar Filtros">
                        <i id="icon-reload" class="fas fa-redo-alt"></i>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Formulario & Lista Tareas -->
    <main class="main px-1 py-2">
        <!-- Formulario & Contadores -->
        <div class="formulario p-4">
            <!-- Formulario -->
            <form id="tasks-form">
                <!-- Campo: ID -->
                <div hidden class="form-group">
                    <input id="field-id" class="form-control" type="number" placeholder="ID" disabled>
                </div>
                <!-- Campo: Title -->
                <div class="form-group">
                    <input id="field-title" class="form-control" type="text" placeholder="Nombre" autofocus required>
                </div>
                <!-- Campo: Description -->
                <div class="form-group">
                    <textarea id="field-description" class="form-control" placeholder="Descripción" required></textarea>
                </div>
                <!-- Botón: Guardar -->
                <button id="button-save" type="submit" class="boton-guardar btn btn-success btn-lg btn-block text-center" title="Guardar" name="save">
                    <i id="icon-save" class="fas fa-save"></i>
                </button>
            </form>

            <!-- Contadores -->
            <div id="" class="resultados-busqueda p-2 mt-3">
                <div class=""><span class="text-grey">Tareas</span> Encontradas</div>
                <div id="search-results" class="cantidad text-bold"></div>
            </div>
            <div id="" class="tareas-totales p-2 mt-3">
                <div class=""><span class="text-grey">Tareas</span> Totales</div>
                <div id="total-tasks" class="cantidad text-bold"></div>
            </div>
        </div>

        <!-- Lista Tareas -->
        <div class="lista p-4">
            <!-- Encabezados -->
            <div class="encabezados p-3">
                <div class="id">
                    <a id="column-id" href="" class="" title="Ordenar * Clave">
                        #
                    </a>
                </div>
                <div class="name">
                    <a id="column-name" href="" class="" title="Ordenar * Nombre">
                        Nombre
                    </a>
                </div>
                <div class="description">
                    <a id="column-description" href="" class="" title="Ordenar * Descripción">
                        Descripción
                    </a>
                </div>
                <div class="date descendente">
                    <a id="column-date" href="" class="text-green" title="Ordenar * Fecha">
                        Fecha
                    </a>
                </div>
                <div class="actions">
                    <span id="column-actions" class="">
                        Acciones
                    </span>
                </div>
            </div>

            <!-- Tareas-->
            <div id="tasks" class="tareas mt-2"></div>

            <!-- Botón Subir -->
            <a id="button-up" href="#inicio-lista" class="boton-subir" title="Subir">
                <i class="fas fa-chevron-up fa-lg"></i>
            </a>
        </div>
    </main>

    <!-- Popup Eliminar Tarea -->
    <div id="overlay" class="overlay">
        <div id="popup-delete" class="popup-eliminar">
            <div id="head-popup" class="cabecera-popup">
                <a id="close-popup" href="" class="cerrar-popup">
                    <i class="fas fa-times"></i>
                </a>
            </div>
            <div id="body-popup" class="cuerpo-popup">
                <span>¿Eliminar Tarea?</span>
            </div>
            <div id="footer-popup" class="pie-popup">
                <button id="delete-task" class="btn btn-outline-danger mr-2" name="">
                    <i id="delete-task-icon" class="fas fa-trash fa-sm mr-1"></i><span>Eliminar</span>
                </button>
                <button id="cancel-delete-task" class="btn btn-success" name="">
                    Cancelar
                </button>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="js/app.js"></script>

</body>

</html>