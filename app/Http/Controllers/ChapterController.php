<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Book;
use App\Models\Note;
use Validator;
use Exception;

use Illuminate\Support\Facades\Storage;

class ChapterController extends Controller
{
       public function store(Request $request, $bookID){
        try{
            $validator = Validator::make($request->all(), [
                'title' => 'required'
            ]);

            if(!$validator->passes()){
                return response()->json([('status')=> 0, 'error' => $validator->errors()->toArray()]);
            } 
            
            else {

                $chapter_no = BookController::numOfChapters($bookID) + 1;
                $chapter = Chapter::create([
                    'book_id' => $bookID,
                    'chapter_no' => $chapter_no,
                    'title' => $request->title,
                    'body' => '/book_id_' . $bookID . '/' . $chapter_no . '.html'
                ]);
                
                //store the chapter in the directory
                Storage::put('/books/book_id_' . $bookID . '/' . $chapter_no . '.html', '<p>Start writing!</p>');

                return response()->json([
                    'status' => 1,
                    'chapter_title' => $chapter->title, 
                    'chapter_id' =>  $chapter->chapter_id,
                    'chapter_no' => $chapter_no
                ]);
            }

        } catch(Exception $e){
            dd($e);
        }
    }

    public function getChapter($book_id, $chapter_no){
        $selectedChapter = Chapter::where('book_id' , $book_id)
                            ->where('chapter_no', $chapter_no)
                            ->first();
        return response()->json([
            'chapter_id' => $selectedChapter->id,
            'chapter_content' => Storage::get('/books/book_id_' . $book_id . '/' . $chapter_no . '.html')
        ]);
    }

    public function updateBody($book_id, $chapter_no){
        $selectedChapter = Chapter::where('book_id' , $book_id)
                            ->where('chapter_no', $chapter_no)
                            ->first();
        try{
            $url = '/books/book_id_' . request()->book_id . '/' . request()->chapter_no . '.html';
            //we update the file
            if(request()->body == null)
                $stringToPut = '\n';
            else
                $stringToPut = request()->body;

                Storage::put( $url, $stringToPut);

                return response()->json([
                    'status' => 1
                ]);

            } catch(Exception $e){
                dd($e);
            }
       
    }

    public function updateTitle($book_id, $chapter_no){
        $selectedChapter = Chapter::where('book_id' , $book_id)
                            ->where('chapter_no', $chapter_no)
                            ->first();

        $validator = Validator::make(request()->all(), [
            'title' => 'required',
        ]);

        if(!$validator->passes()){
            return response()->json([('status')=> 0, 'error' => $validator->errors()->toArray()]);
        } 

        else{
            //we are allowing duplicate chapter titles
            $selectedChapter->title = request()->input('title');

            $selectedChapter->save();

            return response()->json([
                'status' => 1,
                'title' => $selectedChapter->title, 
                'chapter_no' => $selectedChapter->chapter_no
            ]);
        }
    }

    public function getNotesOfChapter($id){
        $selectedChapter = Chapter::findOrFail($id);
        return json_encode($selectedChapter->notes);
    }
    
    public function destroy($book_id, $chapter_no){
        $selectedChapter = Chapter::where('book_id' , $book_id)
                            ->where('chapter_no', $chapter_no)
                            ->first();
        $selectedChapter->delete();

        return response()->json(['success' => 'Chapter has been successfully deleted']);
    }

}
