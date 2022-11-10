<?php

namespace App\Http\Controllers\API;

use App\Models\Checklist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChecklistController extends Controller
{
    public function index()
    {
        $chkls = Checklist::latest()->get();

        return response()->json([
            'success' => true,
            'msg' => 'List Data Checklist',
            'data' => $chkls
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $chkl = Checklist::create([
            'name' => $request->name
        ]);

        return response()->json([
            'data' => $chkl
        ], 201);
    }

    public function destroy(Checklist $chkl, $id)
    {
        $chkl = Checklist::findOrFail($id);
        
        if ($chkl) {
            $chkl->delete();
        }

        return response()->json([
            'success' => true,
            'message' => 'Delete Data Successfully',
            'data' => $chkl
        ], 200);
    }
}
