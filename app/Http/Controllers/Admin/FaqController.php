<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $faqs = Faq::orderBy('id', 'DESC')->paginate(10);
        return view('backend.admin.faqs.index', compact('faqs'));
    }

    public function store(Request $request)
    {
        $faqs = Faq::create([
            'question'   => $request->question,
            'ans' => $request->ans,
        ]);
        return response()->json(['success' => 'Faq added successfully!', 'faq' => $faqs]);
    }

    public function update(Request $request, $id)
    {
        $faqs = Faq::findOrFail($id);
        $faqs->update([
            'question'   => $request->question,
            'ans' => $request->ans,
        ]);
        return response()->json(['success' => 'Faq updated successfully!', 'faq' => $faqs]);
    }

    public function destroy($id)
    {
        if (!empty($id)) {
            $faqs = Faq::findOrFail($id);
            $faqs->delete();
            return redirect()->back()->with('success', 'Faq deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    public function faqFilter(Request $request)
    {
        $query = $request->get('query');
        $faqs = Faq::where('title', 'LIKE', "%{$query}%")
            ->orWhere('status', 'LIKE', "%{$query}%")
            ->get();
        return response()->json([
            'success' => true,
            'faqs' => $faqs
        ]);
    }
}
