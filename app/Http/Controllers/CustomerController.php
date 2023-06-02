<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Inertia\Inertia;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $customers = Customer::when(
            $request->filled('search'), function($q) use ($request) {
                $q->where('name', 'LIKE', "%{$request->search}%");
                $q->orWhere('email', '=', $request->search);
            })->paginate(8);

        return Inertia::render('Index', [
            'customers' => $customers
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
