<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    public function index()
    {
        $rows = Faq::get();
        return view('admin.faqs.index', compact('rows'));
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question_ar' => 'required',
            'question_en' => 'required',
            'answer_ar' => 'required',
            'answe_en' => 'required',
            'rank' => 'required|integer',
        ]);

        $faq = new Faq();
        $faq->question = ['ar' => $request->question_ar, 'en' => $request->question_en];
        $faq->answer = ['ar' => $request->answer_ar, 'en' => $request->answer_en];
        $faq->rank = $request->rank;
        $faq->active = $request->active;
        $faq->save();
        return redirect()->route('admin.faqs.index')->with('success', 'Faq created successfully.');
    }

    public function show(Faq $faq)
    {
        return view('admin.faqs.show', compact('faq'));
    }

    public function edit(Faq $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        $active = 0;
        if ($request->has('active')) {

            $active = 1;
        } else {
            $active = 0;
        }
        // $request->validate([
        //     'question_ar' => 'required',
        //     'question_en' => 'required',
        //     'answer_ar' => 'required',
        //     'answe_en' => 'required',
        //     'rank' => 'required|integer',
        // ]);
        $faq = Faq::findOrFail($id);
        $faq->question = ['ar' => $request->question_ar, 'en' => $request->question_en];
        $faq->answer = ['ar' => $request->answer_ar, 'en' => $request->answer_en];
        $faq->rank = $request->rank;
        $faq->active = $active;
        $faq->save();

        return redirect()->route('admin.faqs.index')->with('success', 'Faq updated successfully.');
    }

    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
        // Delete the faq
        $faq->delete();

        return redirect()->route('faqs.index')->with('success', 'Faq deleted successfully.');
    }
}
