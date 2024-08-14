<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(){
        $faq = Faq::all();
        return view('admin.faq', compact('faq'));
    }

    public function store(Request $request){
        $data = $request->validate([
            'pertanyaan' => 'required',
            'jawaban' => 'required',

        ]);

        Faq::create($data);

        return redirect()->back()->with('success', 'Berhasil Menambahkan Data');

    }

    public function edit(Faq $faq){
        return view('admin.faq-edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq){

            $data = $request->validate([
                'pertanyaan' => 'required',
                'jawaban' => 'required',


        ]);

        $faq->update($data);

        return redirect()->back()->with('success', 'Berhasil Mengubah data');
    }

    public function destroy(Faq $faq){
        $faq->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus Data');
    }
}
