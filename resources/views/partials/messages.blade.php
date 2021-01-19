@if(session('success'))
    <div class=" alert alert-success">
        {{session('success')}}
    </div>
@endif

@if(session('danger'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
       <p> {{session('danger')}}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
