<?php

namespace App\Http\Controllers\admin;

use App\Models\Car;
use App\Models\User;
use Brian2694\Toastr\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $customers = User::where('role', 'customer')->latest()->paginate(6);
        return view('admin.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // return view('admin.customers.create',['user'=> User::all()]);
        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'nullable',
            'address' => 'nullable',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

       
        return redirect()->route('customer.index')->with('success','Customer Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $customer = User::findOrFail($id);
        $rentals = $customer->rentals()->paginate(5);
        $car = Car::all();
        return view('admin.customers.show', compact('customer','rentals','car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $customer)
    {
        //
        $customers = User::where('role', 'customer')->latest()->paginate(5);
        return view('admin.customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
        $request->validate( [
            'name' => 'required',
            // 'email' => 'required|email|unique:users,email,'.$id,
            'email' => "required|email|unique:users,email,$id,id",
            'phone' => 'nullable',
            'address' => 'nullable',
        ]);
         

        $customer = User::where('id', $id)->first();

        $customer->update($request->all());

        return redirect()->route('customer.index')->with('success', 'Customer Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $customer)
    {
        //if you history do not delete

        if($customer->rentals()->exists()){
            return redirect()->route('customer.index')->with('error', 'Customer Can Not be Deleted because they have a rental History');
        }
        $customer->delete();
        return redirect()->route('customer.index')->with('success','Customer Deleted Successfully');
     
    }
}
