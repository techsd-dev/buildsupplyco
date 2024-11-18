<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CareerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // List careers with pagination
    public function index()
    {
        $careers = Career::orderBy('id', 'DESC')->paginate(10);
        return view('backend.admin.careers.index', compact('careers'));
    }

    // Store a new career
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
            $image->move(public_path('uploads/careers'), $imagePath);
        }
        
        $slug = STR::slug($request->designation);
        $careers = Career::create([
            'designation'   => $request->designation,
            'slug'    => $slug,
            'job_location' => $request->job_location,
            'experience'    => $request->experience,
            'overview'    => $request->overview,
            'qualification'    => $request->qualification,
            'roles_n_responsibilities'    => $request->roles_n_responsibilities,
            'image'   => $imagePath,
        ]);

        return response()->json(['success' => 'career added successfully!', 'career' => $careers]);
    }

    // Update an existing career
    public function update(Request $request, $id)
    {
        $careers = Career::findOrFail($id);

        // Validate the request (uncomment if you need validation)
        // $request->validate([
        //     'title'   => 'required|string|max:255',
        //     'slug'    => 'required|string|max:255|unique:careers,slug,' . $id,
        //     'content' => 'nullable|string',
        //     'link'    => 'nullable|url',
        //     'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        // Handle the image upload
        if ($request->hasFile('image')) {
            // Remove the previous image if it exists
            if (file_exists(public_path('uploads/careers/' . $careers->image))) {
                unlink(public_path('uploads/careers/' . $careers->image));
            }

            // Upload new image
            $image = $request->file('image');
            $imagePath = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('uploads/careers'), $imagePath);
        } else {
            // Keep the current image if no new image is uploaded
            $imagePath = $careers->image;
        }

        // Generate slug from title
        $slug = STR::slug($request->title);

        // Update the career
        $careers->update([
            'designation'   => $request->designation,
            'slug'    => $slug,
            'job_location' => $request->job_location,
            'experience'    => $request->experience,
            'overview'    => $request->overview,
            'qualification'    => $request->qualification,
            'roles_n_responsibilities'    => $request->roles_n_responsibilities,
            'image'   => $imagePath,
        ]);

        // Return JSON response
        return response()->json(['success' => 'Career updated successfully!', 'career' => $careers]);
    }


    // Delete a career
    public function destroy($id)
    {
        if (!empty($id)) {
            $careers = Career::findOrFail($id);
            if ($careers->image && file_exists(public_path('uploads/careers/' . $careers->image))) {
                unlink(public_path('uploads/careers/' . $careers->image));
            }
            $careers->delete();

            return redirect()->back()->with('success', 'Career deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    // Filter careers based on title or status
    public function careerFilter(Request $request)
    {
        $query = $request->get('query');

        // Perform search operation
        $careers = Career::where('title', 'LIKE', "%{$query}%")
            ->orWhere('status', 'LIKE', "%{$query}%")
            ->get();

        // Return careers as JSON
        return response()->json([
            'success' => true,
            'careers' => $careers
        ]);
    }
}
