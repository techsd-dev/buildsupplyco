<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\privacyPolicy;
use App\Models\ReturnNShipmentPolicy;
use App\Models\Setting;
use App\Models\VulnerabilityDisclosuePolicy;
use App\Models\TermsNCondition;
use Illuminate\Http\Request;
use DB;

class CommonController extends Controller
{
    public function terms()
    {
        $terms = TermsNCondition::find(1);
        return view('backend.admin.contentmanagemnt.terms', compact('terms'));
    }

    public function termsStore(Request $request)
    {
        if ($request->term_id) {
            $terms = TermsNCondition::find($request->term_id);

            if ($terms) {
                $terms->title = $request->title;
                $terms->description = $request->description;
                $terms->save();
            } else {
                return redirect()->back()->with('error', 'Record not found');
            }
        } else {
            TermsNCondition::create([
                'title' => $request->title,
                'description' => $request->description,
            ]);
        }
        return redirect()->back()->with('success', 'Terms and conditions saved successfully');
    }

    public function privacy()
    {
        $privacy = privacyPolicy::find(1);
        return view('backend.admin.contentmanagemnt.privacypolicy', compact('privacy'));
    }

    public function privacyStore(Request $request)
    {
        if ($request->privacy_id) {
            $privacy = privacyPolicy::find($request->privacy_id);

            if ($privacy) {
                $privacy->title = $request->title;
                $privacy->description = $request->description;
                $privacy->save();
            } else {
                return redirect()->back()->with('error', 'Record not found');
            }
        } else {
            privacyPolicy::create([
                'title' => $request->title,
                'description' => $request->description,
            ]);
        }
        return redirect()->back()->with('success', 'Privacy Policy saved successfully');
    }

    public function settings()
    {
        $data = Setting::find(1);
        return view('backend.admin.contentmanagemnt.settings', compact('data'));
    }

    public function settingsStore(Request $request)
    {
        $data = $request->only([
            'title',
            'content',
            'phone',
            'email',
            'phone',
            'email',
            'fb',
            'ytb',
            'twitter',
            'insta',
            'linkedin'
        ]);

        if ($request->id) {
            $settings = Setting::find($request->id);
            if ($settings) {
                $settings->fill($data);
                $settings->save();
                return redirect()->back()->with('success', 'Settings updated successfully');
            } else {
                return redirect()->back()->with('error', 'Settings not found');
            }
        } else {
            Setting::create($data);
            return redirect()->back()->with('success', 'Settings created successfully');
        }
    }


    public function returnNShipmentPlcy()
    {
        $data = ReturnNShipmentPolicy::find(1);
        return view('backend.admin.contentmanagemnt.return_n_shipment_policy', compact('data'));
    }

    public function returnNShipmentPlcyStore(Request $request)
    {
        if ($request->id) {
            $data = ReturnNShipmentPolicy::find($request->id);

            if ($data) {
                $data->title = $request->title;
                $data->description = $request->description;
                $data->title1 = $request->title1;
                $data->description1 = $request->description1;
                $data->save();
            } else {
                return redirect()->back()->with('error', 'Record not found');
            }
        } else {
            ReturnNShipmentPolicy::create([
                'title' => $request->title,
                'description' => $request->description,
                'title1' => $request->title1,
                'description1' => $request->description1,
            ]);
        }
        return redirect()->back()->with('success', 'Return and shipment policy saved successfully');
    }

    public function aboutUs()
    {
        $data = AboutUs::find(1);
        return view('backend.admin.contentmanagemnt.aboutus', compact('data'));
    }

    public function aboutUsStore(Request $request)
    {
        $request->validate([
            // 'bnr_title' => 'required|string|max:255',
            // 'bnr_content' => 'required|string',
            // 'main_content' => 'required|string',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // If 'id' exists, find the record, otherwise create a new one
        $data = $request->id ? AboutUs::find($request->id) : new AboutUs;

        if ($data) {
            $data->bnr_title = $request->bnr_title;
            $data->bnr_content = $request->bnr_content;
            $data->main_content = $request->main_content;

            if ($request->hasFile('image')) {
                if ($request->id && $data->image) {
                    $oldFirstImagePath = public_path('uploads/about/' . $data->image);
                    if (file_exists($oldFirstImagePath)) {
                        unlink($oldFirstImagePath); 
                    }
                }
                $firstImage = $request->file('image');
                $firstImageName = time() . '_first_' . $firstImage->getClientOriginalName();
                $firstImage->move(public_path('uploads/about'), $firstImageName);
                $data->image = $firstImageName;
            }

            if ($request->hasFile('banner')) {
                if ($request->id && $data->banner) {
                    $oldBannerImagePath = public_path('uploads/about/' . $data->banner);
                    if (file_exists($oldBannerImagePath)) {
                        unlink($oldBannerImagePath);
                    }
                }
                $bannerImage = $request->file('banner');
                $bannerImageName = time() . '_banner_' . $bannerImage->getClientOriginalName();
                $bannerImage->move(public_path('uploads/about'), $bannerImageName);
                $data->banner = $bannerImageName; 
            }
            $data->save();
            return redirect()->back()->with('success', 'About Us data saved successfully');
        }
        return redirect()->back()->with('error', 'Failed to save data');
    }


    public function contactUs()
    {
        $contactus = DB::table('contact_us')->orderBy('id', 'DESC')->paginate(10);
        return view('backend.admin.contentmanagemnt.contactus', compact('contactus'));
    }

    public function vulnerabilityDisclosuePolicy()
    {
        $data = VulnerabilityDisclosuePolicy::find(1);
        return view('backend.admin.contentmanagemnt.vulnerabilitydisclosuepolicy', compact('data'));
    }

    public function vulnerabilityDisclosuePolicyStore(Request $request)
    {
        if ($request->id) {
            $data = VulnerabilityDisclosuePolicy::find($request->id);

            if ($data) {
                $data->title = $request->title;
                $data->description = $request->description;
                $data->save();
            } else {
                return redirect()->back()->with('error', 'Record not found');
            }
        } else {
            VulnerabilityDisclosuePolicy::create([
                'title' => $request->title,
                'description' => $request->description,
            ]);
        }
        return redirect()->back()->with('success', 'Vulnerability Disclosue Policy saved successfully');
    }
}
