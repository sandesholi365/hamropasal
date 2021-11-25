<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::orderBy('id','DESC')->get();
        return view('admin.category.index',compact('categories'));
    }

    public function categoryStatus(Request $request)
    {
        if($request->mode=='true'){
            DB::table('categories')->where('id',$request->id)->update(['status'=>'active']);
        }
        else{
            DB::table('categories')->where('id',$request->id)->update(['status'=>'inactive']);
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
        $parent_cats=Category::where('is_parent',1)->orderBy('title','ASC')->get();
        return view('admin.category.create',compact('parent_cats'));
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
            'summary'=>'nullable',
            'is_parent'=>'sometimes|in:1',
            'parent_id'=>'nullable|exists:categories,id',
            'status'=>'nullable|in:active,inactive'
          ]);

          $data=$request->all();
          $slug=Str::slug($request->input('title'));
          $slug_count=Category::where('slug',$slug)->count();
          if($slug_count>0){
              $slug=time().'-'.$slug;
          }
          $data['slug']=$slug;
          $data['is_parent'] = $request->input('is_parent', 0);
          if($request->is_parent==1) {
              $data['parent_id'] = null;
          }
          $status=Category::create($data);
          if($status){
              return redirect()->route('category.index')->with('success','Category created successfully.');
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
        $category=Category::find($id);
        $parent_cats=Category::where('is_parent',1)->orderBy('title','ASC')->get();
       if($category){
           return view('admin.category.edit',compact(['category','parent_cats']));
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
        $category=Category::find($id);
        if($category){
            $this->validate($request,[
                'title'=>'required',
                'summary'=>'nullable',
                'is_parent'=>'sometimes|in:1',
                'parent_id'=>'nullable|exists:categories,id',
                'status'=>'nullable|in:active,inactive'
            ]);
            $data=$request->all();
            if($request->is_parent==1) {
                $data['parent_id'] = null;
            }
            $data['is_parent'] = $request->input('is_parent', 0);
            $status=$category->fill($data)->save();
            if($status){
                return redirect()->route('category.index')->with('success','Category updated successfully.');
            }
            else{
                return back()->with('error','Something went wrong !!!');
            }
        }
        else{
            return back()->with('error','Category not found');
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
        $category=Category::find($id);
        $child_cat_id=Category::where('parent_id',$id)->pluck('id');
        if($category){
            $status=$category->delete();
            if($status){
                if(count($child_cat_id)>0){
                    Category::shiftChild($child_cat_id);
                }
                return redirect()->route('category.index')->with('success','Category deleted successfully.');
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
