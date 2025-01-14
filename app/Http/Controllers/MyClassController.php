<?php

namespace App\Http\Controllers;

use App\Http\Requests\MyClassStoreRequest;
use App\Models\MyClass;
use App\Services\MyClass\MyClassService;
use Illuminate\Http\Request;

class MyClassController extends Controller
{
    //create public properties
    public $myClass;

    //construct method
    public function __construct(MyClassService $myClass)
    {
        $this->myClass = $myClass;
        $this->authorizeResource(MyClass::class, 'class');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.class.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.class.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MyClassStoreRequest $request)
    {
        $data = $request->except('_token');
        $this->myClass->createClass($data);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(MyClass $class)
    {
        $data['class'] = $class;

        return view('pages.class.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(MyClass $class)
    {
        $data['myClass'] = $class;

        return view('pages.class.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MyClassStoreRequest $request, MyClass $class)
    {
        $data = $request->except('_token', '_method');
        $this->myClass->updateClass($class, $data);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MyClass $class)
    {
        $this->myClass->deleteClass($class);

        return back();
    }
}
