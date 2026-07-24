

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border-0">
                <div class="card-header bg-dark text-white py-3">
                    <h5 class="mb-0">Modifier la Marque : <?php echo e($marque->name); ?></h5>
                </div>
                <div class="card-body p-4">
                    
                    <form action="<?php echo e(route('admin.marques.update', $marque->id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?> 

                        <div class="mb-4">
                            <label class="form-label fw-bold">Nom de la Marque</label>
                            <input type="text" name="name" class="form-control" value="<?php echo e($marque->name); ?>" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold d-block">Logo Actuel</label>
                            <img src="<?php echo e(asset('storage/' . $marque->image)); ?>" class="img-thumbnail mb-2" style="max-height: 80px;">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Remplacer le Logo (Optionnel)</label>
                            <input type="file" name="image" id="imageInput" class="form-control" accept="image/*" onchange="previewImage(event)">
                            <small class="text-muted">Laissez vide si vous ne voulez pas changer le logo.</small>
                        </div>

                        <div id="preview-container" class="mb-4 text-center d-none p-3 border rounded bg-light">
                            <p class="small text-muted mb-2">Aperçu du nouveau logo :</p>
                            <img id="imagePreview" src="#" alt="Aperçu" style="max-height: 100px;">
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between">
                            <a href="<?php echo e(route('admin.marques.index')); ?>" class="btn btn-outline-secondary px-4">Retour</a>
                            <button type="submit" class="btn btn-primary px-5">Mettre à jour</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        const input = event.target;
        const container = document.getElementById('preview-container');
        const img = document.getElementById('imagePreview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = (e) => {
                img.src = e.target.result;
                container.classList.remove('d-none');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HASEEB\Desktop\GHINA CARS BE\car-agency-api\resources\views/admin/marques/edit.blade.php ENDPATH**/ ?>