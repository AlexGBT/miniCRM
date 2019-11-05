@if($errors->any())
    @foreach($errors->all() as $currentError)
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                    {{$currentError}}
                </div>
            </div>
        </div>
    @endforeach
@endif
@if(session('deletedSuccessfully'))
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                {{session()->get('deletedSuccessfully')}}
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <a href="{{route('companies.restore',[session()->get('companyId'), implode('worker',session()->get('deletedWorkersIds'))  ] )}}">Do you want restore company?</a>
            </div>
        </div>
    </div>

@endif

@if(session('restoredSuccessfully'))
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                {{session()->get('restoredSuccessfully')}}
            </div>
        </div>
    </div>
@endif

@if(session('successChanged'))
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                {{session()->get('successChanged')}}
            </div>
        </div>
    </div>
@endif