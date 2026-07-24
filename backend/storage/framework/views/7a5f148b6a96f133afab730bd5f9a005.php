

<?php $__env->startSection('content'); ?>
    <div class="card shadow-sm mx-auto" style="max-width: 800px;">
        <div class="card-header text-white" style="background-color: #272435">
            <h4 class="mb-0">Ajouter une nouvelle voiture</h4>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('admin.cars.store')); ?>" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Marque</label>
                        <input type="text" name="marque" class="form-control" placeholder="Ex: Mercedes-Benz" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Prix par jour (DH)</label>
                        <input type="number" name="prix" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="date_debut_location" class="form-label">Date Début Location (Optionnel)</label>
                        <input type="date" name="date_debut_location" class="form-control" id="date_debut_location">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="date_fin_location" class="form-label">Date Fin Location (Optionnel)</label>
                        <input type="date" name="date_fin_location" class="form-control" id="date_fin_location">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">État de la voiture</label>
                        <select name="etat" class="form-select">
                            <option value="Neuf" <?php echo e(isset($car) && $car->etat == 'Neuf' ? 'selected' : ''); ?>>Neuf
                            </option>
                            <option value="Très bon état"
                                <?php echo e(isset($car) && $car->etat == 'Très bon état' ? 'selected' : ''); ?>>Très bon état
                            </option>
                            <option value="Bon état" <?php echo e(isset($car) && $car->etat == 'Bon état' ? 'selected' : ''); ?>>Bon
                                état</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Disponibilité</label>
                        <select name="disponibilite" class="form-select">
                            <option value="1">Disponible</option>
                            <option value="0">Louée / Maintenance</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Image de la voiture</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success fw-bold px-4">Enregistrer</button>
                    <a href="<?php echo e(route('admin.cars.index')); ?>" class="btn btn-secondary">Annuler</a>
                </div>
                <?php echo csrf_field(); ?>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HASEEB\Desktop\GHINA CARS BE\car-agency-api\resources\views/admin/cars/create.blade.php ENDPATH**/ ?>