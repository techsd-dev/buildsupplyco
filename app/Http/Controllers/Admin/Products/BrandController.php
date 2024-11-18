<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $brands = Brand::orderBy('id', 'DESC')->paginate(10);
        return view('backend.admin.brands.index', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:brands,name',
        ]);

        $brands = Brand::create([
            'name' => $request->name,
            'status' => $request->status,
        ]);

        return response()->json(['success' => 'brands added successfully!', 'brands' => $brands]);
    }

    public function update(Request $request, $id)
    {
        $brands = Brand::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:brands,name,' . $id,
        ]);

        $brands->update([
            'name' => $request->name,
            'status' => $request->status,
        ]);

        return response()->json(['success' => 'Brands updated successfully!', 'brands' => $brands]);
    }

    public function destroy(Request $request)
    {
        if ($request->has('id')) {  
            // Single deletion
            $brands = Brand::findOrFail($request->id);
            $brands->delete();

            return response()->json(['success' => true, 'message' => 'Brand deleted successfully.']);
        } elseif ($request->has('ids')) {
            // Bulk deletion
            Brand::destroy($request->ids);

            return response()->json(['success' => true, 'message' => 'Brands deleted successfully.']);
        }

        return response()->json(['success' => false, 'message' => 'Invalid request.']);
    }

    public function brandsFilter(Request $request)
    {
        $query = $request->get('query');

        // Perform search operation
        $brands = Brand::where('name', 'LIKE', "%{$query}%")
            ->orWhere('status', 'LIKE', "%{$query}%")
            ->get();

        // Return brands as JSON
        return response()->json([
            'success' => true,
            'brands' => $brands
        ]);
    }
}
