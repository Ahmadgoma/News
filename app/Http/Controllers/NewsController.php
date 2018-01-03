<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Validator;
use App\News;
use app\Images;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $news = DB::table('news')->paginate(3);
        
       
        return view('index' , compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $news = DB::table('news')->get();
        return view('create' , compact('news'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('news/create')
                        ->withErrors($validator)
                        ->withInput();
        }
            
        $new_id = DB::table('news')->insertGetId(
            [
                'title' => $request->title,
                'description' => $request->description,
                'author' => $request->author,
                'views' => 0
            ]
        ); 
         
   

            // upload 
        foreach ($request->images as $image) {
           
            
            
                $image_name = time().'.'.$image->getClientOriginalExtension();
                DB::table('images')->insert(
                [
                    'news_id' => $new_id,
                    'image' => $image_name,
                ]
                
                
            ); 
            $image->move(public_path('uploads'),$image_name); 
                
            }

        

        

        return back()->with('status', 'Add successfully ...');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        DB::table('news')
                        ->where('id', $id)
                        ->increment('views');

        $new = DB::table('news')->where('id' , $id)->first();

        $new_images = DB::table('images')->where('news_id' , $id)->get();
        
        return view('showOne' , compact('new' ,'new_images'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $new = DB::table('news')->where('id' , $id)->first();

       // dd($new);
         $new_images = DB::table('images')->where('news_id' , $id)->get();
        
        return view('edit' , compact('new' ,'new_images'));
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
        //
         $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('news/'.$id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        DB::table('news')
                        ->where('id', $id)
                        ->update(
                        [
                        'title' => $request->title,
                        'description' => $request->description,
                        'author' => $request->author,
                        'views' => 0
                        ]
                                ); 

        
        foreach ($request->images as $image) {
            $image_name = time().'.'.$image->getClientOriginalExtension();
             DB::table('images')->insert(
                [
                    'news_id' => $id,
                    'image' => $image_name,
                ]
                                         );  

           
         
            $image->move(public_path('uploads'),$image_name); 
                
            }

               

        


      
        return redirect('news')->with('status', 'Update successfully ...'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::destroy($id);
        return back();
    }
     // search with title
    public function search(Request $request){
        $search = DB::table('news')->where('title','LIKE','%'.$request->input('search')."%")->get();
        return view('search')->with([
            'search'=>$search
        ]);
    }

   // search with date range
      public function searchWithDate(){
        $dateFrom=\request('searchFrom');
        $dateTo=\request('searchTo');
        $search=DB::table('news')->whereBetween('created_at',[$dateFrom,$dateTo])->get();
        return view('search')->with([
            'search'=>$search
        ]);
    }

    public function destroyImg($id)
    {
        DB::table('images')->where('id', '=', $id)->delete();
        return back();
    }


}
