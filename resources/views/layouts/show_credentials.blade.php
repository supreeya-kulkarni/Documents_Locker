@extends('layouts.admin')

@section('content')
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
                          <th scope="col" class="border-0">Password</th>
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
                          <td>{{$cred->password}}</td>
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
          

@endsection