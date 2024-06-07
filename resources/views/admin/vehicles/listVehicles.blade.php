@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Vehicles</h1>

    <!-- Search Form -->
    <form method="GET" action="{{ route('vehicles.search') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="Search by make, model, fuel type or registration">
            <button type="submit" class="btn btn-secondary">Search</button>
        </div>
    </form>

    <!-- Vehicles Table -->
    <table class="table w-full border border-gray-300">
        <thead class="tableHead">
            <tr class="bg-gray-800 text-gray-200">
                <th class="px-4 py-2 border-r border-gray-300">#</th>
                <th class="px-4 py-2 border-r border-gray-300">Make</th>
                <th class="px-4 py-2 border-r border-gray-300">Model</th>
                <th class="px-4 py-2 border-r border-gray-300">Fuel Type</th>
                <th class="px-4 py-2 border-r border-gray-300">Registration</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehicles as $vehicle)
                <tr>
                    <td class="px-4 py-2 border-r border-gray-300">{{ $vehicle->id }}</td>
                    <td class="px-4 py-2 border-r border-gray-300">{{ $vehicle->make }}</td>
                    <td class="px-4 py-2 border-r border-gray-300">{{ $vehicle->model }}</td>
                    <td class="px-4 py-2 border-r border-gray-300">{{ $vehicle->fuelType }}</td>
                    <td class="px-4 py-2 border-r border-gray-300">{{ $vehicle->registration }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="btn btn-info text-blue-500">Edit</a>
                        <button onclick="showDeleteModal({{ $vehicle->id }})" class="btn btn-danger text-red-500">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    {{ $vehicles->links() }}
</div>

<!-- Delete Modal -->
<div id="deleteModal" class="modal" style="display:none;">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <p>Are you sure you want to delete this vehicle?</p>
        <form id="deleteForm" method="POST" action="">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>

@section('scripts')
<script>
    function showDeleteModal(vehicleId) {
        var modal = document.getElementById("deleteModal");
        var form = document.getElementById("deleteForm");
        form.action = "/vehicles/" + vehicleId;
        modal.style.display = "block";
    }

    function closeModal() {
        var modal = document.getElementById("deleteModal");
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        var modal = document.getElementById("deleteModal");
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
@endsection
