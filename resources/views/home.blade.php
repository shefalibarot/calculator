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
            <div class="card-header">{{ __('User Details') }}</div>
            <div class="card-body">
                
            <table class="table table-striped" id="usertable">
              <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Total Calculation</th>
                </tr>
              </thead>
            </table>
</div>
</div>
</div>
</div>
</div>

@endsection
