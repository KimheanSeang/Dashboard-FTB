<?php

namespace App\Http\Controllers\doc;

use App\Http\Controllers\Controller;
use App\Models\RecoveryFile;
use Illuminate\Http\Request;
use App\Models\UploadFile;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\IOFactory as SpreadsheetIOFactory;
use PhpOffice\PhpWord\IOFactory as PhpWordIOFactory;
use PhpOffice\PhpWord\Element\TextRun;
use PhpOffice\PhpWord\Element\Text;
use PhpOffice\PhpWord\Element\Table;


class DocumentController extends Controller
{

    public function AllDoc()
    {
        return view('backend.doc.all_doc');
    }
    public function AddDoc()
    {
        return view('backend.doc.add_doc');
    }
    public function AllReport()
    {
        $filenames = RecoveryFile::latest()->get();
        return view('backend.doc.report_doc', ['filenames' => $filenames]);
    }
    public function create()
    {
        return view('upload.create');
    }
    public function AllFile()
    {
        $filenames = UploadFile::latest()->get();
        return view('backend.doc.all_doc', ['filenames' => $filenames]);
    }

    public function ApproveDoc()
    {
        $filenames = Document::latest()->get();
        return view('backend.doc.approve_doc', ['filenames' => $filenames]);
    }
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file1' => 'nullable|array',
            'file1.*' => 'file|mimes:pdf,doc,docx,xls,xlsx,txt,php,html,js,css,java|max:2048', // Updated list of allowed file types and max size
        ], [
            'file1.*.max' => 'One or more files exceed the maximum allowed size of 2MB.'
        ]);

        // Retrieve the currently authenticated user
        $user = Auth::user();



        // Handle file upload if files are provided
        if ($request->hasFile('file1')) {
            $files = $request->file('file1');

            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();

                // Store the file to the specified directory
                $file->storeAs('/public/upload/document/', $filename);

                // Store file details in the database along with the username
                $uploadedFile = new Document();
                $uploadedFile->filename = $filename;
                $uploadedFile->title = $request->title;
                $uploadedFile->description = $request->description;
                $uploadedFile->uploaded_by = $user ? $user->name : 'Anonymous';
                $uploadedFile->save();
            }
        } else {
            $uploadedFile = new Document();
            $uploadedFile->title = $request->title;
            $uploadedFile->description = $request->description;
            $uploadedFile->uploaded_by = $user ? $user->name : 'Anonymous';
            $uploadedFile->save();
        }

        // Set success message
        $notification = array(
            'message' => 'File(s) uploaded successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }


    // public function store(Request $request)
    // {
    //     // Validate the incoming request data
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'description' => 'nullable|string',
    //         'file1' => 'nullable|array',
    //         'file1.*' => 'file|mimes:pdf,doc,docx,xls,xlsx,txt,php,html,js,css,java|max:2048', // Updated list of allowed file types
    //     ]);


    //     // Retrieve the currently authenticated user
    //     $user = Auth::user();

    //     // Handle file upload if files are provided
    //     if ($request->hasFile('file1')) {
    //         $files = $request->file('file1');

    //         foreach ($files as $file) {
    //             $filename = $file->getClientOriginalName();


    //             // Store the file to the specified directory
    //             $file->storeAs('/public/upload/document/', $filename);

    //             // Store file details in the database along with the username
    //             $uploadedFile = new Document();
    //             $uploadedFile->filename = $filename;
    //             $uploadedFile->title = $request->title;
    //             // $uploadedFile->description = strip_tags($request->description);
    //             $uploadedFile->description = $request->description;
    //             $uploadedFile->uploaded_by = $user ? $user->name : 'Anonymous';
    //             $uploadedFile->save();
    //         }
    //     } else {
    //         $uploadedFile = new Document();
    //         $uploadedFile->title = $request->title;
    //         $uploadedFile->description = $request->description;
    //         // $uploadedFile->description = strip_tags($request->description);
    //         $uploadedFile->uploaded_by = $user ? $user->name : 'Anonymous';
    //         $uploadedFile->save();
    //     }
    //     $notification = array(
    //         'message' => 'File(s) uploaded successfully',
    //         'alert-type' => 'success',
    //     );

    //     return redirect()->back()->with($notification);
    // }

    public function ApproveDocument($id)
    {
        // Retrieve the file details before deleting
        $uploadFile = Document::findOrFail($id);

        // Store the file details in the recovery table
        UploadFile::create([
            'filename' => $uploadFile->filename,
            'delete_by' => Auth::user()->name, // Assuming you have authentication set up
            'title' => $uploadFile->title,
            'description' => $uploadFile->description,
            'uploaded_by' => $uploadFile->uploaded_by,
        ]);

        // Now, delete the file
        $uploadFile->delete();

        $notification = [
            'message' => 'Document Approve Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }



    public function EditDoc($id)
    {
        $filenames = UploadFile::findOrFail($id);
        return view('backend.doc.edit_doc', ['filenames' => $filenames]);
    }
    public function UpdateDoc(Request $request, $id)
    {
        // Retrieve the existing UploadFile record
        $uploadFile = UploadFile::findOrFail($id);

        // Update only the title and description fields
        $uploadFile->title = $request->title;
        $uploadFile->description = $request->description;
        // $uploadFile->description = strip_tags($request->description);

        // Save the changes
        $uploadFile->save();

        $notification = [
            'message' => 'Title and Description Updated Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.doc')->with($notification);
    }

    public function EditDocument($id)
    {
        $filenames = Document::findOrFail($id);
        return view('backend.doc.edit_approve', ['filenames' => $filenames]);
    }
    public function UpdateDocument(Request $request, $id)
    {
        // Retrieve the existing UploadFile record
        $uploadFile = Document::findOrFail($id);

        // Update only the title and description fields
        $uploadFile->title = $request->title;
        // $uploadFile->description = $request->description;
        $uploadFile->description = strip_tags($request->description);

        // Save the changes
        $uploadFile->save();

        $notification = [
            'message' => 'Title and Description Updated Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('approve.doc')->with($notification);
    }



    public function DeleteDoc($id)
    {
        // Retrieve the file details before deleting
        $uploadFile = UploadFile::findOrFail($id);

        // Store the file details in the recovery table
        RecoveryFile::create([
            'filename' => $uploadFile->filename,
            'delete_by' => Auth::user()->name, // Assuming you have authentication set up
            'title' => $uploadFile->title,
            'description' => $uploadFile->description,
            'uploaded_by' => $uploadFile->uploaded_by,
        ]);

        // Now, delete the file
        $uploadFile->delete();

        $notification = [
            'message' => 'File deleted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('all.doc')->with($notification);
    }


    public function ShowDoc($id)
    {
        $data = UploadFile::findOrFail($id); // Replace YourModel with your actual model name
        return view('backend.doc.show_doc', compact('data'));
    }


    public function ViewDoc($id)
    {
        $data = Document::findOrFail($id); // Replace YourModel with your actual model name
        return view('backend.doc.view_doc', compact('data'));
    }
    public function viewFile($id)
    {
        $file = UploadFile::findOrFail($id);
        $filePath = storage_path('app/public/upload/document/' . $file->filename);

        // Check if the file exists
        if (file_exists($filePath)) {
            // Check the file extension
            $extension = pathinfo($filePath, PATHINFO_EXTENSION);

            if ($extension === 'pdf') {
                // For PDF files, display it using the embedded PDF viewer
                $fileContents = file_get_contents($filePath);
                return view('view_pdf')->with([
                    'fileContents' => base64_encode($fileContents),
                ]);
            } elseif (in_array($extension, ['doc', 'docx'])) {
                // For Word documents, convert to HTML
                $phpWord = PhpWordIOFactory::load($filePath);
                $htmlContents = '';

                // Loop through sections
                foreach ($phpWord->getSections() as $section) {
                    // Loop through elements in each section
                    foreach ($section->getElements() as $element) {
                        // Handle different element types
                        if ($element instanceof TextRun) {
                            // Text run (e.g., bold, italic)
                            foreach ($element->getElements() as $text) {
                                if ($text instanceof Text) {
                                    $htmlContents .= $text->getText();
                                }
                            }
                        } elseif ($element instanceof Text) {
                            // Plain text
                            $htmlContents .= $element->getText();
                        } elseif ($element instanceof Table) {
                            // Table
                            $htmlContents .= '<table>';
                            foreach ($element->getRows() as $row) {
                                $htmlContents .= '<tr>';
                                foreach ($row->getCells() as $cell) {
                                    $htmlContents .= '<td>' . $cell->getElements()[0]->getText() . '</td>';
                                }
                                $htmlContents .= '</tr>';
                            }
                            $htmlContents .= '</table>';
                        }
                    }
                }

                return view('view_word')->with([
                    'htmlContents' => $htmlContents,
                ]);
            } elseif (in_array($extension, ['xls', 'xlsx'])) {
                // For Excel files, read the content and display as HTML
                $spreadsheet = SpreadsheetIOFactory::load($filePath);
                $htmlContents = '<table>';
                foreach ($spreadsheet->getActiveSheet()->getRowIterator() as $row) {
                    $htmlContents .= '<tr>';
                    foreach ($row->getCellIterator() as $cell) {
                        $htmlContents .= '<td>' . $cell->getValue() . '</td>';
                    }
                    $htmlContents .= '</tr>';
                }
                $htmlContents .= '</table>';
                return view('view_excel')->with([
                    'htmlContents' => $htmlContents,
                ]);
            } elseif ($extension === 'txt') {
                // For text files, directly read and display the content
                $fileContents = file_get_contents($filePath);
                return view('view_text')->with([
                    'fileContents' => $fileContents,
                ]);
            } else {
                // For unsupported file types, display an error message
                return back()->with('error', 'File type not supported for inline viewing.');
            }
        } else {
            // File not found, return an error response or redirect back with a message
            return back()->with('error', 'File not found.');
        }
    }


    public function viewFileDocument($id)
    {
        $file = Document::findOrFail($id);
        $filePath = storage_path('app/public/upload/document/' . $file->filename);

        // Check if the file exists
        if (file_exists($filePath)) {
            // Check the file extension
            $extension = pathinfo($filePath, PATHINFO_EXTENSION);

            if ($extension === 'pdf') {
                // For PDF files, display it using the embedded PDF viewer
                $fileContents = file_get_contents($filePath);
                return view('view_pdf')->with([
                    'fileContents' => base64_encode($fileContents),
                ]);
            } elseif (in_array($extension, ['doc', 'docx'])) {
                // For Word documents, convert to HTML
                $phpWord = PhpWordIOFactory::load($filePath);
                $htmlContents = '';

                // Loop through sections
                foreach ($phpWord->getSections() as $section) {
                    // Loop through elements in each section
                    foreach ($section->getElements() as $element) {
                        // Handle different element types
                        if ($element instanceof TextRun) {
                            // Text run (e.g., bold, italic)
                            foreach ($element->getElements() as $text) {
                                if ($text instanceof Text) {
                                    $htmlContents .= $text->getText();
                                }
                            }
                        } elseif ($element instanceof Text) {
                            // Plain text
                            $htmlContents .= $element->getText();
                        } elseif ($element instanceof Table) {
                            // Table
                            $htmlContents .= '<table>';
                            foreach ($element->getRows() as $row) {
                                $htmlContents .= '<tr>';
                                foreach ($row->getCells() as $cell) {
                                    $htmlContents .= '<td>' . $cell->getElements()[0]->getText() . '</td>';
                                }
                                $htmlContents .= '</tr>';
                            }
                            $htmlContents .= '</table>';
                        }
                    }
                }

                return view('view_word')->with([
                    'htmlContents' => $htmlContents,
                ]);
            } elseif (in_array($extension, ['xls', 'xlsx'])) {
                // For Excel files, read the content and display as HTML
                $spreadsheet = SpreadsheetIOFactory::load($filePath);
                $htmlContents = '<table>';
                foreach ($spreadsheet->getActiveSheet()->getRowIterator() as $row) {
                    $htmlContents .= '<tr>';
                    foreach ($row->getCellIterator() as $cell) {
                        $htmlContents .= '<td>' . $cell->getValue() . '</td>';
                    }
                    $htmlContents .= '</tr>';
                }
                $htmlContents .= '</table>';
                return view('view_excel')->with([
                    'htmlContents' => $htmlContents,
                ]);
            } elseif ($extension === 'txt') {
                // For text files, directly read and display the content
                $fileContents = file_get_contents($filePath);
                return view('view_text')->with([
                    'fileContents' => $fileContents,
                ]);
            } else {
                // For unsupported file types, display an error message
                return back()->with('error', 'File type not supported for inline viewing.');
            }
        } else {
            // File not found, return an error response or redirect back with a message
            return back()->with('error', 'File not found.');
        }
    }

    public function AllDocument()
    {
        return view('backend.document.document');
    }


    public function ApproveDelete($id)
    {
        Document::findOrFail($id)->delete();
        $notification = array(
            'message' => 'File in Recover Delete Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
