@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Calculator') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('savecalculation') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="pamount" class="col-md-4 col-form-label text-md-end">{{ __('Principal Amount') }}</label>

                            <div class="col-md-6">
                                <input id="pamount" type="text" class="form-control @error('pamount') is-invalid @enderror" name="pamount" value="{{ old('pamount') }}" required autofocus onkeypress="return isNumberKey(this, event);">

                                @error('pamount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="rate" class="col-md-4 col-form-label text-md-end">{{ __('Interest Rate') }}</label>

                            <div class="col-md-6">
                                <input id="rate" type="text" class="form-control @error('rate') is-invalid @enderror" name="rate" value="{{ old('rate') }}" required onkeypress="return isNumberKey(this, event);">

                                @error('rate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tperiod" class="col-md-4 col-form-label text-md-end">{{ __('Time period') }}</label>

                            <div class="col-md-6">
                                <input id="tperiod" type="text" class="form-control @error('tperiod') is-invalid @enderror" name="tperiod" value="{{ old('tperiod') }}" required onkeypress="return isNumberKey(this, event);">

                                @error('tperiod')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button class="btn btn-primary" id="calculateint" type="button">
                                    {{ __('Calculate') }}
                                </button>
                            </div>
                        </div>
                    </br>
                        <div class="row mb-3">
                            <label for="sintrest" class="col-md-4 col-form-label text-md-end">{{ __('Simple intrest') }}</label>

                            <div class="col-md-6">
                                <input id="sintrest" type="text" class="form-control @error('sintrest') is-invalid @enderror" name="sintrest" >

                                @error('sintrest')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                @if (\Session::has('msg'))
                <div class="alert alert-success">
                    {!! \Session::get('msg') !!}
                </div>
            @endif
            </div>
        </div>
    </div>
</div>
@endsection
