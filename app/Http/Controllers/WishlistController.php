<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $wishlist = Wishlist::where("user_id", "=", $user->id)->orderby('id', 'desc')->paginate(10);
        return view('wishlist.index', compact('user', 'wishlist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = Wishlist::where('user_id', Auth::user()->id)
        ->where('job_id',$request->job_id)
        ->first();

        if(isset($status->user_id) and isset($request->job_id)){
            return redirect('jobs')->with('message', 'This item is already in your wishlist');
        }else{
            $wishlist = new Wishlist();
            $wishlist->user_id = $request->user_id;
            $wishlist->job_id = $request->job_id;
            $wishlist->save();
            return redirect('jobs')->with('message','Item Added to the wishlist');
        }
    }

    /**
     * Display the specified resource.a
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
