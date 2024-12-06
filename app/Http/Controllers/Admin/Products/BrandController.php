<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    public function storeOrUpdate(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|string|in:active,inactive',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ], [
            'name.required' => 'The Brand name is required.',
            'status.required' => 'The Brand status is required.',
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'Only jpg, png, and jpeg images are allowed.',
            'image.max' => 'The image size must not exceed 2MB.',
        ]);

        if ($request->id) {
            $brand = Brand::find($request->id);
            if (!$brand) {
                return response()->json(['error' => 'Brand not found'], 404);
            }
        } else {
            $brand = new Brand();
        }
        $slug = Str::slug($request->name, '-');
        $brand->name = $request->name;
        $brand->slug = $slug;
        $brand->status = $request->status;

        if ($request->hasFile('image')) {
            if ($request->id && $brand->image) {
                $oldImagePath = public_path('uploads/brands/' . $brand->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $prdImage = $request->file('image');
            $imageName = time() . '_' . $prdImage->getClientOriginalName();
            $prdImage->move(public_path('uploads/brands'), $imageName);
            $brand->image = $imageName;
        }
        $brand->save();
        return response()->json(['success' => 'Brand saved successfully!']);
    }


    public function destroy(Request $request)
    {
        if ($request->has('id')) {
            $brand = Brand::findOrFail($request->id);
            if ($brand->images) {
                $oldImagePath = public_path('uploads/brands/' . $brand->images);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $brand->delete();
            return response()->json(['success' => true, 'message' => 'Brand deleted successfully.']);
        }
        return response()->json(['success' => false, 'message' => 'Invalid request.']);
    }


    public function brandsFilter(Request $request)
    {
        $query = $request->get('query');
        $brands = Brand::where('name', 'LIKE', "%{$query}%")
            ->orWhere('status', 'LIKE', "%{$query}%")
            ->get();
        return response()->json([
            'success' => true,
            'categories' => $brands
        ]);
    }
}
