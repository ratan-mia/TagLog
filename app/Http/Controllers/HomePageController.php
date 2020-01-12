<?php

namespace App\Http\Controllers;

use App\Agent;
use App\City;
use App\Country;
use App\Destination;
use App\Experience;
use App\Visa;
use Illuminate\Http\Request;
use App\Company;
use App\Category;

class HomePageController extends Controller
{

    public function index()
    {

        $visas        = Visa::all()->pluck('name', 'id')->prepend(trans('Visa Type'), '');
        $countries    = Country::all()->pluck('name', 'id')->prepend(trans('Country Currently Living'), '');
        $destinations = Destination::all()->pluck('name', 'id')->prepend(trans('Destination Country'), '');
        $cities       = City::all()->pluck('name', 'id')->prepend(trans('City Currently Living'), '');
        $categories = Category::all();
        return view('frontend.index',compact('visas','countries','destinations','cities','categories'));
    }


    public function search(Request $request)
    {
        $agents = Agent::filterByRequest($request)->paginate(9);


        return view('frontend.search', compact('agents'));
    }

    public function category(Category $category)
    {
        $companies = Company::join('category_company', 'companies.id', '=', 'category_company.company_id')
            ->where('category_id', $category->id)
            ->paginate(9);

        return view('frontend.category', compact('companies', 'category'));
    }

    public function company(Company $company)
    {
        return view('frontend.company', compact ('company'));
    }

}
