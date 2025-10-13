<?php
// 出品商品閲覧用controller
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exhibition;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Auth;

class ExhibitionController extends Controller
{
    public function index(Request $request){

        $exhibitions = Exhibition::with('images')->get();
        $user = Auth::user();
    }
}
