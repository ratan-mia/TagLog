<?php

namespace App\Http\Controllers;

use App\Agent;
use App\City;
use App\Country;
use App\Destination;
use App\Employer;
use App\Experience;
use App\Visa;
use Illuminate\Http\Request;
use App\Company;
use App\Category;

class HomePageController extends Controller
{

    public function index()
    {

        $visas = Visa::all()->pluck('name', 'id')->prepend(trans('Visa Type'), '');
        $countries = Country::all()->pluck('name', 'id')->prepend(trans('Country Currently Living'), '');
        $destinations = Destination::all()->pluck('name', 'id')->prepend(trans('Destination Country'), '');
        $cities = City::all()->pluck('name', 'id')->prepend(trans('City Currently Living'), '');
        $categories = Category::all();

        return view('frontend.index', compact('visas', 'countries', 'destinations', 'cities', 'categories'));
    }


    public function search(Request $request)

    {

        $request->flash();


        if ($request->input('type') == 'employer') {

            $results = Employer::filterByRequest($request)->with('countries')->paginate(9);
        } elseif ($request->input('type') == 'organization') {
            $results = Agent::filterByRequest($request)->with('countries')->paginate(9);
        }

        return view('frontend.results', compact('results'));
    }

    public function navigation(Request $request, $type, $country)

    {
        $request->flash();


        if ($type == 'organization') {

            $request->session()->flash('type', 'organization');
            $request->session()->flash('country_id', $country);
            $results = Agent::filterByRequest($request)->with('countries')->paginate(9);

        } elseif (type == 'employer') {

            $results = Agent::filterByRequest($request)->with('countries')->paginate(9);
        }


        return view('frontend.results', compact('results'));
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
        $cities = City::all();
        return view('frontend.company', compact('company', 'cities'));
    }

    public function agent(Agent $agent)
    {
        $industries = $agent->load('industries')->get();
        $employers = $agent->load('employers');
        $agent->load('location', 'experiences');

        return view('frontend.agent', compact('agent', 'industries', 'employers'));
    }


    public function employer(Employer $employer)
    {
        $industries = $employer->load('industries')->get();
        $agents = $employer->load('agents');
        $employer->load('location', 'experiences');


        return view('frontend.employer', compact('employer', 'industries', 'industries', 'agents'));
    }

}
