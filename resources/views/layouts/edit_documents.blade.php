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
              <form role="form" id="quickForm" method="post" action="{{ route('doc.update', [$docArr->id]) }}" enctype="multipart/form-data">
              	@csrf
                 @if ($message = Session::get('success'))
                  <div class="alert alert-success">
                      <strong>{{ $message }}</strong>
                  </div>
                @endif
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title" value="{{ $docArr->title }}">
                    @error('title')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" name="description" id="description" placeholder="Enter Description"></textarea>
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
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
   
@endsection