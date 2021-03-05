@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Save Credentials</h3>
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
              <form role="form" id="quickForm" method="post" action="credentials_submit">
              	@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="domain_name">Domain Name</label>
                    <input type="text" name="domain_name" class="form-control" id="domain_name" placeholder="Enter Domain Name" value="{{ old('domain_name') }}">
                    @error('domain_name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="url">URL</label>
                    <input type="url" name="url" class="form-control" id="url" placeholder="Enter URL" value="{{ old('url') }}">
                    @error('url')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter User Name" value="{{ old('name') }}">
                    @error('name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" value="{{ old('email') }}">
                    @error('email')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
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

          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Details</span>
                <h3 class="page-title">Credential Tables</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            {{ session('msg') }}
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Users Details</h6>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">Domain Name</th>
                          <th scope="col" class="border-0">URL</th>
                          <th scope="col" class="border-0">User Name</th>
                          <th scope="col" class="border-0">Email</th>
                          <!--<th scope="col" class="border-0">Password</th>-->
                          <th scope="col" class="border-0">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($credArr as $cred)
                        <tr>
                          <td>{{$cred->domain_name}}</td>
                          <td>{{$cred->url}}</td>
                          <td>{{$cred->name}}</td>
                          <td>{{$cred->email}}</td>
                          <!--<td>{{$cred->password}}</td>-->
                          <td>
                            <a href="edit_credentials/{{$cred->id}}"> <i class="fa fa-pencil-square-o" aria-hidden="true"> </i></a>  |  
                             <a href="delete_credentials/{{$cred->id}}"> <i class="fa fa-trash" aria-hidden="true"></i> </a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
   
@endsection

<!---<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

      <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#credential_form').on('submit', function(event){
            event.preventDefault();
            $('#domain_name-error').text('');
            $('#url-error').text('');
            $('#name-error').text('');
            $('#email-error').text('');
            $('#password-error').text('');

            domain_name = $('#domain_name').val();
            url = $('#url').val();
            name = $('#name').val();
            email = $('#email').val();
            password = $('#password').val();
            

            $.ajax({
              url: "/credential_form",
              type: "POST",
              data:{
                  domain_name:domain_name,
                  url:url,
                  name:name,
                  email:email,
                  password:password,
              },
              success:function(response){
                console.log(response);
                if (response) {
                  $('#success-message').text(response.success);
                  $("#credential_form")[0].reset();
                }
              },
              error: function(response) {
                  $('#domain_name-error').text(response.responseJSON.errors.domain_name);
                  $('#url-error').text(response.responseJSON.errors.url);
                  $('#name-error').text(response.responseJSON.errors.name);
                  $('#email-error').text(response.responseJSON.errors.email);
                  $('#password-error').text(response.responseJSON.errors.password);
                  
              }
             });
            });
      </script>-->