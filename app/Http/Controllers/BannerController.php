<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners=Banner::orderBy('id','DESC')->get();
        return view('admin.banner.index',compact('banners'));
    }


    public function bannerStatus(Request $request)
    {
        if($request->mode=='true'){
            DB::table('banners')->where('id',$request->id)->update(['status'=>'active']);
        }
        else{
            DB::table('banners')->where('id',$request->id)->update(['status'=>'inactive']);
        }
        return response()->json(['msg'=>'Status updated successfully','status'=>true]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
        'title'=>'required',
        'description'=>'nullable',
        'photo'=>'required',
        'condition'=>'nullable|in:banner,promo',
        'status'=>'nullable|in:active,inactive',
      ]);
      $data=$request->all();
      $slug=Str::slug($request->input('title'));
      $slug_count=Banner::where('slug',$slug)->count();
      if($slug_count>0){
          $slug=time().'-'.$slug;
      }
      $data['slug']=$slug;
      $status=Banner::create($data);
      if($status){
          return redirect()->route('banner.index')->with('success','Banner created successfully.');
      }
      else{
          return back()->with('error','Something went wrong!!!');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $banner=Banner::find($id);
       if($banner){
           return view('admin.banner.edit',compact('banner'));
       }
       else{
           return back()->with('error','Data not found.');
       }
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
        $banner=Banner::find($id);
       if($banner){
        $this->validate($request,[
            'title'=>'required',
            'description'=>'nullable',
            'photo'=>'required',
            'condition'=>'nullable|in:banner,promo',
            'status'=>'nullable|in:active,inactive',
          ]);
          $data=$request->all();
          $status=$banner->fill($data)->save();
          if($status){
              return redirect()->route('banner.index')->with('success','Banner updated successfully.');
          }
          else{
              return back()->with('error','Something went wrong!!!');
          }

    }
       else{
           return back()->with('error','Data not found.');
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
        $banner=Banner::find($id);
        if($banner){
            $status=$banner->delete();
            if($status){
                return redirect()->route('banner.index')->with('success','Banner deleted successfully.');
            }
            else{
                return back()->with('error','Something not found.');

            }
        }
        else{
            return back()->with('error','Data not found.');
        }
    }
}
