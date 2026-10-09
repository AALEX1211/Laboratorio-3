<?php
// Detectar el nombre del archivo actual para actualizar el Breadcrumb
$paginaActual = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Metadatos de Requisitos Técnicos -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Admisión de la UTP</title>
    <meta name="description" content="Sistema de admisión de datos para aspirantes">
    <meta name="author" content="Universidad Tecnológica de Panamá / Estudiante">
    <meta name="robots" content="noindex, nofollow">
    <meta name="theme-color" content="#212529">

    <!-- Bootstrap v5.3.3 CSS & Iconos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

    <header>
        <!-- Navbar Principal -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand fw-bold" href="index.php">
                    <i class="bi bi-mortarboard-fill text-primary me-2"></i>PortalU
                </a>
            </div>
        </nav>

        <!-- Breadcrumbs Dinámicos -->
        <div class="bg-white border-bottom py-2">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 small">
                        <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Inicio</a></li>
                        <?php if ($paginaActual == 'procesar.php'): ?>
                            <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Registro</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Procesando Datos</li>
                        <?php else: ?>
                            <li class="breadcrumb-item active" aria-current="page">Registro de Aspirante</li>
                        <?php endif; ?>
                    </ol>
                </nav>
            </div>
        </div>
    </header>