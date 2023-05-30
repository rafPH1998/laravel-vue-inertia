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
            'customers' => Customer::paginate()
        ]);
    }

    public function create()
    {
        return Inertia::render('Create');
    }
}
