<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Category;

class HomePageController extends Controller
{

    public function index()
    {
        return view('frontend.index');
    }

    public function table(Request $request)
    {
        $companies = Company::filterByRequest($request)->paginate(9);

        return view('frontend.search', compact('companies'));
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
