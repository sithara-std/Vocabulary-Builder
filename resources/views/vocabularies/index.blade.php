@extends('layouts.app')

@section('content')
    <!-- Green background for this section -->
    <div class="vocabulary-section">

    <h1>Vocabulary List</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('vocabularies.create') }}" class="btn btn-outline-primary btn-sm">Add Vocabulary</a>

    
        <table class="table table-sucess table-striped table-hover mt-4">
            <thead>
                <tr>
                    <th>Word</th>
                    <th>Meaning</th>
                    <th>Example</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach($vocabularies as $vocabulary)
                    <tr>
                        <td>{{ $vocabulary->word }}</td>
                        <td>{{ $vocabulary->meaning }}</td>
                        <td>{{ $vocabulary->usage_example }}</td>
                        <td>

                        <div class="d-flex gap-2">
                            <a href="{{ route('vocabularies.edit', $vocabulary->id) }}" class="btn btn-outline-warning">Edit</a>
                            <form action="{{ route('vocabularies.destroy', $vocabulary->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger ml-1">Delete</button>
                            </form>
                        </div>
                        
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
