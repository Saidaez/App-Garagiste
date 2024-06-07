<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class VehicleController extends Controller
{
    /**
     * Display a listing of the vehicles.
     *
     * @return \Illuminate\View\View
     */
   public function index()
{
    $vehicles = Vehicle::paginate(10);
    return view('admin.vehicles.listVehicles', compact('vehicles'));
}

    /**
     * Show the form for creating a new vehicle.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.vehicles.createVehicle');
    }

    /**
     * Store a newly created vehicle in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'fuelType' => 'required|string|max:255',
            'registration' => 'required|string|max:255',
            'photos' => 'nullable',
            'clientID' => 'required|exists:clients,id',
        ]);

        Vehicle::create($validatedData);

        return redirect()->route('admin.vehicles.listVehicles')->with('success', 'Vehicle created successfully.');
    }

    /**
     * Show the form for editing the specified vehicle.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\View\View
     */
    public function showEdit(Vehicle $vehicle)
    {
        return view('admin.vehicles.editVehicle', compact('vehicle'));
    }

    /**
     * Update the specified vehicle in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Request $request, Vehicle $vehicle)
    {
        $validatedData = $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'fuelType' => 'required|string|max:255',
            'registration' => 'required|string|max:255',
            'photos' => 'nullable',
            'clientID' => 'required|exists:clients,id',
        ]);

        $vehicle->update($validatedData);

        return redirect()->route('admin.vehicles.listVehicles')->with('success', 'Vehicle updated successfully.');
    }

    /**
     * Remove the specified vehicle from storage.
     *
     * @param  int  $vehicleId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($vehicleId)
    {
        $vehicle = Vehicle::findOrFail($vehicleId);
        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted successfully');
    }

    /**
     * Show the modal for removing a vehicle.
     *
     * @param int $vehicleId
     * @return \Illuminate\View\View
     */
    public function showDelete($vehicleId)
    {
        return view('admin.modals.deleteVehicle', compact('vehicleId'));
    }

    /**
     * Search for vehicles based on their make, model, fuel type or registration.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $query = $request->input('query');
        $vehicles = Vehicle::where('make', 'like', "%$query%")
            ->orWhere('model', 'like', "%$query%")
            ->orWhere('fuelType', 'like', "%$query%")
            ->orWhere('registration', 'like', "%$query%")
            ->paginate(10);
    
        $output = $vehicles->isEmpty()
            ? '<tr><td align="center" colspan="6">No Data Found</td></tr>'
            : view('admin.vehicles.partials.vehicleTable', compact('vehicles'))->render();
    
        return response()->json(['html' => $output, 'pagination' => (string) $vehicles->links()]);
    }
}
