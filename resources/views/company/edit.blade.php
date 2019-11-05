
@extends('layouts.app')
@include('company.includes.result_messages')
@section('content')
 <form method="post" action="{{ route('companies.update', $company->id) }}">
    @method('PATCH')
    @csrf
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <br>
                    <div class="tab-content">
                        <div class="tab-pane active" id="maindata" role="tabpanel">
                            <div class="form-group" >
                                <label for="name">Name</label>
                                <input name="name" value="{{old('name',$company->name)}}" id="name" type="text" class="form-control" minlength="3" required>
                            </div>
                            <div class="form-group" >
                                <label for="email" >email</label>
                                <input name="email" value = "{{ old('email', $company->email) }}" id="email" type="email" class="form-control">
                            </div>
                            <div class="form-group" >
                                <label for="phone">phone</label>
                                <input name="phone" value="{{old('phone',$company->phone)}}" id="phone" type="text" class="form-control" minlength="3" required>
                            </div>
                            <div class="form-group" >
                                <label for="website" >website</label>
                                <input name="website" value = "{{ old('website', $company->website) }}" id="website" type="text" class="form-control">
                            </div>


                            {{--<div class="form-group" >--}}
                                {{--<label for="logo" >Logo Image</label>--}}
                                {{--<input id="logo" type="file"  name="logo" accept="image/*"  >--}}
                            {{--</div>--}}

                            <button type="submit">Change Company</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection