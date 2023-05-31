<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:2|max:100',    
            'email' => 'required|email|unique:customers,email',    
        ]);

        Customer::create($data);

        return redirect()->route('users.index')
            ->with('success', 'Usuário criado com sucesso!');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('users.index')
            ->with('success', 'Usuário deletado com sucesso!');
    }

    
}
