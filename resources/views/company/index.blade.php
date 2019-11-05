@extends('layouts.app')
@include('company.includes.result_messages')
@section('content')
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Company Name</th>
                <th>Website</th>
                <th>logo</th>
            </tr>
        </thead>
        <tbody>
        @foreach($paginator as $item)
            @php /** @var \App\Model\Company $item */ @endphp
            <tr>
                <td>
                    <a href="{{route('companies.show', $item->id)}}">
                        {{$item->name}}
                    </a>
                </td>
                <td>
                    <a href = "{{$item->website}}">
                        {{$item->website}}
                    </a>
                </td>
                <td>
                    <a href = "{{asset('storage/companies/' . $item->logo)}}">
                        <img src="{{asset('storage/companies/' . $item->logo)}}" width="50px">
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <br>
    @if($paginator->total() > $paginator->count())
        <br>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class ="card-body">
                        {{ $paginator->links() }}
                    </div>
                </div>
            </div>
        </div>
    @endif
    <a href="{{ route('companies.create') }}">Create New Company</a>
@endsection