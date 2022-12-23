<?php

namespace App\Http\Controllers;

use App\Models\VideoClub;
use Illuminate\Http\Request;

class VideoClubController extends Controller
{
  
    public function index()
    {
        return VideoClub::all();
    }

    public function show($id){
        $video_club = VideoClub::find($id);
        return $video_club;

    }

    public function store(Request $request){

    try{
        $request->validate([
            'title' => 'required',
            'description' =>'required',
            'director' => 'required',
        ]);
    }catch (\Throwable $th){
        return response()->json(['error' => $th->getMessage()],400);
    }
       
        $VideoClub = VideoClub::create([
            'title' => $request->title,
            'description' => $request->description,
            'director' => $request->director
        ]);
        return $VideoClub;
    }
    
    public function update(Request $request, $id){
        try{
            $request->validate([
                'title' =>'required',
                'description' =>'required',
                'director' =>'required',
            ]);
        }
        catch (\Throwable $th){
            return response()->json(['error' => $th->getMessage()],400);
        }

        VideoClub::find($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'director' => $request->director
        ]);
        return 'actualizacion okkkkkkkkkkkkkkkkk';
    }

    public function destroy($id){
        VideoClub::find($id)->delete();

        return response()->json(['success' => 'peli eliminada'], 200);
    }
    
}
