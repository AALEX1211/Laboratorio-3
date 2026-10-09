<?php include 'includes/header.php'; ?>

<main class="container my-5">
    <section class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-primary text-white py-3">
                    <h2 class="h4 card-title mb-0 text-center fw-bold">
                        <i class="bi bi-person-plus-fill me-2"></i>Formulario de Registro de Aspirantes
                    </h2>
                </div>
                <div class="card-body p-4">
                    <form action="procesar.php" method="POST" enctype="multipart/form-data">
                        
                        <!-- Nombre -->
                        <div class="mb-3">
                            <label for="nombre" class="form-label fw-semibold">Nombre (Requerido):</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej. Sofía" required>
                        </div>

                        <!-- Apellido -->
                        <div class="mb-3">
                            <label for="apellido" class="form-label fw-semibold">Apellido (Requerido):</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ej. Rodríguez" required>
                        </div>

                        <!-- Identificación -->
                        <div class="mb-3">
                            <label for="identificacion" class="form-label fw-semibold">Identificación (Requerido):</label>
                            <input type="text" class="form-control" id="identificacion" name="identificacion" placeholder="Ej. 8-950-1234" required>
                        </div>

                        <!-- Fecha de Nacimiento -->
                        <div class="mb-3">
                            <label for="fecha_nacimiento" class="form-label fw-semibold">Fecha de Nacimiento (Requerido):</label>
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                        </div>

                        <!-- Sexo -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold d-block">Sexo (Requerido):</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexo" id="sexo_hombre" value="Hombre" required>
                                <label class="form-check-label" for="sexo_hombre">Hombre</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexo" id="sexo_mujer" value="Mujer" required>
                                <label class="form-check-label" for="sexo_mujer">Mujer</label>
                            </div>
                        </div>

                        <!-- Fotografía -->
                        <div class="mb-4">
                            <label for="foto" class="form-label fw-semibold">Fotografía del Aspirante (png, jpg, jpeg, gif, webp):</label>
                            <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
                        </div>

                        <!-- Botón Submit -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg fw-semibold">
                                <i class="bi bi-send-fill me-2"></i>Registrar Aspirante
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>