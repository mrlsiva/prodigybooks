<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Categories;
use App\Trialbooks;
use Auth;
use Session;
use DB;

class TrialBooksController extends Controller
{
    public function viewTrialBooks(Request $request)
    {
        // dd($request->path());
        $getPath = explode('/', $request->path());
        $trialBooks = Trialbooks::where('categories_id', $getPath[1])->get();
        $getCategory = Categories::where('id', $getPath[1])->first();
        // dd($getCategory['series_name']);
        return view('pages/trial-books')
            ->with('Trialbooks', $trialBooks)
            ->with('category', $getCategory);
    }

    public function viewCategories(Request $request)
    {
        
        $categories = Categories::all();
        return view('pages/trial-series')
            ->with('categories', $categories);
    }

    public function readTrialBook($id, Request $request) {

        //`$getPath = explode('/', $request->path());
        $getBook = Trialbooks::where('id', $id)->first();
        /*return view('pages/e-book-trial')
            ->with('book_path', $getBook[0]->pdf)
            ->with('thumb_img', $getBook[0]->thumb_img);*/

        return view('pages/e-book-trial')
            ->with('book_path', $getBook->pdf)
            ->with('thumb_img', $getBook->thumb_img);
    }

    public function getAllTrialBooks(Request $request) {
        // dd($request->path());
        //$getPath = explode('/', $request->path());
        /*$categories = Trialbooks::select('categories_id')->distinct('categories_id')->get();
        foreach ($categories as $cat) {
            $trialBooks[] = Trialbooks::where('categories_id', $cat->categories_id)->get();
        }*/

        $trialBooks = Trialbooks::get();
        return view('pages/trial-books-list', compact('trialBooks'));
        //$getCategory = Categories::where('id', $getPath[1])->first();
        // dd($getCategory['series_name']);
        

        /*return view('pages/trial-books')
            ->with('Trialbooks', $trialBooks)
            ->with('category', $getCategory);*/
    }


}
