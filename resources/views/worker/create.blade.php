@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="offset-4">
            <h2>Создание Нового Рабочего</h2>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card-body">
        <form action="{{route('workers.store')}}" method="post" enctype="multipart/form-data" id="form">
            @csrf
            <div class="form-group row">
                <label for="first_name" class="col-md-4 col-form-label text-md-right">first_name</label>
                <div class="col-md-3">
                    <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required  autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="last_name" class="col-md-4 col-form-label text-md-right">last_name</label>
                <div class="col-md-3">
                    <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required  autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>
                <div class="col-md-3">
                    <input id="email" type="text" class="form-control" name="email"   required autofocus>
                </div>
            </div>


            <div class="form-group row">
                <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
                <div class="col-md-3">
                    <input id="phone" type="number" class="form-control" name="phone" value="{{ old('phone') }}" required autocomplete="name" autofocus>
                </div>
            </div>

             <input id="company_id" type="hidden"  name="company_id" value="{{$companyId}}">

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>

        </form>
    </div>
@endsection