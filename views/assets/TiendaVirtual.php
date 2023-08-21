<!DOCTYPE html>
<html lang="es">

<head>
    <title>Tienda Virtual</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="css/TiendaVirtual.css">
</head>

<body>

    <!-- SIDEBAR -->
    <div class="Navegador w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="miSidebar">
        <button class="BotonCerrar w3-bar-item w3-button w3-large" onclick="Cerrar_Nav()">Cerrar &times;</button>
        <a href="InicioU.html" class="OpcionNav w3-button w3-bar-item"><br>Inicio</a>
        <a href="TiendaVirtual.php" class="OpcionNav w3-button w3-bar-item"><br>Tienda Virtual</a>
        <a href="Servicios.php" class="OpcionNav w3-button w3-bar-item"><br>Servicios</a>
        <a href="Citas.html" class="OpcionNav w3-button w3-bar-item"><br>Reservacion de Cita</a>
        <a href="Nosotros.html" class="OpcionNav w3-button w3-bar-item"><br>Nosotros</a>
        <a href="Index.html" class="OpcionNav w3-button w3-bar-item"><br>Cerrar Sesión</a>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#A6216A" fill-opacity="1"
            d="M0,160L30,149.3C60,139,120,117,180,144C240,171,300,245,360,256C420,267,480,213,540,208C600,203,660,245,720,250.7C780,256,840,224,900,181.3C960,139,1020,85,1080,101.3C1140,117,1200,203,1260,213.3C1320,224,1380,160,1410,128L1440,96L1440,0L1410,0C1380,0,1320,0,1260,0C1200,0,1140,0,1080,0C1020,0,960,0,900,0C840,0,780,0,720,0C660,0,600,0,540,0C480,0,420,0,360,0C300,0,240,0,180,0C120,0,60,0,30,0L0,0Z">
        </path>
    </svg>
    <div id="main">
        <div class="contenedorNav">
            <button id="AbrirNav" class="BotonNav" onclick="Abrir_Nav()"><i
                    class="fa-solid fa-house fa-beat-fade fa-2x"></i></button>
            <!--CARRITO-->
            <button id="AbrirNavCarro" class="BotonNavCarro" onclick="Abrir_Carrito()">
                <i id="carritoIcono" class="fas fa-shopping-cart"></i>
                <span id="cart-count" class="cart-count">0</span>
            </button>
            <div class="carrito" id="carrito" style="display: none;">
                <h2>Carrito de compras</h2>
                <ul id="cart-items"></ul>
                <p>Total: &#8353;<span id="cart-total">0</span></p>
                <button class="realizar-compra" onclick="realizarCompra()">Realizar Compra</button>
                <button class="cerrar-carrito" onclick="Cerrar_Carrito()">Cerrar</button>
            </div>


        </div>
    </div>

    <!-- PRODUCTOS -->
    <h1 class="titulo">Tienda Virtual Nancy's Salon</h1>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "SC502_2C2023_G2";
    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener productos de la tabla
    $query = "SELECT nombre, precio, ImagenPro, categoria FROM productos";
    $result = mysqli_query($conn, $query);


    // Crear arrays para cada categoría
    $productosCabello = array();
    $productosUñas = array();
    $productosMaquillaje = array();
    $productosCremas = array();
    $productosOtros = array();



    // Clasificar los productos en arrays según su categoría
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $producto = '<div class="producto">';
            $producto .= '<img src="data:image/jpeg;base64,' . base64_encode($row['ImagenPro']) . '" alt="' . $row['nombre'] . '" style="width: 100%;">';
            $producto .= '<h2>' . $row['nombre'] . '</h2>';
            $producto .= '<p>Precio: &#8353;' . $row['precio'] . '</p>';
            $producto .= '<button class="agregarcarrito" onclick="addToCart(\'' . $row['nombre'] . '\', ' . $row['precio'] . ')">Agregar al carrito</button>';
            $producto .= '</div>';

            // Clasificar el producto según su categoría
            switch ($row['categoria']) {
                case 'Cabello':
                    $productosCabello[] = $producto;
                    break;
                case 'Uñas':
                    $productosUñas[] = $producto;
                    break;
                case 'Maquillaje':
                    $productosMaquillaje[] = $producto;
                    break;
                case 'Cremas':
                    $productosCremas[] = $producto;
                    break;
                case 'Otros':
                    $productosOtros[] = $producto;
                    break;
                default:
                    // Categoría desconocida, ignora el producto
                    break;
            }
        }
    }



    // Generar HTML para cada producto
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="producto">';
            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['ImagenPro']) . '" alt="' . $row['nombre'] . '" style="width: 100%;">';
            echo '<h2>' . $row['nombre'] . '</h2>';
            echo '<p>Precio: &#8353;' . $row['precio'] . '</p>';
            echo '<button class="agregarcarrito" onclick="addToCart(\'' . $row['nombre'] . '\', ' . $row['precio'] . ')">Agregar al carrito</button>';
            echo '</div>';
        }
    } else {
        echo "No hay productos disponibles.";
    }
    ?>

    <!-- CABELLO -->
    <h2 class="cabello">Cabello</h2>
    <div class="cabello-productos productos">
        <?php
        foreach ($productosCabello as $producto) {
            echo $producto;
        }
        ?>
    </div>

    <!-- UÑAS -->
    <h2 class="uñas">Uñas</h2>
    <div class="uñas-productos productos">
        <?php
        foreach ($productosUñas as $producto) {
            echo $producto;
        }
        ?>
    </div>

    <!-- MAQUILLAJE -->
    <h2 class="maquillaje">Maquillaje</h2>
    <div class="maquillaje-productos productos">
        <?php
        foreach ($productosMaquillaje as $producto) {
            echo $producto;
        }
        ?>
    </div>

    <!-- CREMAS -->
    <h2 class="cabello">Cremas</h2>
    <div class="cremas-productos productos">
        <?php
        foreach ($productosCremas as $producto) {
            echo $producto;
        }
        ?>
    </div>

    <!-- OTROS -->
    <h2 class="cabello">Otros</h2>
    <div class="otros-productos productos">
        <?php
        foreach ($productosOtros as $producto) {
            echo $producto;
        }
        ?>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#A6216A" fill-opacity="1"
            d="M0,160L30,149.3C60,139,120,117,180,144C240,171,300,245,360,256C420,267,480,213,540,208C600,203,660,245,720,250.7C780,256,840,224,900,181.3C960,139,1020,85,1080,101.3C1140,117,1200,203,1260,213.3C1320,224,1380,160,1410,128L1440,96L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z">
        </path>
    </svg>
    <!-- FOOTER -->
    <footer class="footerNosotros text-light">
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <div class="row mt-3">
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>Nancy's Salon
                        </h6>
                        <p>
                            Salon de belleza con una gran variedad de servicios para brindar. Ademas vendemos productos
                            de alta
                            gama para el cuidado de tu cabello, uñas y piel. <br> ¡Agenda tu cita con nosotros!

                        </p>
                    </div>

                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">
                            Navegar
                        </h6>
                        <p>
                            <a href="InicioU.html" class="link-light">Inicio</a>
                        </p>
                        <p>
                            <a href="Login.html" class="link-light">Login</a>
                        </p>
                        <p>
                            <a href="Servicios.php" class="link-light">Servicios</a>
                        </p>
                        <p>
                            <a href="Citas.html" class="link-light">Reservar Cita</a>
                        </p>
                        <p>
                            <a href="Nosotros.html" class="link-light">Nosotros</a>
                        </p>
                    </div>
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p><i class="fas fa-home me-3"></i> San José, Costa Rica</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>

                            Centrodebellezanancyssalon@gmail.com

                        </p>
                        <p><i class="fas fa-phone me-3"></i> +506 8990-2392</p>
                        <p><i class="fas fa-phone me-3"></i> +506 2229 1726</p>
                    </div>
                </div>
            </div>
        </section>
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2023 Copyright:
            <a class="text-reset fw-bold">Nancy Salon</a>
        </div>
    </footer>


    <script src="js/TiendaVirtual.js"></script>
</body>

</html>