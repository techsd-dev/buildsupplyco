<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['category', 'subCategory', 'brand']);

        // Filter by name
        if ($request->filled('name')) {
            $query->where('prd_name', 'like', '%' . $request->name . '%');
        }

        // Filter by category
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Filter by subcategory
        if ($request->filled('subcategory_id')) {
            $query->where('sub_category_id', $request->subcategory_id);
        }

        // Filter by brand
        if ($request->filled('brand_id')) {
            $query->where('brand_id', $request->brand_id);
        }

        $data['products'] = $query->orderBy('id', 'DESC')->paginate(10);

        // Pass categories, subcategories, and brands for filtering dropdowns
        $data['brands'] = Brand::orderBy('id', 'DESC')->get();
        $data['categories'] = Category::orderBy('id', 'DESC')->get();
        $data['subcategories'] = SubCategory::orderBy('id', 'DESC')->get();

        return view('backend.admin.products.index', $data);
    }


    public function destroy(Request $request)
    {
        if ($request->has('id')) {
            $products = Product::findOrFail($request->id);
            $products->delete();
            return response()->json(['success' => true, 'message' => 'Product deleted successfully.']);
        }
        return response()->json(['success' => false, 'message' => 'Invalid request.']);
    }

    public function create()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        $brands = Brand::orderBy('id', 'DESC')->get();
        return view('backend.admin.products.create', compact('categories', 'brands'));
    }

    public function store(Request $request)
    {
        // Validation rules
        // $request->validate([
        //     'category_id' => 'required|integer',
        //     'sub_category_id' => 'required|integer',
        //     'brand_id' => 'required|integer',
        //     'prd_name' => 'required|string|max:255',
        //     'prd_price' => 'required|numeric',
        //     'prd_discount_price' => 'nullable|numeric',
        //     'qty' => 'required|integer',
        //     'status' => 'required|string',
        //     'prd_description' => 'required|string',
        //     'prd_image' => $request->id ? 'nullable|image|mimes:jpg,jpeg,png|max:2048' : 'required|image|mimes:jpg,jpeg,png|max:2048',
        //     'prd_images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        // ]);

        // Prepare data for update or create
        $data = [
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'brand_id' => $request->brand_id,
            'prd_name' => $request->prd_name,
            'slug' => Str::slug($request->prd_name),
            'prd_price' => $request->prd_price,
            'prd_discount_price' => $request->prd_discount_price,
            'qty' => $request->qty,
            'status' => $request->status,
            'prd_description' => $request->prd_description,
        ];

        // Handle single product image
        if ($request->hasFile('prd_image')) {
            $prdImage = $request->file('prd_image');
            $imageName = time() . '_' . $prdImage->getClientOriginalName();
            $prdImage->move(public_path('uploads/products'), $imageName);
            $data['prd_image'] = $imageName;
        }

        // Handle multiple product images
        $prdImagesArray = [];
        if ($request->hasFile('prd_images')) {
            foreach ($request->file('prd_images') as $prdImageFile) {
                $multiImageName = time() . '_' . $prdImageFile->getClientOriginalName();
                $prdImageFile->move(public_path('uploads/products'), $multiImageName);
                $prdImagesArray[] = $multiImageName;
            }
            $data['prd_images'] = implode(',', $prdImagesArray);
        }

        // Use updateOrCreate to either update or create a product
        $product = Product::updateOrCreate(
            ['id' => $request->product_id], // Condition to check for existing product
            $data // Data to be updated or inserted
        );

        // Redirect with success message
        $message = $request->product_id ? 'Product updated successfully!' : 'Product added successfully!';
        return redirect()->route('products')->with('success', $message);
    }


    public function getSubcategories(Request $request)
    {
        $subcategories = SubCategory::where('category_id', $request->category_id)->get();
        return response()->json([
            'subcategories' => $subcategories
        ]);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view('backend.admin.products.edit', compact('product', 'categories', 'brands'));
    }
}
