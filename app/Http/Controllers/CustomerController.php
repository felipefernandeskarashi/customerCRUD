<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Customer;

class CustomerController extends Controller
{
    

    public function index(){

    	$customers = Customer::all();

    	return view('customer.index')->with('customers', $customers);
    }

    public function create(){

    	$customer = new Customer();

    	return view('customer.create')->with('customer', $customer);
    }

    public function store(){

    	Customer::create($this->validateData());

    	return redirect('/customers');
    }

    public function show(Customer $customer){
    	
    	//$customer = \App\Customer::findOrFail($id);

    	return view('customer.show')->with('customer', $customer);
    }

    public function edit(Customer $customer){

    	return view('customer.edit')->with('customer', $customer);
    }

    public function update(Customer $customer){

	 	$customer->update($this->validateData());

    	return redirect('/customers');
    }

    public function destroy(Customer $customer){

    	$customer->delete();

    	return redirect('/customers');
    }

    protected function validateData(){

    	$data = request()->validate([
    		'name' => 'required',
    		'email' => 'required|email'
    	]);

    	return $data;

    }


}
