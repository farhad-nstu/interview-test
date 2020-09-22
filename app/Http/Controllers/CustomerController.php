<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CustomerController extends Controller
{
    public function index()
    {
        return Customer::orderBy('created_at', 'desc')->get();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $exploded = explode(',', $request->image);

        $decoded = base64_decode($exploded[1]);

        if(Str::contains($exploded[0], 'jpeg')){
            $extension = 'jpg';
        } else {
            $extension = 'png';
        }

        $fileName = Str::random().'.'.$extension;

        $path = public_path().'/'.$fileName;
        
        file_put_contents($path, $decoded);

        $name = $request->name;
        $subName = substr($name, 0, 3);
        $uniq_id = $subName.rand(10,1000);

        $customer = new Customer;
        $customer->name = $request->name;
        $customer->mobile = $request->mobile;
        $customer->email = $request->email;
        $customer->uniq_id = $uniq_id;
        $customer->image = $fileName;
        $customer->save();

        return $customer;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return response()->json($customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        try {
            // Product::destroy($id);
            $customer->destroy();
            return response([], 204);
        } catch(\Exception $e) {
            return response(['Problem Deleting the Customer', 500]);
        }
    }
}
