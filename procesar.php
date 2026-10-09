<?php 
include 'includes/header.php'; 

// Garantizar que la solicitud sea por POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$errores = [];

// 1. Recepción y Saneamiento de variables
$nombreClean = htmlspecialchars(strip_tags(trim($_POST['nombre'] ?? '')));
$apellidoClean = htmlspecialchars(strip_tags(trim($_POST['apellido'] ?? '')));
$identificacionClean = htmlspecialchars(strip_tags(trim($_POST['identificacion'] ?? '')));
$fechaNacimientoRaw = $_POST['fecha_nacimiento'] ?? '';
$sexoClean = htmlspecialchars(strip_tags(trim($_POST['sexo'] ?? '')));

// 2. Normalización de Cadenas
$nombreFormateado = ucwords(strtolower($nombreClean));
$apellidoFormateado = ucwords(strtolower($apellidoClean));
$identificacionFormateada = strtoupper($identificacionClean);

// Validar que no existan valores vacíos
if (empty($nombreFormateado) || empty($apellidoFormateado) || empty($identificacionFormateada) || empty($fechaNacimientoRaw) || empty($sexoClean)) {
    $errores[] = "Todos los campos de texto son obligatorios.";
}

// 3. Cálculo estricto de Edad (18 a 70 años)
$edad = 0;
if (!empty($fechaNacimientoRaw)) {
    $fechaNac = new DateTime($fechaNacimientoRaw);
    $hoy = new DateTime();
    $edad = $hoy->diff($fechaNac)->y;

    if ($edad < 18 || $edad > 70) {
        $errores[] = "Acceso denegado: El aspirante debe tener entre 18 y 70 años. Edad actual: {$edad} años.";
    }
}

// 4. Subida y Validación de la Imagen
$fotoRutaDestino = '';
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['foto']['tmp_name'];
    $fileName = $_FILES['foto']['name'];
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    $extensionesValidas = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

    if (in_array($fileExtension, $extensionesValidas)) {
        $directorioDestino = './uploaded_files/';

        if (!is_dir($directorioDestino)) {
            mkdir($directorioDestino, 0755, true);
        }

        // Nombre único para prevenir sobrescritura de archivos
        $nuevoNombreFoto = 'foto_' . uniqid() . '.' . $fileExtension;
        $fotoRutaDestino = $directorioDestino . $nuevoNombreFoto;

        if (!move_uploaded_file($fileTmpPath, $fotoRutaDestino)) {
            $errores[] = "Error al intentar guardar la imagen en el servidor.";
        }
    } else {
        $errores[] = "Formato de imagen no permitido. Solo se aceptan: " . implode(', ', $extensionesValidas);
    }
} else {
    $errores[] = "La fotografía del aspirante es requerida.";
}
?>

<main class="container my-5">
    <section class="row justify-content-center">
        <div class="col-md-8">
            <?php if (!empty($errores)): ?>
                <!-- Despliegue de Alertas de Error -->
                <div class="card shadow-sm border-danger">
                    <div class="card-header bg-danger text-white">
                        <h3 class="h5 mb-0"><i class="bi bi-exclamation-triangle-fill me-2"></i>Errores Detectados</h3>
                    </div>
                    <div class="card-body">
                        <ul class="mb-3 text-danger">
                            <?php foreach ($errores as $error): ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <a href="index.php" class="btn btn-outline-danger">
                            <i class="bi bi-arrow-left me-2"></i>Corregir en el Formulario
                        </a>
                    </div>
                </div>
            <?php else: ?>
                <!-- Confirmación de Datos Procesados -->
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-success text-white py-3">
                        <h3 class="h4 mb-0 text-center fw-bold">
                            <i class="bi bi-check-circle-fill me-2"></i>Aspirante Registrado Correctamente
                        </h3>
                    </div>
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-md-4 text-center mb-3 mb-md-0">
                                <img src="<?php echo htmlspecialchars($fotoRutaDestino); ?>" alt="Fotografía Aspirante" class="img-fluid rounded-3 shadow border" style="max-height: 220px; object-fit: cover;">
                                <p class="text-muted small mt-2">Fotografía Almacenada</p>
                            </div>

                            <div class="col-md-8">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <strong>Nombre Completo:</strong> <?php echo $nombreFormateado . ' ' . $apellidoFormateado; ?>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Identificación:</strong> <?php echo $identificacionFormateada; ?>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Fecha de Nacimiento:</strong> <?php echo date('d/m/Y', strtotime($fechaNacimientoRaw)); ?>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Edad Calculada:</strong> <span class="badge bg-primary fs-6"><?php echo $edad; ?> años</span>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Sexo:</strong> <?php echo $sexoClean; ?>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="text-center mt-4 pt-3 border-top">
                            <a href="index.php" class="btn btn-primary">
                                <i class="bi bi-plus-circle me-2"></i>Registrar Otro Aspirante
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>