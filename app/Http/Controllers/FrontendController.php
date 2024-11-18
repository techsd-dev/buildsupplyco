<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Address;
use App\Models\Banner;
use App\Models\Career;
use App\Models\Category;
use App\Models\Faq;
use App\Models\privacyPolicy;
use App\Models\Product;
use App\Models\ReturnNShipmentPolicy;
use App\Models\Setting;
use App\Models\TermsNCondition;
use App\Models\VulnerabilityDisclosuePolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index()
    {
        $data['banners'] = Banner::orderBy('id', 'ASC')->limit(2)->get();
        $data['subBanners'] = Banner::orderBy('id', 'ASC')->skip(2)->take(4)->get();
        $data['categories'] = Category::orderBy('id', 'DESC')->get();
        $data['products'] = Product::with(['brand', 'category', 'subcategory'])
            ->limit(5)->get();
        $data['products2'] = Product::with(['brand', 'category', 'subcategory'])->get();
        return view('frontend.index', $data);
    }

    public function productList($slug)
    {
        $category = Category::where('slug', $slug)->first();
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found');
        }
        $products = Product::with(['brand', 'category', 'subcategory'])
            ->where('category_id', $category->id)
            ->get();
        return view('frontend.pages.products.list', compact('products', 'category'));
    }
    
    public function productListFilterByBrand($id)
    {
        $products = Product::with(['brand', 'category', 'subcategory'])
            ->where('brand_id', $id)
            ->get();
        return view('frontend.pages.products.list', compact('products'));
    }

    public function productQuickView($id)
    {
        $product = Product::with(['brand', 'category', 'subcategory'])
            ->where('id', $id)
            ->first();

        if ($product) {
            return response()->json([
                'name' => $product->prd_name,
                'image' => asset('public/uploads/products/' . ($product->prd_image ?? 'default.jpg')),
                'price' => number_format($product->prd_discount_price, 2),
                'disc_price' => $product->prd_price ? '$' . number_format($product->prd_price, 2) : '',
                'description' => $product->prd_description,
                'qty' => $product->qty,
                'categories' => $product->category->name,
                'brand' => $product->brand->name,
            ]);
        } else {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }

    public function productDetails($slug)
    {
        $data['product'] = Product::with(['brand', 'category', 'subcategory'])
            ->where('slug', $slug)
            ->first();
        $data['cat'] = Category::orderBy('id', "DESC")->get();
        return view('frontend.pages.products.details', $data);
    }


    public function aboutUs()
    {
        $data = AboutUs::find(1);
        $faqs = Faq::orderBy('id', 'DESC')->get();
        return view('frontend.pages.aboutus', compact('data', 'faqs'));
    }

    public function contactUs()
    {
        return view('frontend.pages.contctus');
    }

    public function faqs()
    {
        $data = Faq::orderBy('id', 'DESC')->get();
        return view('frontend.pages.faqs', compact('data'));
    }

    public function contactUsQueryStore(Request $request)
    {
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['subject'] = $request->subject;
        $data['message'] = $request->message;
        DB::table('contact_us')->insert($data);
        return redirect()->back()->with('success', 'Your query sent successfully, We shortly contact you');
    }

    public function vulnerabilityDisclosurePolicy()
    {
        $data = VulnerabilityDisclosuePolicy::find(1);
        return view('frontend.pages.vulnerabilitydisclosurepolicy', compact('data'));
    }

    public function returnAndShipmentPolicy()
    {
        $data = ReturnNShipmentPolicy::find(1);
        return view('frontend.pages.returnandshipmentpolicy', compact('data'));
    }

    public function privacyPolicy()
    {
        $data = privacyPolicy::find(1);
        return view('frontend.pages.privacypolicy', compact('data'));
    }

    public function termsAndConditions()
    {
        $data = TermsNCondition::find(1);
        return view('frontend.pages.termsncond', compact('data'));
    }

    public function saveLocation(Request $request)
    {
        // Validate incoming data
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        // Create a new address entry
        $address = new Address();
        $address->latitude = $request->latitude;
        $address->longitude = $request->longitude;

        // Save to the database
        if ($address->save()) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false], 500);
        }
    }

    public function careersList(){
        $data = Career::orderBy('id', 'DESC')->get();
        return view('frontend.pages.careers.index', compact('data'));
    }
    
    public function careersDetails($slug){
        $career = Career::where('slug', $slug)->firstOrFail();
        return view('frontend.pages.careers.details', compact('career'));
    }
}
