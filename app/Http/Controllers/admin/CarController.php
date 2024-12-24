<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarRequest;
use App\Models\Car;
use Brian2694\Toastr\Toastr;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cars = Car::latest()->paginate(5);
        return view('admin.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validation
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'car_type' => 'required',
            'daily_rent_price' => 'required|numeric',
            'availability' => 'required|boolean',
            'image' => 'required|image|max:2048',
        ]);

        # Image Upload
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        // $img_url = $file->move('image/', $filename);
        $img_url = "image/" . $filename;

        //
        $file->move(public_path('image'), $filename);

        // $car = Car::create($request->all());


        //upload image
        // $input = $request->all();
        // if ($image = $request->file('image')) {
        //     $destinationPath = 'image/';
        //     $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $profileImage);
        //     $input['image'] = "$profileImage";
        // }else{
        //     unset($input['image']);
        // }

        // Car::create($input);
        // return redirect()->route('car.index')
        //                 ->with('success','Car created successfully.');

        // car create
        Car::create([
            'name' => $request->name,
            'brand' => $request->brand,
            'model' => $request->model,
            'year' => $request->year,
            'car_type' => $request->car_type,
            'daily_rent_price' => $request->daily_rent_price,
            'availability' => $request->availability,
            'image' => $img_url,

        ]);

        // Toastr::success("Car Created Successfully");

        return redirect()->route('car.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $car = Car::find($id);

        return view('admin.cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $car = Car::findOrFail($id);

        return view('admin.cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validation
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'car_type' => 'required',
            'daily_rent_price' => 'required|numeric',
            'availability' => 'required|boolean',
            'image' => 'nullable|image|max:2048',
        ]);


        $car = Car::where('id', $id)->first();


        if ($request->hasFile('image')) {

            //if file exites 
            if(file_exists($car->image)) {
                unlink($car->image);
            }

            # if you old image delete
            // if ($car->image) {
            //     unlink(public_path($car->image));
            // }

            // # Image Upload
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            // $img_url = $file->move('image/', $filename);
            $img_url = "image/" . $filename;

            $file->move(public_path('image'), $filename);
            $car->image = $img_url;
        }

        # Update Method

        // $car->update([]);

        $car->name = $request->name;
        $car->brand = $request->brand;
        $car->model = $request->model;
        $car->year = $request->year;
        $car->car_type = $request->car_type;
        $car->daily_rent_price = $request->daily_rent_price;
        $car->availability = $request->availability;



        // Car::create([
        //     'name' => $request->name,
        //     'brand' => $request->brand,
        //     'model' => $request->model,
        //     'year' => $request->year,
        //     'car_type' => $request->car_type,
        //     'daily_rent_price' => $request->daily_rent_price,
        //     'availability' => $request->availability,
        //     'image' => $img_url,

        // ]);

        $car->save();
        return redirect()->route('car.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {

        # delete img with data
        unlink($car->image);
        $car->delete();

        return redirect()->back()->with('success','Car Deleted Successfully');
    }
}
