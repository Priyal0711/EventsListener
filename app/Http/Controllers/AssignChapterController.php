<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Subject;
use Illuminate\Http\Request;

class AssignChapterController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        $chapters = Chapter::all();

        return view('assign_chapters.index', compact('subjects', 'chapters'));
    }

    public function assign(Request $request)
    {
        $subjectId = $request->input('subject');
        $chapterId = $request->input('chapters');

        $subject = Subject::find($subjectId);
        $subject->chapters()->syncWithoutDetaching($chapterId);

        return redirect()->route('assign_chapter.show')->with('success', 'Chapter assigned successfully.');
    }
  
    public function assignChapter($id)
    {
        $chapter = Chapter::findOrFail($id);
    
        return redirect()->back()->with('success', 'Chapter assigned successfully.');
    }

}
