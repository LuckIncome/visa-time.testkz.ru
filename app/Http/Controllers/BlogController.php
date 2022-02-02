<?php

namespace App\Http\Controllers;
use TCG\Voyager\Models\Page;
use App\Models\Blog;
use App\Models\Country;
use  App\Models\VisaCategory;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $countries = Country::select('id', 'name_country', 'icon', 'slug')->where('status',true)->get();
        $blogs = Blog::select('title', 'image','content', 'slug', 'country_id')
            ->where('status',true)
            ->orderBy('sort_id', 'desc')
            ->paginate(3);
        $page = Page::where(['type' => 'blog', 'status' => Page::STATUS_ACTIVE])->firstOrFail();
        return view('pages.blog.index', compact('page', 'blogs', 'countries'));
    }

    public function show($articleSlug)
    {
        $blog = Blog::where('slug', $articleSlug)->where('status',true)->first();
        
        $blogs = Blog::select('title', 'image','content', 'slug')
            ->where('status',true)
            ->orderBy('sort_id', 'asc')
            ->paginate(10);
        $page = Page::where(['type' => 'blog'])->firstOrFail();
        return view('pages.blog.show', compact('page', 'blog', 'blogs'));
    }

    public function show_cat($countrySlug)
    {
        $countries = Country::select('id', 'name_country', 'icon', 'slug')->where('status',true)->get();
        $country = Country::select('name_country', 'icon', 'seo_title', 'meta_description', 'meta_keywords')->where('status',true)->where('slug', $countrySlug)->first();

        $country_id = Country::select('id')->where('status',true)->where('slug', $countrySlug)->firstOrFail();
        $blogs = Country::find($country_id->id)->blogs()->select('title', 'image','content', 'slug', 'country_id')->where('status',true)->orderBy('sort_id', 'asc')->paginate(3);

        $page = Page::where(['type' => 'blog', 'status' => Page::STATUS_ACTIVE])->firstOrFail();
        return view('pages.blog.index_cat', compact('page', 'blogs', 'countries', 'country'));
    }
}
