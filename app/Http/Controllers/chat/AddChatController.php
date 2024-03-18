<?php

namespace App\Http\Controllers\chat;

use App\Http\Controllers\Controller;
use App\Models\ChatData;
use App\Models\Knowledge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddChatController extends Controller
{
    public function AddChatbot()
    {
        return view('backend.chatbot.add_chat');
    }
    public function KnowledgeChat()
    {
        $titles = ChatData::latest()->get();
        return view('backend.chatbot.knowledge', ['titles' => $titles]);
    }


    public function CheckKnowledge()
    {
        $knowledge = Knowledge::latest()->get();
        return view('backend.chatbot.check_knowledge', ['knowledge' => $knowledge]);
    }

    public function View_Chatbot($id)
    {
        $data = Knowledge::findOrFail($id); // Replace YourModel with your actual model name
        return view('backend.chatbot.view_knowledge', compact('data'));
    }


    public function StoreChatbot(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'description' => 'required',
        ]);

        // Create a new ChatData instance
        $chatData = new Knowledge();
        $chatData->title = $request->input('title');
        $chatData->short_description = $request->input('short_description');
        $chatData->description = $request->input('description');

        // $chatData->description = $request->input('description');

        // Save the chat data
        $chatData->save();
        $notification = array(
            'message' => 'Knowledge Chatbot Save Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('add.chatbot')->with($notification);
    }

    public function DeleteKnowledge($id)
    {
        ChatData::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Chat Knowledge Delete Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function EditKnowledge($id)
    {
        $title = ChatData::findOrFail($id);
        return view('backend.chatbot.edit_knowledge', ['title' => $title]);
    }


    public function UpdateKnowledge(Request $request, $id)
    {
        // Retrieve the existing ChatData record
        $chatData = ChatData::findOrFail($id);

        // Update the fields
        $chatData->title = $request->input('title');
        $chatData->short_description = $request->input('short_description');
        $chatData->description = $request->input('description');

        // Save the changes
        $chatData->save();

        $notification = [
            'message' => 'Chat Knowledge Updated Successfully',
            'alert-type' => 'success',
        ];

        // Redirect with success message
        return redirect()->route('knowledge.chatbot')->with($notification);
    }

    public function Delete($id)
    {
        Knowledge::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Chat Knowledge  Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function ApproveKnowledge($id)
    {
        // Retrieve the file details before deleting
        $chatData = Knowledge::findOrFail($id);

        // Store the file details in the recovery table
        ChatData::create([
            'title' => $chatData->title,
            'description' => $chatData->description,
            'short_description' => $chatData->short_description,
        ]);

        // Now, delete the file
        $chatData->delete();

        $notification = [
            'message' => 'Chat Knowledge Approve Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }
}
