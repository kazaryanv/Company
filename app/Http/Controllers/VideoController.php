<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video = Video::all();
        return view('admin.video.video',compact('video'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.video.new_video");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('video')){
            $path =$request->file('video')->store('video', 'public');
            $logo =$request->file('picture')->store('picture', 'public');
            $store = Video::create([
                'video' => $path,
                'picture' => $logo,
                'name' => $request->name,
                'content' => $request['content'],
                ]);
            if ($store){
                return redirect()->route('video.index')->with('success', 'Video created successfully');
            }else{
                return redirect()->route(back())->with('fail', 'fail');
            }
        }
        else{
            $logo =$request->file('picture')->store('picture', 'public');
            $store = Video::create([
                'picture' => $logo,
                'name' => $request->name,
                'content' => $request['content'],
            ]);
            if ($store){
                return redirect()->route('video.index')->with('success', 'Company created successfully');
            }else{
                return redirect()->route(back())->with('fail', 'fail');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        return view('admin.video.one_video',['video'=> $video]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('admin.video.new_video',['video'=> $video]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $users = Video::query()->findOrFail($id);
        $users->video = $request->input('video');
        $users->picture = $request->input('picture');
        $users->name = $request->input('name');
        $users->content = $request->input('content');

        if ($request->hasfile('video','picture')) {
            if ($video = $users->video){
               $dell = Storage::disk('public')->delete($video);
                if ($dell){
                    $picture = $users->picture;
                    Storage::disk('public')->delete($picture);
                }else{
                    $picture = $users->picture;
                    Storage::disk('public')->delete($picture);
                }
            }
            $file = $request->file('video');
            $picture = $request->file('picture');
            $extension = $request->video->getClientOriginalExtension();
            $ex = $request->video->getClientOriginalExtension();
            $VideoName = uniqid() . '.' . $extension;
            $PicturName = uniqid() . '.' . $ex;
            $filepath = public_path('storage/'.$VideoName);
            $fp = public_path('storage/'.$PicturName);
            $file->move(public_path().'/storage/',$VideoName);
            $picture->move(public_path().'/storage/',$PicturName);
            $dataone = $VideoName;
            $datatwo = $PicturName;
            $users->video = $dataone;
            $users->video = $datatwo;
        }
        if ($users->save()) {
            return redirect()->route('video.index')->with('success', 'Row successfully created');
        }else{
            return redirect()->route(back())->with('fail', 'fail');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete =  Video::query()->findOrFail($id);
        try{
            $file_name = $delete->video;
            $picture_name = $delete->picture;
            $file_path = public_path('storage/'.$file_name);
            $picture_path = public_path('storage/'.$picture_name);
            unlink($file_path);
            unlink($picture_path);
        }catch (\Throwable $e){

        }
        $delete->delete();
        if($delete->delete()) {
            return redirect()->route('video.index')->with('success','Deleted successfully');
        } else {
            return redirect()->route('video.index')->with('success','Deleted file');
        }
    }

}
