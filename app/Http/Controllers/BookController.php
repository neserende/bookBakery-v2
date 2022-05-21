<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Chapter;
use App\Http\Controllers\ChapterController;
use Validator;
use Exception;
use Illuminate\Support\Facades\Storage;


// use Symfony\Component\Process\Process;
// use Symfony\Component\Process\Exception\ProcessFailedException;

class BookController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth', []);
    // }

    public function index($book_id){
        $book = Book::findOrFail($book_id);
        return view('write', ['book' => $book, 'chapterTitles' => BookController::getChapterTitles($book_id)]);
    }

    public function store(Request $request){

        try{
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'author_name' => 'required',
                'summary' => 'required'
            ]);

            if(!$validator->passes()){
                return response()->json([('status')=> 0, 'error' => $validator->errors()->toArray()]);
            } 
            
            else {
                $book = Book::where('title', $request->title)->first();

                if($book){
                    return response()->json([
                        'status' => -1,
                        'message' =>"A book with this title already exists. Please use a different one."
                    ], 400); 
                }

                
                $book = Book::create([
                    'user_id' => auth()->user()->id,
                    'title' => $request->title, 
                    'author_name' => $request->author_name,
                    'summary' => $request->summary
                ]);

                Chapter::create([
                    'book_id' => $book->id,
                    'title' => 'New Chapter',
                    'chapter_no' => 1,
                    'body' => '/book_id_' . $book->id . '/1.html'
                ]);

                //create directory for the book
                Storage::makeDirectory('/books/book_id_' . $book->id);

                //store the first chapter in the directory
                Storage::put('/books/book_id_' . $book->id . '/1.html', '<p>Start writing!</p>');

                BookController::index($book->id);
            }
        } catch(Exception $e){
            dd($e);
        }
    }

    public function destroy($id){
        $selectedBook = Book::findOrFail($id);
        $selectedBook->delete;

        Storage::deleteDirectory('book_id_' + $book->id);

        return view('/home', 'Book successfully deleted'); //maybe print the message on a modal?
    }

    public function updateTitle($id){
        $selectedBook = Book::findOrFail($id);
        $validator = Validator::make(request()->all(), [
            'title' => 'required'
        ]);

        if(!$validator->passes()){
            return response()->json([('status')=> 0, 'error' => $validator->errors()->toArray()]);
        } 

        else{
            $book = Book::where('title', request()->input('title'))->first();

            if($book){
                return response()->json([
                    'status' => -1,
                    'message' =>"A book with this title already exists. Please use a different one."
                ], 400); 
            }

            $selectedBook->title = request->input('title');

            $selectedBook->save();

            return response()->json([
                'status' => 1,
                'title' => $selectedBook->title, 
                'id' => $selectedBook->id
            ]);
        }
    }


    public function updateAuthorName($id){
        $selectedBook = Book::findOrFail($id);
        $validator = Validator::make(request()->all(), [
            'author_name' => 'required'
        ]);

        if(!$validator->passes()){
            return response()->json([('status')=> 0, 'error' => $validator->errors()->toArray()]);
        } 

        else{
            //we are allowing any type of names so not doing duplicate check
            $selectedBook->author_name = request()->input('author_name');

            $selectedBook->save();

            return response()->json([
                'status' => 1,
                'author_name' => $selectedBook->author_name, 
                'id' => $selectedBook->id
            ]);
        }
    }


    public function updateSummary($id){
        $selectedBook = Book::findOrFail($id);
        $validator = Validator::make(request()->all(), [
            'summary' => 'required'
        ]);

        if(!$validator->passes()){
            return response()->json([('status')=> 0, 'error' => $validator->errors()->toArray()]);
        } 

        else{
            $selectedBook->summary = request()->input('summary');

            $selectedBook->save();

            return response()->json([
                'status' => 1,
                'summary' => $selectedBook->summary, 
                'id' => $selectedBook->id
            ]);
        }
    }

    public static function numOfChapters($id){
        //currently not exluding special chapters like preface and end notes etc
        $selectedBook = Book::findOrFail($id);
        $allChapters = $selectedBook->chapters; 
        return sizeof($allChapters);
    }

    public function getChapterTitles($id){
        $selectedBook = Book::findOrFail($id);
        $allChapters = $selectedBook->chapters; 
        $chapterTitles = null;

        foreach ($allChapters as $currChapter){
            $chapterTitles[$currChapter->chapter_no] = $currChapter->title;
        }

        return $chapterTitles;
    }

    public function convertToEpub(){
        try{
            $output = 0;
            $return_var = null;
            $convertReturn = exec('ebook-convert Alice.html Alice.epub', $output, $return_var);
            if($convertReturn == null){
                throw Exception;
            }
            else{
                // Storage::move('C:\Users\SERIF\laravelProjects\bookBakery-v2\public\Alice.epub', 'new/Alice.epub');
                return response()->download('Alice.epub');;
                ///return response()->json([('status')=> 1, 'result' => $output]);
            }
        } catch(Exception $e){
            dd($e);
        }
       
    }
}
