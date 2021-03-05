@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Save Card Details</h3>
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
              <form role="form" id="quickForm" method="post" action="cards_submit">
              	@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="card_number">Card Number</label>
                    <input type="text" name="card_number" class="form-control  @error('card_number') is-invalid @enderror" id="card_number" placeholder="**** **** **** ****" value="{{ old('card_number') }}" required  autocomplete="name" autofocus>
                    @error('card_number')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-6">
                      <label for="expiration">Expiration</label>
                      <input type="text" name="expiration" class="form-control @error('expiration') is-invalid @enderror" id="expiration" placeholder="00 / 00" value="{{ old('expiration') }}" required autocomplete="expiration">

                      @error('expiration')
                      <p class="text-danger">{{$message}}</p>
                      @enderror

                    </div>
                    <div class="form-group col-sm-6">
                      <label for="cvv">CVV/CVC</label>
                      <input type="text" name="cvv" class="form-control @error('cvv') is-invalid @enderror" id="cvv" placeholder="***" value="{{ old('cvv') }}" required autocomplete="cvv">

                      @error('cvv')
                      <p class="text-danger">{{$message}}</p>
                      @enderror

                    </div>
                  </div>
                  <div class="form-group">
                    <label for="card_name">Name on Card</label>
                    <input type="text" name="card_name" class="form-control @error('card_name') is-invalid @enderror" id="card_name" placeholder="Enter Name" value="{{ old('card_name') }}" required autocomplete="card_name">

                    @error('card_name')
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
                <h3 class="page-title">Card Details Tables</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            {{ session('msg') }}
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Card Details Details</h6>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">Card Name</th>
                          <th scope="col" class="border-0">Card Number</th>
                          <th scope="col" class="border-0">Expiration</th>
                          <th scope="col" class="border-0">CVV/CVC</th>
                          <th scope="col" class="border-0">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($cardArr as $card)
                        <tr>
                          <td>{{$card->card_name}}</td>
                          <td>{{$card->card_number}}</td>
                          <td>{{$card->expiration}}</td>
                          <td>{{$card->cvv}}</td>
                          <td>
                            <a href="edit_cards/{{$card->id}}"> <i class="fa fa-pencil-square-o" aria-hidden="true"> </i></a>  |  
                             <a href="delete_cards/{{$card->id}}"> <i class="fa fa-trash" aria-hidden="true"></i> </a>
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
