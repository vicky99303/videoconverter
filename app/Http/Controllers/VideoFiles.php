<?php

namespace App\Http\Controllers;

use App\Models\VideoFileModel;
use Illuminate\Http\Request;

class VideoFiles extends Controller
{
    public function createForm()
    {

        return view('fileupload');
    }

    public function fileUpload(Request $req)
    {
        $req->validate([
            'file' => 'required|mimes:mp4'
        ]);

        $fileModel = new VideoFileModel;

        if ($req->file()) {
            $fileName = time() . '_' . $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');

            $fileModel->name = time() . '_' . $req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();

            return back()
                ->with('success', 'File has been uploaded.')
                ->with('file', $fileName);
        }
    }
}
