@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Edit Credentials</h3>
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
              <form role="form" id="quickForm" method="post" action="{{ route('cred.update', [$credArr->id]) }}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="domain_name">Domain Name</label>
                    <input type="text" name="domain_name" class="form-control" id="domain_name" placeholder="Enter Domain Name" value="{{ $credArr->domain_name }}">
                    @error('domain_name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="url">URL</label>
                    <input type="text" name="url" class="form-control" id="url" placeholder="Enter URL" value="{{ $credArr->url }}">
                    @error('url')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter User Name" value="{{ $credArr->name }}">
                    @error('name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" value="{{ $credArr->email }}">
                    @error('email')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" value="{{ $credArr->password }}">
                    @error('password')
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
    <!-- /.content -->
    

@endsection