<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use App\Models\Book;
use App\Console\Commands\ScrapeBooksCommand;



class ScrapeController extends Controller
{
    public function index(){
        $all_data = Book::
        


        orderBy('id','desc')
        ->limit(10)

        ->get();
    return view('index', compact('all_data'));
    }
       public function scrapeBooks()
        {
            $client = new Client();
            $crawler = $client->request('GET', 'https://www.kotobati.com/section/%D8%B1%D9%88%D8%A7%D9%8A%D8%A7%D8%AA');
    
            
    
            $books = $crawler->filter('.book-item')->each(function ($node) {
                $title = $node->filter('.book-title')->text();
                $author = $node->filter('.book-author')->text();
                $pagesCount = $node->filter('.book-pages')->text();
                $language = $node->filter('.book-lang')->text();
                $size = $node->filter('.book-size')->text();
                $pdfUrl = $node->filter('.book-pdf')->attr('href');
    
                return [
                    'title' => $title,
                    'author' => $author,
                    'pagesCount' => $pagesCount,
                    'language' => $language,
                    'size' => $size,
                    'pdfUrl' => $pdfUrl,
                ];
            });

            foreach($books as $book){
                Book::create([
                    'title' => $book['title'],
                    'author' => $book['author'],
                    'pagesCount' => $book['pagesCount'],
                    'language' => $book['language'],
                    'size' => $book['size'],
                    'pdfUrl' => $book['pdfUrl'],
                ]);
            }
                    //dd($crawler);
            return redirect()->route('scrape');
        }

        public function scrapeAjax(Request $request)
        {
            // Your scraping logic here...
            $client = new Client();
            $crawler = $client->request('GET', 'https://www.kotobati.com/section/%D8%B1%D9%88%D8%A7%D9%8A%D8%A7%D8%AA');
    
            
    
            $books = $crawler->filter('.book-item')->each(function ($node) {
                $title = $node->filter('.book-title')->text();
                $author = $node->filter('.book-author')->text();
                $pagesCount = $node->filter('.book-pages')->text();
                $language = $node->filter('.book-lang')->text();
                $size = $node->filter('.book-size')->text();
                $pdfUrl = $node->filter('.book-pdf')->attr('href');
    
                return [
                    'title' => $title,
                    'author' => $author,
                    'pagesCount' => $pagesCount,
                    'language' => $language,
                    'size' => $size,
                    'pdfUrl' => $pdfUrl,
                ];
            });
            return response()->json($books);
        
        
        }


     


//namespace App\Http\Controllers;

//use Illuminate\Support\Facades\Storage;
//use Goutte\Client;

//use DB;

//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Cache;
//use Illuminate\Support\Facades\DB as FacadesDB;

    // public function index()
    // {
    //     $all_data = DB::table('details')->get();
    //     // return response()->json($all_data);
    //     return view('index', compact('all_data'));
    // }


     

//     public function get_scraping(Request $request)
//     {

//         $client = new Client();
//         $data_f_scaraping = [];
//         $page = $request->input('page');


//         $crawler = $client->request('GET', "https://www.kotobati.com/section/%D8%B1%D9%88%D8%A7%D9%8A%D8%A7%D8%AA?page=$page");


//         $crawler->filter('.book-teaser ')->each(function ($listelment) use (&$client, &$data_f_scaraping) {



//             $a = $listelment->filter('a');
//             $link = $a->link();
//             $pagestory = $client->click($link);
//             $pagestory->filter('.media')->each(function ($listelment) use (&$data_f_scaraping,) {

//                 $details = $listelment->filter('.media-body')->children();
//                 $name = $details->eq(0)->text();
//                 $auther = $details->eq(1)->text();
//                 $numberofpages = $listelment->filter('li')->text();
//                 $language = $listelment->filter('li+li')->text();

//                 $size = $listelment->filter('li+li+li')->text();
//                 if (empty(trim($size))) {
//                     return 'empty';
//                 }
//                 $download = $listelment->filter('li+li+li+li')->text();
//                 if (empty(trim($download))) {
//                     return 'empty';
//                 }
//                 $filetype = $listelment->filter('li+li+li+li+li')->text();
//                 if (empty(trim($filetype))) {
//                     return 'empty';
//                 }
//                 $data_f_scaraping['name'] = $name;
//                 $data_f_scaraping['auther'] = $auther;
//                 $data_f_scaraping['nimber_of_pages'] = $numberofpages;
//                 $data_f_scaraping['language'] = $language;
//                 $data_f_scaraping['size'] = $size;
//                 $data_f_scaraping['download'] = $download;
//                 $data_f_scaraping['filetype'] = $filetype;
//             });
//             $pagestory->filter('.box-btn')->each(function ($listelment) use (&$client, &$data_f_scaraping) {
//                 $a2 = $listelment->filter('.download')->first();
//                 dd($a2->attr('hre'));
//             });
//             dd($data_f_scaraping);
//             DB::table('details')->insert($data_f_scaraping);
//         });

//         return redirect()->route('all')->with('success', 'succsess');
//     }
 }