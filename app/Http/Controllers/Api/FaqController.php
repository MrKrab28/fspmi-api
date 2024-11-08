<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function get()
    {
        $faq = Faq::all();
        return response()->json(['message' => 'success', 'daftarFaq' => $faq]);
    }
}
