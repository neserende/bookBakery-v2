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
        // dd($selectedChapter);
        return response()->json([
            'chapter_id' => $selectedChapter->id,
            // 'chapter_content' => asset('storage/books/book_id_' . $book_id . '/' . $chapter_no . '.html')
            'chapter_content' => Storage::get('/books/book_id_' . $book_id . '/' . $chapter_no . '.html')
        ]);
    }

    public function updateBody($book_id, $chapter_id){
        $selectedChapter = Chapter::findOrFail($chapter_id);
        try{
            $url = '/books/book_id_' . request()->book_id . '/' . request()->chapter_id . '.html';
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

    public function updateTitle($id){
        $selectedChapter = Chapter::findOrFail($id);
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
                'id' => $selectedChapter->id
            ]);
        }
    }

    public function getNotesOfChapter($id){
        $selectedChapter = Chapter::findOrFail($id);
        return json_encode($selectedChapter->notes);
    }
    
    public function destroy($id){
        $selectedChapter = Chapter::findOrFail($id);
        $selectedChapter->delete();

        return response()->json(['success' => 'Chapter has been successfully deleted']);
    }

}
