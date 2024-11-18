<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // List banners with pagination
    public function index()
    {
        $banners = Banner::orderBy('id', 'DESC')->paginate(10);
        return view('backend.admin.banners.index', compact('banners'));
    }

    // Store a new banner
    public function store(Request $request)
    {
        // $request->validate([
        //     'title'   => 'required|string|max:255',
        //     'content' => 'nullable|string',
        //     'link'    => 'nullable|url',
        //     'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        // Handle the image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('uploads/banners'), $imagePath);
        }

        $slug = STR::slug($request->title);
        $banner = Banner::create([
            'title'   => $request->title,
            'slug'    => $slug,
            'content' => $request->content,
            'link'    => $request->link,
            'image'   => $imagePath,
            'status'  => $request->status ?? 'inactive',
        ]);

        return response()->json(['success' => 'Banner added successfully!', 'banner' => $banner]);
    }

    // Update an existing banner
    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        // Validate the request (uncomment if you need validation)
        // $request->validate([
        //     'title'   => 'required|string|max:255',
        //     'slug'    => 'required|string|max:255|unique:banners,slug,' . $id,
        //     'content' => 'nullable|string',
        //     'link'    => 'nullable|url',
        //     'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        // Handle the image upload
        if ($request->hasFile('image')) {
            // Remove the previous image if it exists
            if (file_exists(public_path('uploads/banners/' . $banner->image))) {
                unlink(public_path('uploads/banners/' . $banner->image));
            }

            // Upload new image
            $image = $request->file('image');
            $imagePath = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('uploads/banners'), $imagePath);
        } else {
            // Keep the current image if no new image is uploaded
            $imagePath = $banner->image;
        }

        // Generate slug from title
        $slug = STR::slug($request->title);

        // Update the banner
        $banner->update([
            'title'   => $request->title,
            'slug'    => $slug,
            'content' => $request->content,
            'link'    => $request->link,
            'image'   => $imagePath,
            'status'  => $request->status ?? 'inactive',
        ]);

        // Return JSON response
        return response()->json(['success' => 'Banner updated successfully!', 'banner' => $banner]);
    }


    // Delete a banner
    public function destroy($id)
    {
        if (!empty($id)) {
            $banner = Banner::findOrFail($id);
            if ($banner->image && file_exists(public_path('uploads/banners/' . $banner->image))) {
                unlink(public_path('uploads/banners/' . $banner->image));
            }
            $banner->delete();

            return redirect()->back()->with('success', 'Banner deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    // Filter banners based on title or status
    public function bannerFilter(Request $request)
    {
        $query = $request->get('query');

        // Perform search operation
        $banners = Banner::where('title', 'LIKE', "%{$query}%")
            ->orWhere('status', 'LIKE', "%{$query}%")
            ->get();

        // Return banners as JSON
        return response()->json([
            'success' => true,
            'banners' => $banners
        ]);
    }
}
