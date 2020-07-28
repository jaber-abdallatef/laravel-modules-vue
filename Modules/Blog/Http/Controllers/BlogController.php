<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use  Modules\Blog\Http\Entities\Blog ; 
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('blog::index');
    }


    public function getAll()
    {
          $blogs = Blog::paginate(10); 
          return array('data' => $blogs , 'status' => 1)  ; 
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('blog::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
        $blog = Blog::create($request->all()) ;     
        return $blog ; 
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('blog::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('blog::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
         $blog = Blog::find($id) ; 
         $blog->update($request->all()) ;
         return array('message' => "Blog Has Been Updated Successfully" , 'status' => 1)  ; 
        
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $blog = Blog::find($id) ;     
        $blog->delete();
        return array('message' => "Blog Has Been Deleted Successfully" , 'status' => 1)  ; 
    }
}
