<!-- views/users/confirmacion.php -->
<div class="container py-5">
    <div class="alert alert-success">
        <?php echo $mensaje ?? 'Compra realizada con éxito'; ?>
    </div>
    <a href="index.php?controller=tienda&action=index" class="btn btn-success">Seguir comprando</a>
</div>
