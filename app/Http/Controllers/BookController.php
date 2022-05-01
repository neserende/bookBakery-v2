<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        //call getChapterTitles
        return view('write', ['chapterTitles' => $chapterTitles]);
    }

    public function store(Request $request){
        try{
            $validator = Validator::make($request->all, [
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
                    'title' => $request->title, 
                    'author_name' => $request->author_name,
                    'summary' => $request->summary
                ]);

                Chapter::create([
                    'book_id' => $book->id,
                    'title' => 'New Chapter',
                    'body' => 'Start writing!'
                ]);

                index();
            }
        } catch(Exception $e){
            dd($e);
        }
    }

    public function destroy($id){
        $selectedBook = Book::findOrFail($id);
        $selectedBook->delete;

        return view('/home', 'Book successfully deleted'); //maybe print the message on a modal?
    }

    public function updateTitle($id){
        $selectedBook = Book::findOrFail($id);
        $validator = Validator::make(request()->all(), [
            'title' => 'required',
        ]);

        if(!$validator->passes()){
            return response()->json([('status')=> 0, 'error' => $validator->errors()->toArray()]);
        } 

        else{
            //we are allowing duplicate chapter titles
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
            'author_name' => 'required',
        ]);

        if(!$validator->passes()){
            return response()->json([('status')=> 0, 'error' => $validator->errors()->toArray()]);
        } 

        else{
            //we are allowing any type of names so not doing duplicate check
            $selectedBook->author_name = request->input('author_name');

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
            'summary' => 'required',
        ]);

        if(!$validator->passes()){
            return response()->json([('status')=> 0, 'error' => $validator->errors()->toArray()]);
        } 

        else{
            $selectedBook->summary = request->input('summary');

            $selectedBook->save();

            return response()->json([
                'status' => 1,
                'summary' => $selectedBook->summary, 
                'id' => $selectedBook->id
            ]);
        }
    }

    public function numOfChapters($id){
        //currently not exluding special chapters like preface and end notes etc
        $selectedBook = Book::findOrFail($id);
        $allChapters = $selectedBook->chapters; 
        return sizeof($allChapters);
    }

    private function getChapterTitles($id){
        $selectedBook = Book::findOrFail($id);
        $allChapters = $selectedBook->chapters; 
        
        foreach ($chapters as $currChapter){
            $chapterTitles[$currChapter->id] = $currChapter->title;
        }

        return $chapterTitles;
    }
}
