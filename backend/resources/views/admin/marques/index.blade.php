@extends('admin.layout')

@section('content')
    <div class="container ">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Gestion des Marques</h2>
            <a href="{{ route('admin.marques.create') }}" class="btn btn-success" fw-bold>
                + Ajouter une Marque
            </a>
        </div>
        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table bg-white shadow-sm rounded">
            <thead class="table-dark">
                <tr>
                    <th>Logo</th>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($marques as $marque)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/' . $marque->image) }}" width="60" class="img-thumbnail">
                        </td>
                        <td>{{ $marque->name }}</td>
                        <td>
                            <form action="{{ route('admin.marques.destroy', $marque->id) }}" method="POST"
                                class="d-inline">
                                @csrf @method('DELETE')
                                <a href="{{ route('admin.marques.edit', $marque->id) }}"
                                    class="btn btn-sm btn-outline-primary">Modifier</a>
                                <button class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Tu es sûr que tu veux supprimer cette marque?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
