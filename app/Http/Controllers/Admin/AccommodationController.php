<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use Illuminate\Support\Facades\Auth;


class AccommodationController extends Controller
{
    
    private $accommodation;

    public function __construct(Accommodation $accommodation)
    {
        $this->accommodation = $accommodation;
    }

    public function index()
    {
        $all_accommodations = $this->accommodation->withTrashed()->latest()->paginate(8);

        return view('admin.accommodation.index')->with('all_accommodations', $all_accommodations);
    }

    public function activate($id){

        $this->accommodation->onlyTrashed()->findOrFail($id)->restore();

        return redirect()->back();
    }

    public function deactivate($id)
    {
        $this->accommodation->destroy($id);

        return redirect()->back();
    }
}
