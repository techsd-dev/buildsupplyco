<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Address;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Career;
use App\Models\Category;
use App\Models\Faq;
use App\Models\privacyPolicy;
use App\Models\Product;
use App\Models\ReturnNShipmentPolicy;
use App\Models\Setting;
use App\Models\SubCategory;
use App\Models\TermsNCondition;
use App\Models\VulnerabilityDisclosuePolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    public function index()
    {
        $data['banners'] = Banner::orderBy('id', 'ASC')->limit(2)->get();
        $data['subBanners'] = Banner::orderBy('id', 'ASC')->skip(2)->take(4)->get();
        $data['brands'] = Brand::orderBy('id', 'ASC')->get();
        $data['categories'] = Category::orderBy('id', 'DESC')->get();
        $data['products'] = Product::with(['brand', 'category', 'subcategory'])
            ->limit(3)->where('status', 1)->get();
        $data['productsByCat'] = Product::with(['brand', 'category', 'subcategory'])
            ->orderBy('id', 'DESC')->where('status', 1)->get();
        $data['products2'] = Product::with(['brand', 'category', 'subcategory'])->where('status', 1)->get();
        return view('frontend.index', $data);
    }

    public function productList($slug)
    {
        // First, check if the slug belongs to a category
        $category = Category::where('slug', $slug)->first();

        if ($category) {
            // If category is found
            $data['category'] = $category;

            // Apply filters for category-based query
            $query = Product::with(['brand', 'category', 'subcategory'])
                ->where('category_id', $category->id);
        } else {
            // If it's not a category, check for subcategory
            $subcategory = Subcategory::where('slug', $slug)->first();

            if ($subcategory) {
                // If subcategory is found
                $data['subcategory'] = $subcategory;

                // Apply filters for subcategory-based query
                $query = Product::with(['brand', 'category', 'subcategory'])
                    ->where('sub_category_id', $subcategory->id);
            } else {
                // If neither category nor subcategory is found, redirect back
                return redirect()->back()->with('error', 'Category or Subcategory not found');
            }
        }

        // Apply price range filter and brand filter to both category and subcategory products
        $minPrice = request('min_price', 0);
        $maxPrice = request('max_price', PHP_INT_MAX);
        $brandIds = request('brands', []);

        if ($minPrice && $maxPrice) {
            $query->whereBetween('prd_price', [$minPrice, $maxPrice]);
        }

        if (!empty($brandIds)) {
            $query->whereIn('brand_id', $brandIds);
        }

        // Get the filtered products
        $data['products'] = $query->get();

        // Fetch additional data for categories, brands, etc.
        $data['productsByCat'] = Product::with(['brand', 'category', 'subcategory'])
            ->orderBy('id', 'DESC')->where('status', 1)->get();
        $data['categories'] = Category::orderBy('id', 'DESC')->get();
        $data['brands'] = Brand::orderBy('id', 'DESC')->get();

        // Return view with filtered products and additional data
        return view('frontend.pages.products.list', $data);
    }


    public function productListFilterByBrand($slug)
    {
        $data['products'] = Product::with(['brand', 'category', 'subcategory'])
            ->where('brand_id', $slug)
            ->get();
        $data['productsByCat'] = Product::with(['brand', 'category', 'subcategory'])
            ->orderBy('id', 'DESC')->where('status', 1)->get();
        $data['categories'] = Category::orderBy('id', 'DESC')->get();
        $data['brands'] = Brand::orderBy('id', 'DESC')->get();
        return view('frontend.pages.products.list', $data);
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
                'disc_price' => $product->prd_price ? '₹' . number_format($product->prd_price, 2) : '',
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

        if (!$data['product']) {
            abort(404, 'Product not found');
        }
        $data['relatedProducts'] = Product::with('brand')
            ->where('category_id', $data['product']->category_id)
            ->where('id', '!=', $data['product']->id)
            ->take(4)
            ->get();
        $data['categories'] = Category::orderBy('id', "DESC")->get();
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

    // saved user location 
    public function saveLocation(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        if (Auth::check()) {
            $userId = Auth::id();

            // Check if the authenticated user already has a saved location
            $existingAddress = Address::where('user_id', $userId)->first();

            if ($existingAddress) {
                // Update the existing address
                $existingAddress->latitude = $request->latitude;
                $existingAddress->longitude = $request->longitude;

                if ($existingAddress->save()) {
                    return response()->json(['success' => true, 'message' => 'Location updated successfully']);
                }
            } else {
                // Create a new address entry for the authenticated user
                $address = new Address();
                $address->latitude = $request->latitude;
                $address->longitude = $request->longitude;
                $address->user_id = $userId;

                if ($address->save()) {
                    return response()->json(['success' => true, 'message' => 'Location saved successfully']);
                }
            }
        } else {
            // Check for an existing latitude and longitude for guests (non-authenticated users)
            $existingAddress = Address::whereNull('user_id')
                ->where('latitude', $request->latitude)
                ->where('longitude', $request->longitude)
                ->first();

            if ($existingAddress) {
                // Update the existing guest address if found
                $existingAddress->latitude = $request->latitude;
                $existingAddress->longitude = $request->longitude;

                if ($existingAddress->save()) {
                    return response()->json(['success' => true, 'message' => 'Guest location updated successfully']);
                }
            } else {
                // Create a new address entry for the guest user
                $address = new Address();
                $address->latitude = $request->latitude;
                $address->longitude = $request->longitude;
                $address->user_id = null;

                if ($address->save()) {
                    return response()->json(['success' => true, 'message' => 'Guest location saved successfully']);
                }
            }
        }

        return response()->json(['success' => false, 'message' => 'Failed to save location'], 500);
    }


    public function careersList()
    {
        $data = Career::orderBy('id', 'DESC')->get();
        return view('frontend.pages.careers.index', compact('data'));
    }

    public function careersDetails($slug)
    {
        $career = Career::where('slug', $slug)->firstOrFail();
        return view('frontend.pages.careers.details', compact('career'));
    }

    public function getSubcategories($id)
    {
        $subCategories = SubCategory::where('category_id', $id)->get();

        return response()->json([
            'subCategories' => $subCategories
        ]);
    }

    public function storeJobApplication(Request $request)
    {
        // Store the uploaded resume file
        $imageName = '';
        if ($request->hasFile('resume')) {
            $prdImage = $request->file('resume');
            $imageName = time() . '_' . $prdImage->getClientOriginalName();
            $prdImage->move(public_path('uploads/categories'), $imageName);
        }

        // Insert the data into the database
        $jobApplicationData = [
            'job_title' => $request->input('job_title'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'referenced_by' => $request->input('referenced_by'),
            'mobile' => $request->input('mobile'),
            'current_location' => $request->input('current_location'),
            'exprience' => $request->input('exprience'),
            'ready_to_relocate' => $request->input('ready_to_relocate'),
            'job_description' => $request->input('job_description'),
            'resume' => $imageName,
            'created_at' => now(),
        ];

        DB::table('apply_jobs')->insert($jobApplicationData);

        // Send email to admin
        $adminEmail = 'shankar.dayal@cracode.com'; // Replace with the admin's email address
        $jobDetails = implode("\n", [
            "Job Title: " . $jobApplicationData['job_title'],
            "Name: " . $jobApplicationData['name'],
            "Email: " . $jobApplicationData['email'],
            "Referenced By: " . $jobApplicationData['referenced_by'],
            "Mobile: " . $jobApplicationData['mobile'],
            "Current Location: " . $jobApplicationData['current_location'],
            "Experience: " . $jobApplicationData['exprience'],
            "Ready to Relocate: " . ($jobApplicationData['ready_to_relocate'] ? 'Yes' : 'No'),
            "Job Description: " . $jobApplicationData['job_description'],
            "Resume: " . url('uploads/categories/' . $jobApplicationData['resume']),
        ]);

        Mail::raw(
            "Dear Admin,\n\nA new job application has been submitted. Here are the details:\n\n" .
                $jobDetails .
                "\n\nThank you,\nBuildSupplyCo",
            function ($message) use ($adminEmail) {
                $message->to($adminEmail)
                    ->subject('New Job Application Received');
            }
        );

        return redirect('careers')->with('success', 'Job application submitted successfully!');
    }
}
