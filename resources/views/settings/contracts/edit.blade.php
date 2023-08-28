@include('includes.header')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                @if(session('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                @endif
                <form action="{{route('contracts.update', $contract->id)}}" method="post" enctype="multipart/form-data">
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{$contract->title}}</h4>
                            <div class="row">
                                <div class="col-6">

                                    <div class="mb-3">
                                        <label class="col-form-label">Title</label>
                                        <input value="{{$contract->title}}" class="form-control" type="text" name="title">
                                        @if($errors->first('title')) <small class="form-text text-danger">{{$errors->first('title')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <button class="btn btn-primary">Yadda saxla</button>
                                        <a class="btn btn-primary" href="{{route('contracts.index')}}">Siyahıya qayıt</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@include('includes.footer')
