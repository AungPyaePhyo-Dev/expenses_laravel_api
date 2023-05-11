<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpenseRequest;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Expense::get();
        return response()->json([
            'status' => '200',
            'con' => true,
            'msg' => 'success',
            'data' => $data
        ]);
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
    public function store(ExpenseRequest $request)
    {
        
       $data =  Expense::create($request->all());
        if($data) {
            return response()->json([
                'status' => '200',
                'con' => true,
                'msg' => 'Successfully created expense item'
            ]);
        }else {
            return response()->json([
                'status' => '500',
                'con' => false,
                'msg' => 'Something went wrong'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Expense::find($id);
        if($data) {
            return response()->json([
                'status' => '200',
                'con' => true,
                'data' => $data
            ], 200);
        }else {
            return response()->json([
                'status' => '404',
                'con' => false,
                'msg' => 'No data found with that id'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Expense::where('id', $id)->update($request->all());
        if($data) {
            return response()->json([
                'status' => '200',
                'con' => true,
                'msg' => 'Successfully updated expense item'
            ]);
        } else {
            return response()->json([
                'status' => '500',
                'con' => false,
                'msg' => 'Something went wrong'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Expense::where('id', $id)->delete();

        if($data) {
            return response()->json([
                'status' => '200',
                'con' => true,
                'msg' => 'Successfully deleted expense item'
            ]);
        }else {
            return response()->json([
                'status' => '404',
                'con' => false,
                'msg' => 'No data found with that id'
            ]);
        }
        
    }
}
