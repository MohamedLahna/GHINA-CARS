@extends('admin.layout')

@section('content')
    <div class="card shadow-sm mx-auto" style="max-width: 800px;">
        <div class="card-header text-white d-flex justify-content-between" style="background-color: #272435">
            <h4 class="mb-0">Modifier : {{ $car->marque }}</h4>
            <span class="badge bg-warning text-dark">ID: #{{ $car->id }}</span>
        </div>
        <div class="card-body">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Oups !</strong> Il y a des problèmes avec votre saisie.<br><br>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('admin.cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Marque</label>
                            <input type="text" name="marque" class="form-control" value="{{ $car->marque }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Prix par jour (DH)</label>
                            <input type="number" name="prix" class="form-control" value="{{ $car->prix }}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="date_debut_location" class="form-label">Date Début Location</label>
                            <input type="date" name="date_debut_location" class="form-control" id="date_debut_location"
                                value="{{ old('date_debut_location', $car->date_debut_location) }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="date_fin_location" class="form-label">Date Fin Location</label>
                            <input type="date" name="date_fin_location" class="form-control" id="date_fin_location"
                                value="{{ old('date_fin_location', $car->date_fin_location) }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">État</label>
                            <select name="etat" class="form-select">
                                <option value="Neuf" {{ $car->etat == 'Neuf' ? 'selected' : '' }}>Neuf</option>
                                <option value="Très bon état" {{ $car->etat == 'Très bon état' ? 'selected' : '' }}>Très bon
                                    état</option>
                                <option value="Bon état" {{ $car->etat == 'Bon état' ? 'selected' : '' }}>Bon état</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Disponibilité</label>
                        <select name="disponibilite" class="form-select">
                            <option value="1" {{ $car->disponibilite ? 'selected' : '' }}>Disponible</option>
                            <option value="0" {{ !$car->disponibilite ? 'selected' : '' }}>Louée / Maintenance
                            </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Changer l'image (Optionnel)</label>
                        @if ($car->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $car->image) }}" width="100" class="rounded border">
                            </div>
                        @endif
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary fw-bold px-4">Mettre à jour</button>
                        <a href="{{ route('admin.cars.index') }}" class="btn btn-secondary">Annuler</a>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    @endsection
