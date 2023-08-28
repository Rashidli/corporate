@include('includes.header')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <form action="{{route('meetings.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Görüş əlavə et</h4>
                            <div class="row">
                                <div class="col-4">

                                    <div class="mb-3">
                                        <label class="col-form-label">Korporativin adı</label>
                                        <select class="form-control js-example-basic-single" type="text" name="corporate_name" id="corporate_name">
                                            <option selected disabled>-----</option>
                                            @foreach($corporates as $c)
                                                <option value="{{$c->company_name}}" data-voen="{{$c->company_voen}}" {{old('corporate_name') == $c->company_name ? 'selected' : ''}}>{{$c->company_name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->first('corporate_name')) <small class="form-text text-danger">{{$errors->first('corporate_name')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Vöen</label>
                                        <input value="{{old('voen')}}" class="form-control" type="text" name="voen" id="voen">
                                        @if($errors->first('voen')) <small class="form-text text-danger">{{$errors->first('voen')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Məsul şəxs adı</label>
                                        <input value="{{old('person_name')}}" class="form-control" type="text" name="person_name">
                                        @if($errors->first('person_name')) <small class="form-text text-danger">{{$errors->first('person_name')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Məsul şəxs telefon</label>
                                        <input value="{{old('person_phone')}}" class="form-control" type="text" name="person_phone">
                                        @if($errors->first('person_phone')) <small class="form-text text-danger">{{$errors->first('person_phone')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Ünvan</label>
                                        <input value="{{old('address')}}" class="form-control" type="text" name="address">
                                        @if($errors->first('address')) <small class="form-text text-danger">{{$errors->first('address')}}</small> @endif
                                    </div>


                                    <div class="mb-3">
                                        <label class="col-form-label">Göndərən</label>
                                        <select class="form-control" type="text" name="sender">
                                            <option selected disabled>----- </option>
                                            @foreach($senders as $c)
                                                <option value="{{$c->title}}" {{old('sender') == $c->title ? 'selected' : ''}}>{{$c->title}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->first('sender')) <small class="form-text text-danger">{{$errors->first('sender')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Fəaliyyət sahəsi</label>
                                        <select class="form-control" type="text" name="activity_area">
                                            <option selected disabled>----- </option>
                                            @foreach($field_activities as $c)
                                                <option value="{{$c->title}}" {{old('activity_area') == $c->title ? 'selected' : ''}}>{{$c->title}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->first('activity_area')) <small class="form-text text-danger">{{$errors->first('activity_area')}}</small> @endif
                                    </div>


                                </div>
                                <div class="col-4">

                                    <div class="mb-3">
                                        <label class="col-form-label">Ödəmə Şərti</label>
                                        <select class="form-control" type="text" name="payment_condition">
                                            <option selected disabled>----- </option>
                                            @foreach($payment_conditions as $c)
                                                <option value="{{$c->title}}" {{old('payment_condition') == $c->title ? 'selected' : ''}}>{{$c->title}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->first('payment_condition')) <small class="form-text text-danger">{{$errors->first('payment_condition')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Tarix</label>
                                        <input value="{{old('date')}}" class="form-control" type="date" name="date">
                                        @if($errors->first('date')) <small class="form-text text-danger">{{$errors->first('date')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Görüş Tarixi</label>
                                        <input value="{{old('meeting_date')}}" class="form-control" type="date" name="meeting_date">
                                        @if($errors->first('meeting_date')) <small class="form-text text-danger">{{$errors->first('meeting_date')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Görüş Saatı</label>
                                        <input value="{{old('meeting_time')}}" class="form-control" type="time" name="meeting_time">
                                        @if($errors->first('meeting_time')) <small class="form-text text-danger">{{$errors->first('meeting_time')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Görüş növü</label>
                                        <select class="form-control" type="text" name="meeting_type">
                                            <option selected disabled>----- </option>
                                            @foreach($meeting_types as $c)
                                                <option value="{{$c->title}}" {{old('meeting_type') == $c->title ? 'selected' : ''}}>{{$c->title}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->first('meeting_type')) <small class="form-text text-danger">{{$errors->first('meeting_type')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Xidmət təklifi</label>
                                        <select class="form-control" type="text" name="service_offer">
                                            <option selected disabled>----- </option>
                                            @foreach($service_offers as $c)
                                                <option value="{{$c->title}}" {{old('service_offer') == $c->title ? 'selected' : ''}}>{{$c->title}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->first('service_offer')) <small class="form-text text-danger">{{$errors->first('service_offer')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Mənbə</label>
                                        <select class="form-control" type="text" name="source">
                                            <option selected disabled>----- </option>
                                            @foreach($sources as $c)
                                                <option value="{{$c->title}}" {{old('source') == $c->title ? 'selected' : ''}}>{{$c->title}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->first('source')) <small class="form-text text-danger">{{$errors->first('source')}}</small> @endif
                                    </div>
                                </div>
                                <div class="col-4">

                                    <div class="mb-3">
                                        <label class="col-form-label">Görüşən əməkdaş</label>
                                        <select class="form-control" type="text" name="meeting_person">
                                            <option selected disabled>----- </option>
                                            @foreach($employees as $c)
                                                <option value="{{$c->title}}" {{old('meeting_person') == $c->title ? 'selected' : ''}}>{{$c->title}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->first('meeting_person')) <small class="form-text text-danger">{{$errors->first('meeting_person')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Görüşün gedişatı</label>
                                        <input value="{{old('meeting_progress')}}" class="form-control" type="text" name="meeting_progress">
                                        @if($errors->first('meeting_progress')) <small class="form-text text-danger">{{$errors->first('meeting_progress')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Qeyd</label>
                                        <input value="{{old('note')}}" class="form-control" type="text" name="note">
                                        @if($errors->first('note')) <small class="form-text text-danger">{{$errors->first('note')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Qiymət təklifi</label>
                                        <input value="{{old('price_offer')}}" class="form-control" type="text" name="price_offer">
                                        @if($errors->first('price_offer')) <small class="form-text text-danger">{{$errors->first('price_offer')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Xidmət təklifi faylı</label>
                                        <input value="{{old('service_offer_file')}}" class="form-control" type="file" name="service_offer_file">
                                        @if($errors->first('service_offer_file')) <small class="form-text text-danger">{{$errors->first('service_offer_file')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Protokol</label>
                                        <input value="{{old('protocol')}}" class="form-control" type="text" name="protocol">
                                        @if($errors->first('protocol')) <small class="form-text text-danger">{{$errors->first('protocol')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Protokol faylı</label>
                                        <input value="{{old('protocol_file')}}" class="form-control" type="file" name="protocol_file">
                                        @if($errors->first('protocol_file')) <small class="form-text text-danger">{{$errors->first('protocol_file')}}</small> @endif
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
