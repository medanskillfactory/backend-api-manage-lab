<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\V1\User\Store;
use App\Http\Requests\Api\V1\User\Update;
use App\User;

class UserController extends Controller
{
    protected $model;
    public function __construct()
    {
        $this->model = new User;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $this->model;
        if ($request->has('email') && trim($request->email) !== '') {
            $user = $user->where('email', 'Like', '%'.$request->email.'%');
        }
        if ($request->has('name') && trim($request->name) !== '') {
            $user = $user->where('name', 'Like', '%'.$request->name.'%');
        }
        if ($request->has('order') && in_array($request->input('order'), ['name', 'email', 'created_at'])) {
            $user = $user->orderBy($request->input('order'), $request->input('ascending')? 'ASC' : 'DESC');
        } else {
            $user = $user->orderBy('created_at', 'DESC');
        }
        $user = $user->paginate($request->has('limit') ? $request->limit : 25);
        return response()->json($user);
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
    public function store(Store $request)
    {
        \DB::beginTransaction();
		try{
            $data = $this->model->create($request->only($this->model->getFillable()));
            \DB::commit();
			return response()->json($data);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            \DB::rollback();
			return response()->json([
				'errors' => 'Data not found',
			], 404);
        } catch(\Exception $e){
            \DB::rollback();
			return response()->json([
				'errors' => $e->getMessage(),
			], in_array($e->getCode(), config('app.common_http_errors'))? $e->getCode() : 500);
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
        try{
            return $this->model->findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
			return response()->json([
				'errors' => 'Data not found',
			], 404);
        } catch(\Exception $e){
			return response()->json([
				'errors' => $e->getMessage(),
			], in_array($e->getCode(), config('app.common_http_errors'))? $e->getCode() : 500);
        }
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
    public function update(Update $request, $id)
    {
        \DB::beginTransaction();
		try{
            $data = $this->model->findOrFail($id);
            $data->update($request->only($this->model->getFillable()));
            \DB::commit();
			return response()->json($data);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            \DB::rollback();
			return response()->json([
				'errors' => 'Data not found',
			], 404);
        } catch(\Exception $e){
            \DB::rollback();
			return response()->json([
				'errors' => $e->getMessage(),
			], in_array($e->getCode(), config('app.common_http_errors'))? $e->getCode() : 500);
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
        \DB::beginTransaction();
		try{
            $data = $this->model->findOrFail($id);
            $data->delete();
            \DB::commit();
            return response()->json('Delete successfully');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            \DB::rollback();
			return response()->json([
				'errors' => 'Data not found',
			], 404);
        } catch(\Exception $e){
            \DB::rollback();
            return redirect()->back()->with('error_msg', $e->getMessage() );
        }
    }
}
