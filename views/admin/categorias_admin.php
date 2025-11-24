<?php
include 'views/header_admin.php';
require_once 'models/categoria.php';

$categoriaModel = new Categoria();
$categorias = $categoriaModel->getAll();
?>

<section class="container py-5">
    <div class="row text-center py-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1 text-success">Administrar Categorías</h1>
            <p>Agrega, edita o elimina categorías de productos.</p>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12 text-end">
            <a href="index.php?controller=categorias&action=crear" class="btn btn-success">Agregar Categoría</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <?php if (!empty($categorias)) : ?>
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categorias as $cat) : ?>
                            <tr>
                                <td><?= htmlspecialchars($cat['id']); ?></td>
                                <td><?= htmlspecialchars($cat['nombre']); ?></td>
                                <td>
                                    <a href="index.php?controller=categorias&action=editar&id=<?= $cat['id']; ?>" class="btn btn-primary btn-sm">Editar</a>
                                    <a href="index.php?controller=categorias&action=eliminar&id=<?= $cat['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta categoría?');">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p class="text-center">No hay categorías registradas.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php include 'views/footer_admin.php'; ?>
