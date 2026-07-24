

<?php $__env->startSection('content'); ?>
    <div class="card shadow-sm mx-auto" style="max-width: 800px;">
        <div class="card-header text-white d-flex justify-content-between" style="background-color: #272435">
            <h4 class="mb-0">Modifier : <?php echo e($car->marque); ?></h4>
            <span class="badge bg-warning text-dark">ID: #<?php echo e($car->id); ?></span>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('admin.cars.update', $car->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo method_field('PUT'); ?>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Marque</label>
                        <input type="text" name="marque" class="form-control" value="<?php echo e($car->marque); ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Prix par jour (DH)</label>
                        <input type="number" name="prix" class="form-control" value="<?php echo e($car->prix); ?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="date_debut_location" class="form-label">Date Début Location</label>
                        <input type="date" name="date_debut_location" class="form-control" id="date_debut_location"
                            value="<?php echo e(old('date_debut_location', $car->date_debut_location)); ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="date_fin_location" class="form-label">Date Fin Location</label>
                        <input type="date" name="date_fin_location" class="form-control" id="date_fin_location"
                            value="<?php echo e(old('date_fin_location', $car->date_fin_location)); ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">État</label>
                        <select name="etat" class="form-select">
                            <option value="Neuf" <?php echo e($car->etat == 'Neuf' ? 'selected' : ''); ?>>Neuf</option>
                            <option value="Très bon état" <?php echo e($car->etat == 'Très bon état' ? 'selected' : ''); ?>>Très bon
                                état</option>
                            <option value="Bon état" <?php echo e($car->etat == 'Bon état' ? 'selected' : ''); ?>>Bon état</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Disponibilité</label>
                        <select name="disponibilite" class="form-select">
                            <option value="1" <?php echo e($car->disponibilite ? 'selected' : ''); ?>>Disponible</option>
                            <option value="0" <?php echo e(!$car->disponibilite ? 'selected' : ''); ?>>Louée / Maintenance
                            </option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Changer l'image (Optionnel)</label>
                    <?php if($car->image): ?>
                        <div class="mb-2">
                            <img src="<?php echo e(asset('storage/' . $car->image)); ?>" width="100" class="rounded border">
                        </div>
                    <?php endif; ?>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary fw-bold px-4">Mettre à jour</button>
                    <a href="<?php echo e(route('admin.cars.index')); ?>" class="btn btn-secondary">Annuler</a>
                </div>
                <?php echo csrf_field(); ?>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HASEEB\Desktop\GHINA CARS\car-agency-api\resources\views/admin/cars/edit.blade.php ENDPATH**/ ?>