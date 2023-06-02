<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Inertia\Inertia;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return Inertia::render('Index', [
            'customers' => Customer::paginate(8)
        ]);
    }

    public function create()
    {
        return Inertia::render('Create');
    }

    public function store(CustomerRequest $request)
    {
        Customer::query()->create($request->validated());

        return redirect()->route('users.index')
            ->with('success', 'Usuário criado com sucesso!');
    }

    public function edit(Customer $customer)
    {
        return Inertia::render('Edit', ['customer' => $customer]);
    }

    public function update(Customer $customer, CustomerRequest $request)
    {
        $data = $request->only(['name', 'email']);

        try {

            $customer->update($data);
            return redirect()->route('users.edit', $customer->id);
            
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('users.index');
    }

    
}
