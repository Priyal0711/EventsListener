<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;
use App\Jobs\SendChapterStatusEmail;
use App\Events\ChapterStatusUpdated;


class ChapterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'chapter' => 'required|string|max:255',
        ]);

        $chapter = new Chapter();
        $chapter->chapter = $request->input('chapter');
        $chapter->save();

        return redirect()->route('chapter.show')->with('success', 'Chapter added successfully!');
    }
    public function show()
    {
        $chapter = Chapter::all();
        return view('chapters.index', compact('chapter'));
    }

    public function display($id)
    {
        $chapter = Chapter::find($id);
        return view('chapters.display', compact('chapter'));
    }

    public function edit($id)
    {
        $chapter = Chapter::find($id);
        return view('chapters.edit', compact('chapter'));
    }


    public function update(Request $request, $id)
    {
       
        $chapter = Chapter::findOrFail($id);
        $chapter->update($request->all());
        $chapter->save();
        return redirect()->route('chapter.show')->with('success', 'Chapter updated successfully');
    }

    public function delete($id)
    {
        $chapter = Chapter::findOrFail($id);
        $chapter->delete();
        return redirect()->route('chapter.show')->with('success', 'Chapter deleted successfully');
    }
   
    
    public function enableChapter($id)
    {
        $chapter = Chapter::findOrFail($id);
        $chapter->status = true;
    

        
        $chapter->save();
        return redirect()->back();
    }
    

    
    public function disableChapter($id)
    {
        $chapter = Chapter::findOrFail($id);
        $chapter->status = false;
        $chapter->save();
        return redirect()->back();
    }

    public function status(Request $request){
        
        $chapter = Chapter::findorfail($request->id);
        
        if($chapter->status == true){
            $chapter->status = false;
            $chapter->save();
            // dd($chapter);
            event(new ChapterStatusUpdated($chapter));
        }
        else{
            $chapter->status = true;
            $chapter->save();
            event(new ChapterStatusUpdated($chapter));  
        }
        return redirect()->route('chapter.show');
       
}
}