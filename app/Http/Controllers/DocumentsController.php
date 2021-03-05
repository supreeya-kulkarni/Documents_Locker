<?php

namespace App\Http\Controllers;

use App\documents;
use Illuminate\Http\Request;
use ZipArchive;
use File;

class DocumentsController extends Controller
{

    /*public function show(documents $documents)
    {
       return view('layouts.show_documents')->with('docArr', documents::all());
    }*/

     public function create(documents $documents)
    {
       
       return view('layouts.add_documents')->with('docArr', documents::all());
    }

    public function store(Request $req, documents $documents)
    {

        $req->validate([      
        'title' => 'required|unique:documents|max:50',
        'description' => 'required',     
        'file' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf,zip|max:2048'
        ]);

         $fileModel = new documents;

        if($req->hasFile('file')) {
            $fileTitle = $req->get('title');
            $fileDescriprtion = $req->get('description');
            $filePath = $req->file->storeAs('uploads', $fileTitle, 'public');

            $fileModel->title = $req->get('title');
            $fileModel->description = $req->get('description');
            $fileModel->file_path = config('app.url').'/storage/' . $filePath;
            $fileModel->save();

            $req->session()->flash('msg', 'Documents Submitted');
            return redirect('add_documents');
        }

   }

    public function edit(documents $documents, Request $req)
    {
        $obj = documents::find($req->id);        
        return view('layouts.edit_documents')->with('docArr',$obj);
    }

    public function update(Request $request, documents $documents)
    {
        $fileModel = documents::find($request->id);

        if($req->hasFile('file')) {
            $fileTitle = $req->get('title');
            $fileDescriprtion = $req->get('description');
            $filePath = $req->file->storeAs('uploads', $fileTitle, 'public');

            $fileModel->title = $req->get('title');
            $fileModel->description = $req->get('description');
            $fileModel->file_path = config('app.url').'/storage/' . $filePath;
            $fileModel->save();

            $request->session()->flash('msg', 'Documents Submitted');
            return redirect('add_documents');
        }
    }

    public function destroy(documents $documents, $id)
    {
        documents::destroy('id', $id);  
        return redirect('add_documents');
    }

   /*public function downloadZipFile()
   {
        $zip= new ZipArchive;

        $filename = 'myzip.zip';
        if ($zip->open(public_path('$filename'),ZipArchive::CREATE)==TRUE) 
        {
            $files = File::files(public_path('myfiles'));
            foreach ($files as $key => $value) {
                $relativeName = basename($value);
                $zip->addFile($value, $relativeName);
            }
            $zip->close();
        }
        return response()->download(public_path($filename));

   }*/

    
}
