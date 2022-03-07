@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">
        <div class="col-md-8">
            @if (\Session::has('msg'))
                <div class="alert alert-success">
                    {!! \Session::get('msg') !!}
                </div>
            @endif
            <div class="card">
            <div class="card-header">{{ __('Calculations') }}
                <a href="{{ route('home') }}"><button class="btn btn-primary">Add Calculation</button></a>
            </div>
            
            <div class="card-body">
                
            <table class="table table-striped" id="calculationtable">
              <thead>
                <tr>
                  <th scope="col">Principal Amount</th>
                  <th scope="col">Interest Rate</th>
                  <th scope="col">Time Period</th>
                  <th scope="col">Simple Interest</th>
                </tr>
              </thead>
            </table>
</div>
</div>
</div>
</div>
</div>

@endsection
