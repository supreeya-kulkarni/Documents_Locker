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
              <form role="form" id="quickForm" method="post" action="{{ route('card.update', [$cardArr->id]) }}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="card_number">Card Numnber</label>
                    <input type="text" name="card_number" class="form-control" id="card_number" placeholder="Enter Card Number" value="{{ $cardArr->card_number }}">
                    @error('card_number')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="expiration">Expiration</label>
                    <input type="text" name="expiration" class="form-control" id="expiration" placeholder="Enter expiration" value="{{ $cardArr->expiration }}">
                    @error('expiration')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="cvv">CVV/CVC</label>
                    <input type="text" name="cvv" class="form-control" id="cvv" placeholder="Enter CVV" value="{{ $cardArr->cvv }}">
                    @error('cvv')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="card_name">Card Name</label>
                    <input type="text" name="card_name" class="form-control" id="card_name" placeholder="Enter Card Name" value="{{ $cardArr->card_name }}">
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