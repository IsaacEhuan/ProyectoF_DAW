

<?php $__env->startSection('title','inicio'); ?>

<?php $__env->startSection('Contenido-Principal'); ?>



</script>

    <div class="container mt-5 formulario">
        <div class="row">
            <div class="col" id="map">
                <!--Logo-->
            </div>


            <div class="col">
                <h2 class="fw-bolt text-center py-5">Bienvenido</h2>

                <form action="" method="POST" >

                    <?php echo csrf_field(); ?>


                    <div class="mb-4">
                        <label for="email" class="form-label">Correo</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" name="password" id="" class="form-control">
                    </div>
                    
                    <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="alert alert-danger" role="alert">* <?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary" id="enviar">Iniciar Sesión</button>
                    </div>

                    <div class="my-3 text-center">
                        <span>¿No tienes una cuenta? <a href="<?php echo e(route('crearCuenta')); ?>">Registrate</a></span>
                    </div>
                </form>
            </div>
        </div>


    </div>

    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyALjQTgoFokHyZj7fo4EYQExbFmlC2jpJ8&callback=initMap"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.Us', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProyectoF_DAW\baches-app\resources\views/auth/inicioConLog.blade.php ENDPATH**/ ?>