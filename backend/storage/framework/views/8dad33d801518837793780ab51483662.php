

<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-navy">Gestion de la Flotte</h2>
        <a href="<?php echo e(route('admin.cars.create')); ?>" class="btn btn-success fw-bold">+ Ajouter une Voiture</a>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="bg-light">
                    <tr>
                        <th>Image</th>
                        <th>Marque</th>
                        <th>Prix/Jour</th>
                        <th>État</th>
                        <th>Statut Actuel</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $cars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php if($car->image): ?>
                                    <img src="<?php echo e(asset('storage/' . $car->image)); ?>" width="60" class="rounded">
                                <?php else: ?>
                                    <span class="text-muted">No image</span>
                                <?php endif; ?>
                            </td>
                            <td class="fw-bold"><?php echo e($car->marque); ?></td>
                            <td><?php echo e($car->prix); ?> DH</td>
                            <td>
                                <span class="badge bg-warning text-white">
                                    <?php echo e($car->etat); ?>

                                </span>
                            </td>
                            <td>
                                <?php if($car->statut_actuel == 'Disponible'): ?>
                                    <span class="badge bg-success">Disponible</span>
                                <?php elseif($car->statut_actuel == 'Louée'): ?>
                                    <span class="badge bg-danger">Louée</span>
                                <?php else: ?>
                                    <span class="badge bg-danger"><?php echo e($car->statut_actuel); ?></span>
                                <?php endif; ?>

                                <?php if($car->statut_actuel == 'Louée' && $car->date_debut_location && $car->date_fin_location): ?>
                                    <br>
                                    <small class="text-muted">
                                        Jusqu'au: <?php echo e(\Carbon\Carbon::parse($car->date_fin_location)->format('d/m/Y')); ?>

                                    </small>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="<?php echo e(route('admin.cars.edit', $car->id)); ?>"
                                        class="btn btn-sm btn-outline-primary">Modifier</a>
                                    <form action="<?php echo e(route('admin.cars.destroy', $car->id)); ?>" method="POST"
                                        onsubmit="return confirm('Tu es sûr que tu veux supprimer cette voiture?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button class="btn btn-sm btn-outline-danger">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HASEEB\Desktop\GHINA CARS BE\car-agency-api\resources\views/admin/cars/index.blade.php ENDPATH**/ ?>