<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Checkup;
use App\Models\CheckupBanner;
use Illuminate\Http\Request;

class CheckupController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->get('type');
        $search = $request->get('search');
        $checkup = CheckupBanner::first();
        $checkups = Checkup::query();
        if (!is_null($search)) {
            $checkups->where('title_' . app()->getLocale(), 'like', "%$search%");
        }

        if (!is_null($type)) {
            switch ($type) {
                case 'discount':
                    $checkups->whereNotNull('discounted_price');
                    break;

                case 'non_discount':
                    $checkups->whereNull('discounted_price');
                    break;

                default:
                    break;
            }
        }

        $checkups = $checkups->paginate(12);


        return view('frontend.checkups.index', compact(
            'checkup',
            'checkups'
        ));
    }
}
