@include('includes.header')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
                <form action="{{route('vats.update', $vat->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Əsas ödənişi editlə</h4>
                            <div class="row">
                                <div class="col-6">

                                    <div class="mb-3">
                                        <label class="col-form-label">Müəssisə</label>
                                        <select class="form-control" type="text" name="institution_name">
                                            <option selected disabled>----- </option>
                                            @foreach($institutions as $c)
                                                <option value="{{$c->title}}" {{$vat->institution_name == $c->title ? 'selected' : ''}}>{{$c->title}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->first('enterprise_name')) <small class="form-text text-danger">{{$errors->first('enterprise_name')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Tarix</label>
                                        <input value="{{$vat->date}}" class="form-control" type="date" name="date">
                                        @if($errors->first('date')) <small class="form-text text-danger">{{$errors->first('date')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Korporativin adı</label>
                                        <select class="form-control js-example-basic-single" type="text" name="corporate_name" id="corporate_name">
                                            <option selected disabled>----- </option>
                                            @foreach($corporates as $c)
                                                <option value="{{$c->company_name}}" data-voen="{{$c->company_voen}}" {{$c->company_name == $vat->corporate_name ? 'selected' : ''}}>{{$c->company_name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->first('corporate_name')) <small class="form-text text-danger">{{$errors->first('corporate_name')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Vöen</label>
                                        <input value="{{$vat->voen}}" id="voen" class="form-control" type="text" name="voen">
                                        @if($errors->first('voen')) <small class="form-text text-danger">{{$errors->first('voen')}}</small> @endif
                                    </div>



                                    <div class="mb-3">
                                        <label class="col-form-label">Qeyd ƏDV</label>
                                        <input value="{{$vat->note_edv}}" class="form-control" type="text" name="note_edv">
                                        @if($errors->first('note_edv')) <small class="form-text text-danger">{{$errors->first('note_edv')}}</small> @endif
                                    </div>

                                </div>
                                <div class="col-6">

                                    <div class="mb-3">
                                        <label class="col-form-label">Ödəmə növü</label>
                                        <select class="form-control" type="text" name="payment_method">
                                            <option selected disabled>-----</option>
                                            @foreach($payment_types as $c)
                                                <option value="{{$c->title}}" {{$vat->payment_method == $c->title ? 'selected' : ''}}>{{$c->title}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->first('payment_method')) <small class="form-text text-danger">{{$errors->first('payment_method')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Bank</label>
                                        <select class="form-control" type="text" name="bank">
                                            <option selected disabled>-----</option>
                                            @foreach($banks as $c)
                                                <option value="{{$c->title}}" {{$vat->bank == $c->title ? 'selected' : ''}}>{{$c->title}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->first('company_name')) <small class="form-text text-danger">{{$errors->first('company_name')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Ödəniş məbləği ƏDV</label>
                                        <input value="{{$vat->payment_edv}}" class="form-control" type="text" name="payment_edv">
                                        @if($errors->first('payment_edv')) <small class="form-text text-danger">{{$errors->first('payment_edv')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Ödəniş tarixi ƏDV</label>
                                        <input value="{{$vat->payment_date_edv}}" class="form-control" type="date" name="payment_date_edv">
                                        @if($errors->first('payment_date_edv')) <small class="form-text text-danger">{{$errors->first('payment_date_edv')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Status</label>
                                        <select class="form-control" type="text" name="is_active">
                                            <option selected disabled>----- </option>
                                            <option value="1" {{$vat->is_active == true ? 'selected' : ''}}>Active</option>
                                            <option value="0" {{$vat->is_active == false ? 'selected' : ''}}>Deactive</option>
                                        </select>
                                        @if($errors->first('is_active')) <small class="form-text text-danger">{{$errors->first('is_active')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <button class="btn btn-primary">Yadda saxla</button>
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
