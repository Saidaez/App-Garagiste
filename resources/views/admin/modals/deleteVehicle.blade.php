<!-- deleteVehicle.blade.php -->
<div id="deleteModal" class="modal" style="display:none;">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <p>Are you sure you want to delete this vehicle?</p>
        <form id="deleteForm" method="POST" action="{{ route('vehicles.destroy', $vehicleId) }}">
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
        form.action = "{{ route('vehicles.destroy', ['vehicle' => '']) }}/" + vehicleId;
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