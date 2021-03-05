@extends('layouts.admin')

@section('content')
    
<div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Overview</span>
                <h3 class="page-title">User Profile</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col-lg-4">
                <div class="card card-small mb-4 pt-3">
                  <div class="card-header border-bottom text-center">
                    <div class="mb-3 mx-auto">
                      <img class="rounded-circle" src="{{asset('storage/'.$userArr->avatar) }}" alt="User Avatar" width="110"> </div>
                    <h4 class="mb-0">{{$userArr->name}}</h4>
                    <span class="text-muted d-block mb-2">{{ $userArr->feWorkProfile }}</span>
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item px-4">
                        <div class="progress-wrapper">
                            <strong class="text-muted d-block mb-2">Workload</strong>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="74" aria-valuemin="0" aria-valuemax="100" style="width: 74%;">
                                    <span class="progress-value">74%</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Account Details</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                          <form role="form" id="quickForm" method="post" action="" enctype="multipart/form-data">
                          @csrf
                          @method('put')
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{ $userArr->name }}"> 
                              </div>
                              <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $userArr->email }}"> 
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password"> 
                              </div>
                              <div class="form-group col-md-6">
                                <label for="feInputAddress">Work Profile</label>
                                <input type="text" class="form-control" id="feWorkProfile" name="feWorkProfile" placeholder="Web Developer" value="{{ $userArr->feWorkProfile }}"> 
                              </div>
                            </div> 
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="inputCategory">Image</label>
                                <input type="file" placeholder="Choose file....." name="avatar">
                              </div>
                            </div>                         
                            <button type="submit" class="btn btn-accent">Update Account</button>
                          </form>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- End Default Light Table -->
          </div>   
@endsection

