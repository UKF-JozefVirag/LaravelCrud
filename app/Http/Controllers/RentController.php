<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Rent;
use App\Models\Sportsground;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class RentController extends Controller
{

    public function index()
    {
        $rents = DB::table('rents')
            ->join('customers', 'rents.Customer_idCustomer', '=', 'customers.id')
            ->join('sportsgrounds', 'rents.Sportsground_idSportsground', '=', 'sportsgrounds.id')
            ->select('rents.*', 'sportsgrounds.title as sTitle',
                DB::RAW('CONCAT(customers.first_name, " ", customers.last_name) as full_name'))
            ->orderBy('rents.id')
            ->paginate(5);
        return view('rents.index', compact('rents'));
//        return DataTables::of(view('rents.index', compact('rents')))->make();
    }


    public function create()
    {
        $rent = new Rent();
        $customers = Customer::all();
        $sportsgrounds = Sportsground::all();

        return view('rents.create_edit', compact('rent', 'customers', 'sportsgrounds'));
    }

    public function store(Request $request)
    {
        Rent::create($request->all());
        return redirect()->route('rents.index');
    }

    public function show(Rent $rent)
    {
        //
    }

    public function edit(Rent $rent)
    {
        $sportsgrounds = Sportsground::all();
        $customers = Customer::all();

        return view('rents.create_edit', compact('sportsgrounds', 'customers', 'rent'));
        return redirect()->route('rents.index');
    }

    public function update(Request $request, Rent $rent)
    {
        $rent->update($request->all());
        return redirect()->route('rents.index');
    }

    public function destroy(Rent $rent)
    {
        $rent->delete();
        return redirect()->route('rents.index');
    }
}
