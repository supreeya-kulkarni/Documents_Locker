<?php

namespace App\Http\Controllers;

use App\ZipDocuments;
use Illuminate\Http\Request;
use ZipArchive;

class ZipDocumentsController extends Controller
{
    public function index(Request $request)
    {
        
        /*if($request->has('download')) {
            // Define Dir Folder
            $public_dir=public_path();
            // Zip File Name
            $zipFileName = 'AllDocuments.zip';
            // Create ZipArchive Obj
            $zip = new ZipArchive;
            if ($zip->open($public_dir . '/' . $zipFileName, ZipArchive::CREATE) === TRUE)
            {
                // Add File in ZipArchive
                $zip->addFile(file_path,'file_name');
                // Close ZipArchive     
                $zip->close();
            }
            // Set Header
            $headers = array(
                'Content-Type' => 'application/octet-stream',
            );
            $filetopath=$public_dir.'/'.$zipFileName;
            // Create Download Response
            if(file_exists($filetopath)){
                return response()->download($filetopath,$zipFileName,$headers);
            }
        }*/
        
    }


    public function create()
    {
        return view('layouts.add_zip_documents')->with('zipdocArr', ZipDocuments::all());
    }

    public function store(Request $request)
    {
    
    }

   public function show(ZipDocuments $zipDocuments)
    {
         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ZipDocuments  $zipDocuments
     * @return \Illuminate\Http\Response
     */
    public function edit(ZipDocuments $zipDocuments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ZipDocuments  $zipDocuments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ZipDocuments $zipDocuments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ZipDocuments  $zipDocuments
     * @return \Illuminate\Http\Response
     */
    public function destroy(ZipDocuments $zipDocuments)
    {
        //
    }
}
