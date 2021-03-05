@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Save Documents</h3>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="quickForm" method="post" action="{{ route('uploadFile') }}" enctype="multipart/form-data">
              	@csrf
                 @if ($message = Session::get('success'))
                  <div class="alert alert-success">
                      <strong>{{ $message }}</strong>
                  </div>
                @endif
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title">
                    @error('title')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" name="description" id="description" placeholder="Enter Description" ></textarea>
                    @error('description')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="file">Attach Document</label>
                    <input type="file" name="file" class="form-control" id="file" placeholder="Please Attach File">
                    @error('file')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="submit" style="padding: 1rem 3rem;">Submit</button>
                  </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
        

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
                            <a href="{{ asset('$doc->file_path') }}"><i class="fa fa-download" aria-hidden="true"></i><a> | 
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
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
   
@endsection