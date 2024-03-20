<?php

namespace App\Http\Controllers\chat;

use App\Http\Controllers\Controller;
use App\Models\Knowledge;
use Illuminate\Http\Request;

class CheckKnowledgeController extends Controller
{
    public function Edit_checkKnowledge($id)
    {
        $title = Knowledge::findOrFail($id);
        return view('backend.chatbot.check_edit', ['title' => $title]);
    }


    public function Update_CheckKnowledge(Request $request, $id)
    {
        // Retrieve the existing ChatData record
        $knowledges = Knowledge::findOrFail($id);

        // Update the fields
        $knowledges->title = $request->input('title');
        $knowledges->short_description = $request->input('short_description');
        $knowledges->description = $request->input('description');

        // Save the changes
        $knowledges->save();

        $notification = [
            'message' => 'Chat Knowledge Updated Successfully',
            'alert-type' => 'success',
        ];

        // Redirect with success message
        return redirect()->route('check.knowledge')->with($notification);
    }
}
