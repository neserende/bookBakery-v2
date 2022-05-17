<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Book;
use App\Models\Note;
use Validator;
use Exception;

class ChapterController extends Controller
{
    public function index(){
        //
    }

    public function store(Request $request, $bookID){
        try{
            $validator = Validator::make($request->all, [
                'title' => 'required',
                'body' => 'required'
            ]);

            if(!$validator->passes()){
                return response()->json([('status')=> 0, 'error' => $validator->errors()->toArray()]);
            } 
            
            else {
                $chapter = Chapter::create([
                    'book_id' => $bookID,
                    'title' => $request->title,
                    'body' => $request->body
                ]);

                return response()->json([
                    'status' => 1,
                    'chapter_title' => $chapter->title, 
                    'chapter_id' =>  $chapter->chapter_id
                ]);
            }

        } catch(Exception $e){
            dd($e);
        }
    }

    public function getChapter($id){
        $selectedChapter = Chapter::findOrFail($id);
        return $selectedChapter;
    }

    public function updateBody($book_id, $chapter_id){
        $selectedChapter = Chapter::findOrFail($chapter_id);
        $validator = Validator::make(request()->all(), [
            'body' => 'required',
        ]);

        if(!$validator->passes()){
            return response()->json([('status')=> 0, 'error' => $validator->errors()->toArray()]);
        } 

        else{
            $selectedChapter->body = request()->input('body');

            $selectedChapter->save();

            return response()->json([
                'status' => 1,
                'id' => $selectedChapter->id
            ]);
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
