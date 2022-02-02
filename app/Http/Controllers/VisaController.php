<?php

namespace App\Http\Controllers;

use TCG\Voyager\Models\Page;
use  App\Models\Country;
use  App\Models\CountryDocument;
use  App\Models\Document;
use  App\Models\VisaCategory;
use App\Models\Review;
use App\Models\Insurance;

use Illuminate\Database\Eloquent\Builder;

use Illuminate\Http\Request;

class VisaController extends Controller
{
    public function index() {

        $visa_c = VisaCategory::select('id', 'name')->with(['countries' => function($q) {
            $q->select('name_country', 'visa_category_id', 'timing_excerpt_first', 'timing_excerpt_second', 'timing_excerpt_third', 'seo_title', 'slug', 'icon', 'sort_id')->where('status',true)->orderBy('sort_id', 'asc')->get();
        }])->get();
        
        $insurance = Insurance::select('bottom_content')->firstOrFail(); 

        $page = Page::where(['type' => 'visa', 'status' => Page::STATUS_ACTIVE])->firstOrFail();
        return view('pages.visa.index', compact(
            'page', 
            'insurance',
            'visa_c'
        ));
    }

    public function show($article) {
        $reviews = Review::where('status', true)->orderBy('sort_id', 'asc')->whereNotNull('images')->paginate(3);

        $country_id = Country::select('id')->where('status',true)->where('slug', $article)->first();
        $document_necessary = Country::find($country_id->id)->documents()->select('content')->where(['type' => 'necessary'])->where('status',true)->first();
        $documents = Country::find($country_id->id)->documents()->select('title', 'content', 'sort_id')->where(['type' => 'additional'])->where('status',true)->orderBy('sort_id', 'asc')->get();
        
        $country_title = Country::select('title_main')->where('status',true)->where('slug', $article)->first();
        $country_bg = Country::select('image_bg')->where('status',true)->where('slug', $article)->first();
        $country_name = Country::select('name_country')->where('status',true)->where('slug', $article)->first();

        $timing = Country::select('timing_title_first', 'timing_excerpt_first', 'timing_title_second', 'timing_excerpt_second', 'timing_title_third','timing_excerpt_third')->where('status',true)->where('slug', $article)->first();
        $icon = Country::select('icon_first', 'icon_title_first', 'icon_second', 'icon_title_second', 'icon_third','icon_title_third')->where('status',true)->where('slug', $article)->first();

        $content = Country::select('content_how', 'content_price', 'content_nation', 'bottom_content', 'second_content_nation', 'third_content_nation', 'description_nation')->where('status',true)->where('slug', $article)->first();

        $seo = Country::select('seo_title', 'meta_description', 'meta_keywords')->where('status',true)->where('slug', $article)->first();

        $images = Country::select('first_image', 'second_image', 'third_image', 'first_image_alt', 'second_image_alt', 'third_image_alt')->where('status',true)->where('slug', $article)->first();

        $title = Country::select('title_how', 'title_document', 'subtitle_document_first', 'subtitle_document_second', 'title_price', 'title_nation', 'title_review', 'second_title_nation', 'third_title_nation')->where('status',true)->where('slug', $article)->first();

        $page = Page::where(['type' => 'visa'])->firstOrFail();
        return view('pages.visa.show', compact(
            'page', 
            'seo',
            'document_necessary', 
            'documents',
            'country_name',
            'country_title',
            'country_bg',
            'timing',
            'icon',
            'content',
            'reviews',
            'images',
            'title'
        ));
    }
}
