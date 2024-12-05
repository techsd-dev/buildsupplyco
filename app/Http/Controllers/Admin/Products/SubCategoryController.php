<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $subcategories = SubCategory::with('category')->orderBy('id', 'DESC')->paginate(10);
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('backend.admin.subcategories.index', compact('subcategories', 'categories'));
    }

    // Store or Update SubCategory
    public function storeOrUpdate(Request $request)
    {
        $id = $request->input('id'); // Check if there's an ID passed
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:sub_categories,name,' . $id,
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
            ]);
        }

        // If ID exists, update the subcategory; otherwise, create a new one
        $subCategory = $id ? SubCategory::find($id) : new SubCategory();

        if ($id && !$subCategory) {
            return response()->json([
                'success' => false,
                'message' => 'Sub Category not found!',
            ]);
        }

        $subCategory->name = $request->input('name');
        $subCategory->category_id = $request->input('category_id');
        $subCategory->status = $request->input('status', 'active');
        $subCategory->slug = Str::slug($request->input('name'));
        $subCategory->save();

        $message = $id ? 'Sub Category updated successfully!' : 'Sub Category added successfully!';

        return response()->json([
            'success' => true,
            'message' => $message,
        ]);
    }

    // Delete SubCategory
    public function destroy(Request $request)
    {
        $subCategory = SubCategory::find($request->id);

        if (!$subCategory) {
            return response()->json([
                'success' => false,
                'message' => 'Sub Category not found!',
            ]);
        }

        $subCategory->delete();

        return response()->json([
            'success' => true,
            'message' => 'Sub Category deleted successfully!',
        ]);
    }

    // Search SubCategory
    public function search(Request $request)
    {
        $query = $request->input('query');
        $categories = SubCategory::where('name', 'LIKE', "%{$query}%")
            ->get();

        return response()->json([
            'success' => true,
            'categories' => $categories,
        ]);
    }
}
