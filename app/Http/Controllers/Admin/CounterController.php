<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Counter;
use Illuminate\Http\Request;

class CounterController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {
        $model = str_slug('counter','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $counter = Counter::where('title', 'LIKE', "%$keyword%")
                ->orWhere('end_time', 'LIKE', "%$keyword%")
                ->orWhere('c_Options', 'LIKE', "%$keyword%")
                ->orWhere('t_Options', 'LIKE', "%$keyword%")
                ->orWhere('notes', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $counter = Counter::paginate($perPage);
            }

            return view('counter.index', compact('counter'));
        }
        return response(view('403'), 403);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = str_slug('counter','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('counter.create');
        }
        return response(view('403'), 403);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $model = str_slug('counter','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {

            $requestData = $request->all();

            Counter::create($requestData);
            return redirect('counter')->with('flash_message', 'Counter added!');
        }
        return response(view('403'), 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $model = str_slug('counter','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $counter = Counter::findOrFail($id);
            return view('counter.show', compact('counter'));
        }
        return response(view('403'), 403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $model = str_slug('counter','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $counter = Counter::findOrFail($id);
            return view('counter.edit', compact('counter'));
        }
        return response(view('403'), 403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $model = str_slug('counter','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {

            $requestData = $request->all();

            $counter = Counter::findOrFail($id);
             $counter->update($requestData);

             return redirect('counter')->with('flash_message', 'Counter updated!');
        }
        return response(view('403'), 403);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $model = str_slug('counter','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Counter::destroy($id);

            return redirect('counter')->with('flash_message', 'Counter deleted!');
        }
        return response(view('403'), 403);

    }

    /**
     * This will provide link to the page
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function getLink($id)
    {
        # code...
    }

    /**
     * This will return html page
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function getPage($id)
    {
        # code...
    }
}
