@extends('layouts.app')
@include('company.includes.result_messages')
@section('content')

    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4">
                <h1>{{$company->name}}</h1>
                <img width="300px" src="{{asset('storage/companies/'. $company->logo)}}">
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-3">Company email:</div>
                    <div class="col-md-9">{{$company->email}}</div>
                </div>

                <div class="row">
                    <div class="col-md-3">Company phone:</div>
                    <div class="col-md-9">{{$company->phone}}</div>
                </div>

                <div class="row">
                    <div class="col-md-3">Company website:</div>
                    <div class="col-md-9">{{$company->website}}</div>
                </div>
            </div>
            <div class="col-md-3">

                <a href="{{route('companies.index')}}">Back to all companies</a>
                <br>
                <a href="{{route('companies.edit', $company->id )}}" >Edit this company</a>

                 <form method="POST" action="{{route('companies.destroy',$company->id)}}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-link">Delete this company</button>
                </form>
             </div>
        </div>
        <br>
        <br>
        <h2>Workers</h2>
        <div class="row">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>phone</th>
                        <th>email</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($company->workers as $worker)
                    @php /** @var \App\Model\Company $item */ @endphp
                    <tr>
                        <td>
                            {{$worker->first_name}}
                        </td>
                        <td>
                            {{$worker->last_name}}
                        </td>
                        <td>
                            {{$worker->phone}}
                        </td>
                        <td>
                            {{$worker->email}}
                        </td>
                        <td>
                             <form method="POST" action="{{route('workers.destroy',$worker->id)}}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-link">Delete this worker</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{route('workers.add',$company->id)}}">Add New Worker</a>
        <div class="row">
            <div class="col-md-6">
                <a href="{{route('companies.index')}}">Back to all companies</a>
            </div>

            <div class="col-md-6">
                <form method="POST" action="{{route('companies.destroy',$company->id)}}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-link">Delete this company</button>
                </form>
            </div>
        </div>
     </div>

@endsection