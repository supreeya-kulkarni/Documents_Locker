@extends('layouts.admin')

@section('content')
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Details</span>
                <h3 class="page-title">Document Table</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            {{ session('msg') }}
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Document Details</h6>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">Id</th>
                          <th scope="col" class="border-0">Title</th>
                          <th scope="col" class="border-0">Description</th>
                          <th scope="col" class="border-0">File</th>
                          <th scope="col" class="border-0">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($docArr as $doc)
                        <tr>
                          <td>{{$doc->id}}</td>
                          <td>{{$doc->title}}</td>
                          <td>{{$doc->description}}</td>
                          <td>{{$doc->file_path}}</td>
                          <td>
                            <a href="{{ asset($doc->file_path) }}"><i class="fa fa-download" aria-hidden="true"></i><a> | 
                            <a href="edit_documents/{{$doc->id}}"> <i class="fa fa-pencil-square-o" aria-hidden="true"> </i></a>  |  
                             <a href="delete_documents/{{$doc->id}}"> <i class="fa fa-trash" aria-hidden="true"></i> </a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Default Light Table -->
          </div>
          

@endsection