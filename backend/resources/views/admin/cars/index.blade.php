@extends('admin.layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-navy">Gestion de la Flotte</h2>
        <a href="{{ route('admin.cars.create') }}" class="btn btn-success fw-bold">+ Ajouter une Voiture</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

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
                    @foreach ($cars as $car)
                        <tr>
                            <td>
                                @if ($car->image)
                                    <img src="{{ asset('storage/' . $car->image) }}" width="60" class="rounded">
                                @else
                                    <span class="text-muted">No image</span>
                                @endif
                            </td>
                            <td class="fw-bold">{{ $car->marque }}</td>
                            <td>{{ $car->prix }} DH</td>
                            <td>
                                <span class="badge bg-warning text-white">
                                    {{ $car->etat }}
                                </span>
                            </td>
                            <td>
                                @if ($car->statut_actuel == 'Disponible')
                                    <span class="badge bg-success">Disponible</span>
                                @elseif($car->statut_actuel == 'Louée')
                                    <span class="badge bg-danger">Louée</span>
                                @else
                                    <span class="badge bg-danger">{{ $car->statut_actuel }}</span>
                                @endif

                                @if ($car->statut_actuel == 'Louée' && $car->date_debut_location && $car->date_fin_location)
                                    <br>
                                    <small class="text-muted">
                                        Jusqu'au: {{ \Carbon\Carbon::parse($car->date_fin_location)->format('d/m/Y') }}
                                    </small>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('admin.cars.edit', $car->id) }}"
                                        class="btn btn-sm btn-outline-primary">Modifier</a>
                                    <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST"
                                        onsubmit="return confirm('Tu es sûr que tu veux supprimer cette voiture?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
