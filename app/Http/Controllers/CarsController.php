<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::latest()->paginate(10);
        return view('bbs.index', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bbs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'company' => 'required|min:1',
            'name' => 'required|min:1',
            'year' => 'required|min:1',
            'price' => 'required|min:1',
            'sort' => 'required|min:1',
            'appearance' => 'required|min:1',
            'image' => 'required'
        ]);

        $input = array_merge($request->all(), ["user_id" => Auth::user()->id]);

        if ($request->hasFile('image')) {
            $fileName = time() . '_' .
                $request->file('image')->getClientOriginalName();
            $request->file('image')
                ->storeAs('public/images', $fileName);
            $input = array_merge($input, ['image' => $fileName]);
        }

        Car::create($input);

        return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::find($id);
        return view('bbs.show', ['car' => $car]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::find($id);
        return view('bbs.edit', ['car' => $car]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'company' => 'required|min:1',
            'name' => 'required|min:1',
            'year' => 'required|min:1',
            'price' => 'required|min:1',
            'sort' => 'required|min:1',
            'appearance' => 'required|min:1',

        ]);

        $car = Car::find($id);

        $car->company = $request->company;
        $car->name = $request->name;
        $car->year = $request->year;
        $car->price = $request->price;
        $car->sort = $request->sort;
        $car->appearance = $request->appearance;
        $car->image = $request->image;
        // $request ?????? ?????? ???????????? ????????? 
        // ??? ???????????? ??? ???????????? ???????????? ???????????????.
        if ($request->image) {
            // ??? ???????????? ??? ???????????? ???????????? ?????? ????????????
            // ????????????, DB??? ???????????? ?????? 
            // ?????? ???????????? ?????????
            // ??? ???????????? ?????? ??????????????? ??????????????? ??????. 
            if ($car->image) {
                Storage::delete('public/images/' . $car->image);
            }
            $fileName = time() . '_' .
                $request->file('image')->getClientOriginalName();
            $car->image = $fileName;
            $request->file('image')->storeAs('public/images', $fileName);
        }

        $car->save();
        return redirect()->route('cars.show', ['id' => $car->id]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $car = Car::find($id);
        if ($car->image) {
            Storage::delete('public/images/' . $car->image);
        }
        $car->delete();
        //???????????? ?????? ???????????? ????????? ???????????????????????? ??????????????? ??????.
        return redirect()->route('cars.index');
    }

    public function deleteImage($id)
    {
        $car = Car::find($id);
        Storage::delete('public/images/' . $car->image);
        $car->image = null;
        $car->save();
        return redirect()->route('cars.edit', ['car' => $car->id]);
    }
}
