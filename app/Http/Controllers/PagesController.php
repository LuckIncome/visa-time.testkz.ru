<?php

namespace App\Http\Controllers;

use TCG\Voyager\Models\Page;
use App\Models\Contact;
use App\Models\FAQ;
use App\Models\Review;
use App\Models\Partner;
use App\Models\MainPageIcon;
use App\Models\MainPageTitle;
use App\Models\Blog;
use App\Models\Service;
use App\Models\Support;
use App\Models\Agency;
use App\Models\AboutPeople;
use App\Models\AboutText;
use App\Models\Photo;
use App\Models\Insurance;
use  App\Models\Country;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function getPage($slug = 'home')
    {
        if (strpos(url()->current(), 'home') !== false) {
            abort(404);
        } else {
            $page = Page::select('type', 'id', 'title', 'slug', 'seo_title', 'meta_description', 'meta_keywords', 'status')
                ->where(['slug' => $slug, 'status' => Page::STATUS_ACTIVE])
                ->firstOrFail();
        }
        switch ($page->type) {
            case 'home':
                $reviews = Review::where('status', true)              
                ->orderBy('sort_id', 'asc')   
                ->whereNotNull('images')           
                ->paginate(3);
                $popular_countries = Country::select('timing_excerpt_second', 'timing_excerpt_third', 'name_country', 'icon', 'slug', 'first_image')
                ->where('status',true)
                ->where('popular', true)
                ->orderBy('sort_id', 'asc')
                ->get();
                $link_countries = Country::select('name_country', 'slug')
                ->where('status',true)
                ->where('popular', true)
                ->orderBy('sort_id', 'asc')
                ->paginate(5);
                $faqs = FAQ::where('status', true)->orderBy('sort_id', 'asc')->paginate(5);
                $partners = Partner::paginate(3);
                $icons = MainPageIcon::paginate(5);
                $blogs = Blog::select('title', 'image','content', 'slug')
                    ->where('status',true)
                    ->orderBy('sort_id', 'asc')
                    ->paginate(10);
                $title_1 = MainPageTitle::where('type', 'block_1')->select('title', 'subtitle', 'image')->first();
                $title_2 = MainPageTitle::where('type', 'block_2')->select('title', 'subtitle')->firstOrFail();
                $title_3 = MainPageTitle::where('type', 'block_3')->select('title', 'subtitle', 'description', 'image')->first();
                $title_4 = MainPageTitle::where('type', 'block_4')->select('title')->first();
                $title_5 = MainPageTitle::where('type', 'block_5')->select('title', 'subtitle')->first();
                $title_6 = MainPageTitle::where('type', 'block_6')->select('title', 'subtitle')->first();
                //$title_7 = MainPageTitle::where('type', 'block_7')->select('title')->first();
                $title_8 = MainPageTitle::where('type', 'block_8')->select('title')->first();
                $title_9 = MainPageTitle::where('type', 'block_9')->select('title')->first();
                $services = Service::get();
                $supports = Support::get();
                return view('pages.' . $page->type, compact(
                    'page', 
                    'faqs', 
                    'reviews', 
                    'partners',
                    'icons',
                    'blogs',
                    'services',
                    'supports',
                    'title_1',
                    'title_2',
                    'title_3',
                    'title_4',
                    'title_5',
                    'title_6',
                    'title_8',
                    'title_9',
                    'popular_countries',
                    'link_countries'
                ));
                break;
            case 'insurance':
                $insurance = Insurance::select('content', 'second_content', 'third_content', 'fourth_content', 'fifth_content',  'first_image', 'second_image', 'bottom_content')->firstOrFail();                     
                return view('pages.' . $page->type, compact('page', 'insurance'));
                break;
            case 'photo':
                $photo = Photo::select('content', 'second_content', 'third_content', 'first_image', 'second_image', 'bottom_content')->firstOrFail();                     
                return view('pages.' . $page->type, compact('page', 'photo'));
                break;
            case 'agency':
                $agency = Agency::select('content', 'right_content', 'excerpt')->firstOrFail();                     
                return view('pages.' . $page->type, compact('page', 'agency'));
                break;
            case 'about':
                $text = AboutText::select('content', 'image', 'icon', 'excerpt', 'service', 'title', 'imageBg')->firstOrFail();   
                $peoples = AboutPeople::where('status', true)->orderBy('sort_id', 'asc')->get();                     
                return view('pages.' . $page->type, compact('page', 'text', 'peoples'));
                break;
            case 'reviews':
                $reviews = Review::where('status', true)->orderBy('sort_id', 'asc')->paginate(2);         
                return view('pages.' . $page->type, compact('page', 'reviews'));
                break;
            case 'faq':
                $faqs = FAQ::where('status', true)->orderBy('sort_id', 'asc')->get();
                return view('pages.' . $page->type, compact('page', 'faqs'));
                break;
            case 'contacts':
                return view('pages.' . $page->type, compact('page'));
                break;  
            case 'blog':
                return view('pages.' . $page->type, compact('page'));
                break;          
            case 'simple':
                return view('pages.' . $page->type, compact('page'));
                break;
            default :
                return view('pages.' . $page->type, compact('page'));
                break;
        }
    }
}