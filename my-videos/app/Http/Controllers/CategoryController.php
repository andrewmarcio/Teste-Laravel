<?php

namespace App\Http\Controllers;

use App\Category;
use App\FavoriteCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('category.categories', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $user_id = Auth::user()->id;
        
        try {

            DB::beginTransaction();

            $createdCategory = Category::create([
                'user_id' => $user_id,
                'name' => $request->category_name
            ]);

            if ($createdCategory) {
                $message = 'Category successfully registered.';
            }

            if(filter_var($request->favorite_category, FILTER_VALIDATE_BOOLEAN)){
                $createFavoriteCategory = FavoriteCategory::create([
                    'user_id' => $user_id,
                    'category_id' => $createdCategory->id
                ]);

                if ($createFavoriteCategory) {
                    $message = 'Category successfully registered and favored.';
                }
            }

            DB::commit();

            return redirect()->back()->with('message', $message);
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
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
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}