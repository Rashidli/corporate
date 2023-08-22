@include('includes.header')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <form action="{{route('acts.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Akt əlavə et</h4>
                            <div class="row">
                                <div class="col-6">

                                    <div class="mb-3">
                                        <label class="col-form-label">Akt nömrəsi</label>
                                        <input class="form-control" type="text" name="act_number">
                                        @if($errors->first('act_number')) <small class="form-text text-danger">{{$errors->first('act_number')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Yekun məbləğ</label>
                                        <input class="form-control" type="text" name="total_price">
                                        @if($errors->first('total_price')) <small class="form-text text-danger">{{$errors->first('total_price')}}</small> @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label">Müəssisə</label>
                                        <select class="form-control" type="text" name="enterprise_name">
                                            <option selected disabled>----- </option>
                                            <option value="Müəssisə1">Müəssisə1</option>
                                            <option value="Müəssisə2">Müəssisə2</option>
                                        </select>
                                        @if($errors->first('enterprise_name')) <small class="form-text text-danger">{{$errors->first('enterprise_name')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">ƏDV</label>
                                        <input class="form-control" type="text" name="edv" >
                                        @if($errors->first('edv')) <small class="form-text text-danger">{{$errors->first('edv')}}</small> @endif
                                    </div>


                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="col-form-label">Korporativin adı</label>
                                        <select class="form-control js-example-basic-single" type="text" name="corporate_name" id="corporate_name">
                                            <option selected disabled>----- </option>
                                            @foreach($corporates as $c)
                                                <option value="{{$c->company_name}}" data-voen="{{$c->company_voen}}">{{$c->company_name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->first('corporate_name')) <small class="form-text text-danger">{{$errors->first('corporate_name')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Vöen</label>
                                        <input class="form-control" type="text" name="voen" id="voen">
                                        @if($errors->first('voen')) <small class="form-text text-danger">{{$errors->first('voen')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Şirkət</label>
                                        <select class="form-control" type="text" name="company_name">
                                            <option selected disabled>----- </option>
                                            <option value="Şirkət1">Şirkət1</option>
                                            <option value="Şirkət2">Şirkət2</option>
                                        </select>
                                        @if($errors->first('company_name')) <small class="form-text text-danger">{{$errors->first('company_name')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">File</label>
                                        <input class="form-control" type="file" name="file">
                                        @if($errors->first('file')) <small class="form-text text-danger">{{$errors->first('file')}}</small> @endif
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
