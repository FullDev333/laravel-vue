<?php
namespace App\Http\Controllers\Backend;

use App\Servers\Backend\AdminServer;
use Illuminate\Http\Request;

class AdminController extends CommonController
{

    public function __construct(AdminServer $adminServer)
    {
        parent::__construct();
        $this->server = $adminServer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $input  = json_decode($request->input('data'), true);
        $result = $this->server->index($input);
        return $this->responseResult($result);
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
        $input  = $request->input('data');
        $result = $this->server->store($input);
        return $this->responseResult($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = $this->server->show($id);
        return $this->responseResult($result);
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
        $input  = $request->input('data');
        $result = $this->server->update($id, $input);
        return $this->responseResult($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->server->destroy($id);
        return $this->responseResult($result);
    }

    /*
     * 获取options
     */
    public function options()
    {
        $result = $this->server->getOptions();
        return $this->responseResult($result);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function out(Request $request)
    {
        $input  = json_decode($request->input('data'), true);
        $result = $this->server->out($input);
        return $this->responseResult($result);
    }

    /**
     * 改变状态
     */
    public function changeFieldValue($id, Request $request)
    {
        $input  = $request->input('data');
        $result = $this->server->changeFieldValue($id, $input);
        return $this->responseResult($result);
    }
}
