<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(10);
        return view('backend.admin.categories.index', compact('categories'));
    }

    public function storeOrUpdate(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|string|in:active,inactive',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ], [
            'name.required' => 'The category name is required.',
            'status.required' => 'The category status is required.',
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'Only jpg, png, and jpeg images are allowed.',
            'image.max' => 'The image size must not exceed 2MB.',
        ]);

        if ($request->id) {
            $category = Category::find($request->id);
            if (!$category) {
                return response()->json(['error' => 'Category not found'], 404);
            }
        } else {
            $category = new Category();
        }
        $slug = Str::slug($request->name, '-');
        $category->name = $request->name;
        $category->slug = $slug;
        $category->status = $request->status;

        if ($request->hasFile('image')) {
            if ($request->id && $category->images) {
                $oldImagePath = public_path('uploads/categories/' . $category->images);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $prdImage = $request->file('image');
            $imageName = time() . '_' . $prdImage->getClientOriginalName();
            $prdImage->move(public_path('uploads/categories'), $imageName);
            $category->images = $imageName;
        }
        $category->save();
        return response()->json(['success' => 'Category saved successfully!']);
    }


    public function destroy(Request $request)
    {
        if ($request->has('id')) {
            $category = Category::findOrFail($request->id);
            if ($category->images) {
                $oldImagePath = public_path('uploads/categories/' . $category->images);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $category->delete();
            return response()->json(['success' => true, 'message' => 'Category deleted successfully.']);
        }
        return response()->json(['success' => false, 'message' => 'Invalid request.']);
    }


    public function categoryFilter(Request $request)
    {
        $query = $request->get('query');
        $categories = Category::where('name', 'LIKE', "%{$query}%")
            ->orWhere('status', 'LIKE', "%{$query}%")
            ->get();
        return response()->json([
            'success' => true,
            'categories' => $categories
        ]);
    }
    

}
