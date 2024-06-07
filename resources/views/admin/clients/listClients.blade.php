@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Clients</h1>

    <!-- Add New Client Button -->
    <div class="mb-4 text-right">
        <a href="{{ route('clients.create') }}" class="btn btn-primary">Add New Client</a>
    </div>

    <!-- Clients Table -->
    @if ($clients->isEmpty())
        <p class="text-center">No clients found.</p>
    @else
        <table class="table w-full border border-gray-300">
            <thead class="tableHead">
                <tr class="bg-gray-800 text-gray-200">
                    <th class="px-4 py-2 border-r border-gray-300">#</th>
                    <th class="px-4 py-2 border-r border-gray-300">First Name</th>
                    <th class="px-4 py-2 border-r border-gray-300">Last Name</th>
                    <th class="px-4 py-2 border-r border-gray-300">Address</th>
                    <th class="px-4 py-2 border-r border-gray-300">Phone Number</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <td class="px-4 py-2 border-r border-gray-300">{{ $client->id }}</td>
                        <td class="px-4 py-2 border-r border-gray-300">{{ $client->firstName }}</td>
                        <td class="px-4 py-2 border-r border-gray-300">{{ $client->lastName }}</td>
                        <td class="px-4 py-2 border-r border-gray-300">{{ $client->address }}</td>
                        <td class="px-4 py-2 border-r border-gray-300">{{ $client->phoneNumber }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('clients.edit', $client) }}" class="btn btn-info text-blue-500">Edit</a>
                            <button onclick="showDeleteModal({{ $client->id }})" class="btn btn-danger text-red-500">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $clients->links() }}
    @endif
</div>

<!-- Delete Modal -->
<div id="deleteModal" class="modal" style="display:none;">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <p>Are you sure you want to delete this client?</p>
        <form id="deleteForm" method="POST" action="">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>

@section('scripts')
<script>
    function showDeleteModal(clientId) {
        var modal = document.getElementById("deleteModal");
        var form = document.getElementById("deleteForm");
        form.action = "/clients/" + clientId;
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
@endsection