<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
</head>
<body>
    <h1>Editar Usuario</h1>
    <form action="<?php echo e(route('usuarios.update', $user->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div>
            <label for="strNombreUsuario">Nombre de Usuario:</label>
            <input type="text" id="strNombreUsuario" name="strNombreUsuario" value="<?php echo e($user->strNombreUsuario); ?>" required>
        </div>
        <div>
            <label for="idUsuCatEstado">Estado:</label>
            <select id="idUsuCatEstado" name="idUsuCatEstado" required>
                <?php $__currentLoopData = $estados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($estado->id); ?>" <?php echo e($user->idUsuCatEstado == $estado->id ? 'selected' : ''); ?>><?php echo e($estado->strDescripcion); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div>
            <label for="idUsuCatTipoUsuario">Tipo de Usuario:</label>
            <select id="idUsuCatTipoUsuario" name="idUsuCatTipoUsuario" required>
                <?php $__currentLoopData = $tiposUsuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipoUsuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($tipoUsuario->id); ?>" <?php echo e($user->idUsuCatTipoUsuario == $tipoUsuario->id ? 'selected' : ''); ?>><?php echo e($tipoUsuario->strNombre); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <button type="submit">Actualizar Usuario</button>
    </form>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\xampp\Point\resources\views/users/edit.blade.php ENDPATH**/ ?>