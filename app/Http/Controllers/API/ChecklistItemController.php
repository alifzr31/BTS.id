<?php

namespace App\Http\Controllers\API;

use App\Models\ChecklistItem;
use App\Http\Controllers\Controller;
use App\Models\Checklist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChecklistItemController extends Controller
{
    public function index(ChecklistItem $chitem, $id)
    {
        $chitem = ChecklistItem::latest()->where('checklist_id', '=', $id);

        return response()->json([
            'data' => $chitem
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'itemName'   => 'required',
            'checklist_id' => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $chitem = ChecklistItem::create([
            'itemName' => $request->itemName,
            'checklist_id' => $request->checklist_id
        ]);

        return response()->json([
            'data' => $chitem
        ], 201);
    }
}
