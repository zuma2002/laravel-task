<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 1. READ - Display the list with Search, Filter, and Sort
    public function index(Request $request)
    {
        // Start the query builder
        $query = Product::query();

        // 1. SEARCHING (First Name, Last Name, or Email)
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('First_Name', 'like', "%{$search}%")
                  ->orWhere('Last_Name', 'like', "%{$search}%")
                  ->orWhere('Email', 'like', "%{$search}%")
                  ->orWhere('Company', 'like', "%{$search}%");
            });
        }

        // 2. FILTERING (by Country)
        if ($request->filled('country')) {
            $query->where('Country', $request->input('country'));
        }

        // 3. SORTING (Dynamic column and direction)
        $sortColumn = $request->get('sort', 'Index');
        $sortDirection = $request->get('direction', 'asc');

        $validColumns = ['Index', 'First_Name', 'Last_Name', 'Company', 'Country'];
        if (in_array($sortColumn, $validColumns)) {
            $query->orderBy($sortColumn, $sortDirection);
        }

        // 4. LISTING (Pagination)
        // appends() ensures parameters stay in the URL when you click "Next Page"
        $products = $query->paginate(20)->appends($request->all());

        // Get unique countries for the filter dropdown
        $countries = Product::distinct()->orderBy('Country')->pluck('Country');

        return view('products.index', compact('products', 'countries'));
    }

    // 2. CREATE - Show form
    public function create()
    {
        return view('products.create');
    }

    // 3. CREATE - Store data
    public function store(Request $request)
    {
        // Basic validation helps prevent empty entries in your 100k database
        $validated = $request->validate([
            'First_Name' => 'required|string|max:255',
            'Last_Name'  => 'required|string|max:255',
            'Email'      => 'required|email',
            'Company'    => 'nullable|string',
            'Country'    => 'required|string',
        ]);

        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Customer added successfully!');
    }

    // 4. UPDATE - Show the edit form
    public function edit($id)
    {
        $product = Product::where('Index', $id)->firstOrFail();
        return view('products.edit', compact('product'));
    }

    // 5. UPDATE - Save the changes
    public function update(Request $request, $id)
    {
        $product = Product::where('Index', $id)->firstOrFail();

        $request->validate([
            'First_Name' => 'required|string|max:255',
            'Last_Name'  => 'required|string|max:255',
            'Email'      => 'required|email',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Record updated!');
    }

    // 6. DELETE - Remove record
    public function destroy($id)
    {
        $product = Product::where('Index', $id)->firstOrFail();
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Customer deleted!');
    }
}
