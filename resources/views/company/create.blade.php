@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="offset-4">
            <h2>Регистрация Компании</h2>
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
        <form action="{{route('companies.store')}}" method="post" enctype="multipart/form-data" id="form">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Имя</label>
                <div class="col-md-3">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>
                <div class="col-md-3">
                    <input id="email" type="text" class="form-control" name="email"   required autocomplete="name" autofocus>
                </div>
            </div>


            <div class="form-group row">
                <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
                <div class="col-md-3">
                    <input id="phone" type="number" class="form-control" name="phone" value="{{ old('phone') }}" required autocomplete="name" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="website" class="col-md-4 col-form-label text-md-right">Website</label>
                <div class="col-md-3">
                    <input id="website" type="url" class="form-control" name="website" value="{{ old('website') }}" required autocomplete="name" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="website" class="col-md-4 col-form-label text-md-right">Logo Image</label>
                <div class="col-md-3">
                    <input id="logo" type="file"  name="logo" accept="image/*" value="{{ old('logo') }}" required autocomplete="name" autofocus>
                </div>
            </div>


             <input id="user_id" type="hidden"  name="user_id" value="{{auth()->user()->id}}">

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