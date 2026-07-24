@extends('admin.layout')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border-0">
                <div class="card-header bg-dark text-white py-3">
                    <h5 class="mb-0"><i class="bi bi-plus-circle me-2"></i>Ajouter une Nouvelle Marque</h5>
                </div>
                <div class="card-body p-4">
                    
                    <form action="{{ route('admin.marques.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="form-label fw-bold">Nom de la Marque</label>
                            <input type="text" name="name" id="name" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   placeholder="Ex: Porsche, Range Rover..." 
                                   value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="image" class="form-label fw-bold">Logo de la Marque (PNG recommandé)</label>
                            <input type="file" name="image" id="imageInput" 
                                   class="form-control @error('image') is-invalid @enderror" 
                                   accept="image/*" required onchange="previewImage(event)">
                            <div class="form-text text-muted small">Format accepté: JPG, PNG, JPG (Max 2MB).</div>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4 text-center">
                            <div id="preview-container" class="p-3 border rounded d-none" style="background-color: #f8f9fa;">
                                <p class="small text-muted mb-2">Aperçu du logo :</p>
                                <img id="imagePreview" src="#" alt="Aperçu" style="max-height: 100px; width: auto;">
                            </div>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('admin.marques.index') }}" class="btn btn-outline-secondary px-4">
                                Annuler
                            </a>
                            <button type="submit" class="btn btn-orange px-5 text-white" style="background-color: #ff4d00; border: none;">
                                <i class="bi bi-check-lg me-2"></i>Enregistrer la Marque
                            </button>
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
        const previewContainer = document.getElementById('preview-container');
        const previewImage = document.getElementById('imagePreview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.classList.remove('d-none');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection