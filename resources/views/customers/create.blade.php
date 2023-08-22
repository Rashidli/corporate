@include('includes.header')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <form action="{{route('customers.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Əsas məlumat</h4>
                                    <div class="mb-3">
                                        <label class="col-form-label">Şirkətin adı</label>
                                        <input class="form-control" type="text" name="company_name">
                                        @if($errors->first('company_name')) <small class="form-text text-danger">{{$errors->first('company_name')}}</small> @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class=" col-form-label">Vöen</label>
                                        <input class="form-control" type="text" name="company_voen">
                                        @if($errors->first('company_voen')) <small class="form-text text-danger">{{$errors->first('company_voen')}}</small> @endif
                                    </div>
                                    <!-- end row -->
                                    <div class="mb-3">
                                        <label class="col-form-label">Fəaliyyət sahəsi</label>
                                        <select class="form-control" type="text" name="company_area">
                                            <option selected disabled>----- </option>
                                            <option value="Fəaliyyət sahəsi1">Fəaliyyət sahəsi1</option>
                                            <option value="Fəaliyyət sahəsi2">Fəaliyyət sahəsi2</option>
                                        </select>
                                        @if($errors->first('company_area')) <small class="form-text text-danger">{{$errors->first('company_area')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Telefon</label>
                                        <input class="form-control" type="text" name="company_phone">
                                        @if($errors->first('company_phone')) <small class="form-text text-danger">{{$errors->first('company_phone')}}</small> @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class=" col-form-label">Ünvan</label>
                                        <input class="form-control" type="text" name="main_address">
                                        @if($errors->first('main_address')) <small class="form-text text-danger">{{$errors->first('main_address')}}</small> @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Bank məlumatları</h4>
                                    <div class="mb-3">
                                        <label class="col-form-label">Bank filialı</label>
                                        <input class="form-control" type="text" name="bank_branch">
                                        @if($errors->first('bank_branch')) <small class="form-text text-danger">{{$errors->first('bank_branch')}}</small> @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class=" col-form-label">Bankın Vöeni</label>
                                        <input class="form-control" type="text" name="bank_voen">
                                        @if($errors->first('bank_voen')) <small class="form-text text-danger">{{$errors->first('bank_voen')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Swift</label>
                                        <input class="form-control" type="text" name="bank_swift">
                                        @if($errors->first('bank_swift')) <small class="form-text text-danger">{{$errors->first('bank_swift')}}</small> @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class=" col-form-label">İban</label>
                                        <input class="form-control" type="text" name="bank_iban">
                                        @if($errors->first('bank_iban')) <small class="form-text text-danger">{{$errors->first('bank_iban')}}</small> @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class=" col-form-label">Kod</label>
                                        <input class="form-control" type="text" name="bank_code">
                                        @if($errors->first('bank_code')) <small class="form-text text-danger">{{$errors->first('bank_code')}}</small> @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Şirkət məlumatları</h4>
                                    <div class="mb-3">
                                        <label class="col-form-label">Şirkət Kateqoriyası</label>
                                        <select class="form-control" type="text" name="company_cat">
                                            <option selected disabled>----- </option>
                                            <option value="Şirkət Kateqoriyası1">Şirkət Kateqoriyası1</option>
                                            <option value="Şirkət Kateqoriyası2">Şirkət Kateqoriyası2</option>
                                        </select>
                                        @if($errors->first('company_cat')) <small class="form-text text-danger">{{$errors->first('company_cat')}}</small> @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label">Əməkdaşların sayı</label>
                                        <input class="form-control" type="number" name="company_count_employee">
                                        @if($errors->first('company_count_employee')) <small class="form-text text-danger">{{$errors->first('company_count_employee')}}</small> @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label">Şirkət Ünvanı</label>
                                        <select class="form-control" type="text" name="company_address">
                                            <option selected disabled>----- </option>
                                            <option value="Şirkət Ünvanı1">Şirkət Ünvanı1</option>
                                            <option value="Şirkət Ünvanı2">Şirkət Ünvanı2</option>
                                        </select>
                                        @if($errors->first('company_address')) <small class="form-text text-danger">{{$errors->first('company_address')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Şirkətin dönüşü</label>
                                        <input class="form-control" type="number" name="company_return">
                                        @if($errors->first('company_return')) <small class="form-text text-danger">{{$errors->first('company_return')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Şirkət Növü</label>
                                        <select class="form-control" type="text" name="company_type">
                                            <option selected disabled>----- </option>
                                            <option value="Şirkət Növü1">Şirkət Növü1</option>
                                            <option value="Şirkət Növü2">Şirkət Növü2</option>
                                        </select>
                                        @if($errors->first('company_type')) <small class="form-text text-danger">{{$errors->first('company_type')}}</small> @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Müqavilə detalları</h4>
                                    <div class="mb-3">
                                        <label class="col-form-label">Müqavilə</label>
                                        <select class="form-control" type="text" name="contract_name">
                                            <option selected disabled>----- </option>
                                            <option value="Müqavilə1">Müqavilə1</option>
                                            <option value="Müqavilə2">Müqavilə2</option>
                                        </select>
                                        @if($errors->first('contract_name')) <small class="form-text text-danger">{{$errors->first('contract_name')}}</small> @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class=" col-form-label">Kurator</label>
                                        <input class="form-control" type="text" name="contract_curator">
                                        @if($errors->first('contract_curator')) <small class="form-text text-danger">{{$errors->first('contract_curator')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Müqavilə tarixi</label>
                                        <input class="form-control" type="date" name="contract_date">
                                        @if($errors->first('contract_date')) <small class="form-text text-danger">{{$errors->first('contract_date')}}</small> @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class=" col-form-label">Müqavilə nömrəsi</label>
                                        <input class="form-control" type="text" name="contract_number">
                                        @if($errors->first('contract_number')) <small class="form-text text-danger">{{$errors->first('contract_number')}}</small> @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class=" col-form-label">Müqavilə Bitmə Tarixi</label>
                                        <input class="form-control" type="date" name="contract_end_date">
                                        @if($errors->first('contract_end_date')) <small class="form-text text-danger">{{$errors->first('contract_end_date')}}</small> @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class=" col-form-label">Fayl</label>
                                        <input class="form-control" type="file" name="contract_file">
                                        @if($errors->first('contract_file')) <small class="form-text text-danger">{{$errors->first('contract_file')}}</small> @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Məsul şəxs</h4>
                                    <div class="mb-3">
                                        <label class="col-form-label">Məsuliyyət daşıyan şəxs adı</label>
                                        <input class="form-control" type="text" name="person_name">
                                        @if($errors->first('person_name')) <small class="form-text text-danger">{{$errors->first('person_name')}}</small> @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class=" col-form-label">Filialın adı</label>
                                        <input class="form-control" type="text" name="person_filial">
                                        @if($errors->first('person_filial')) <small class="form-text text-danger">{{$errors->first('person_filial')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Məsuliyyət daşıyan şəxsin telefonu</label>
                                        <input class="form-control" type="text" name="person_phone">
                                        @if($errors->first('person_phone')) <small class="form-text text-danger">{{$errors->first('person_phone')}}</small> @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class=" col-form-label">Məsuliyyət daşıyan şəxs emaili</label>
                                        <input class="form-control" type="email" name="person_email">
                                        @if($errors->first('person_email')) <small class="form-text text-danger">{{$errors->first('person_email')}}</small> @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class=" col-form-label">Məsuliyyət daşıyan şəxs ünvanı</label>
                                        <input class="form-control" type="text" name="person_address">
                                        @if($errors->first('person_address')) <small class="form-text text-danger">{{$errors->first('person_address')}}</small> @endif
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
