@include('includes.header')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <form action="{{route('meetings.update', $meeting->id)}}" method="post" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                @csrf
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Görüşü editlə</h4>
                        <div class="row">
                            <div class="col-4">

                                <div class="mb-3">
                                    <label class="col-form-label">Korporativin adı</label>
                                    <select class="form-control js-example-basic-single" type="text" name="corporate_name" id="corporate_name">
                                        <option selected disabled>-----</option>
                                        @foreach($corporates as $c)
                                            <option value="{{$c->company_name}}" {{$c->company_name == $meeting->corporate_name ? 'selected' : ''}} data-voen="{{$c->company_voen}}">{{$c->company_name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->first('corporate_name')) <small class="form-text text-danger">{{$errors->first('corporate_name')}}</small> @endif
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Vöen</label>
                                    <input class="form-control" value="{{$meeting->voen}}" type="text" name="voen" id="voen">
                                    @if($errors->first('voen')) <small class="form-text text-danger">{{$errors->first('voen')}}</small> @endif
                                </div>



                                <div class="mb-3">
                                    <label class="col-form-label">Məsul şəxs adı</label>
                                    <input value="{{$meeting->person_name}}" class="form-control" type="text" name="person_name">
                                    @if($errors->first('person_name')) <small class="form-text text-danger">{{$errors->first('person_name')}}</small> @endif
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Məsul şəxs telefon</label>
                                    <input value="{{$meeting->person_phone}}" class="form-control" type="text" name="person_phone">
                                    @if($errors->first('person_phone')) <small class="form-text text-danger">{{$errors->first('person_phone')}}</small> @endif
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Ünvan</label>
                                    <input value="{{$meeting->address}}" class="form-control" type="text" name="address">
                                    @if($errors->first('address')) <small class="form-text text-danger">{{$errors->first('address')}}</small> @endif
                                </div>


                                <div class="mb-3">
                                    <label class="col-form-label">Göndərən</label>
                                    <select class="form-control" type="text" name="sender">
                                        <option selected disabled>----- </option>
                                        <option value="Göndərən1">Göndərən1</option>
                                        <option value="Göndərən2">Göndərən2</option>
                                    </select>
                                    @if($errors->first('sender')) <small class="form-text text-danger">{{$errors->first('sender')}}</small> @endif
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Fəaliyyət sahəsi</label>
                                    <select class="form-control" type="text" name="activity_area">
                                        <option selected disabled>----- </option>
                                        <option value="Fəaliyyət sahəsi1">Fəaliyyət sahəsi1</option>
                                        <option value="Fəaliyyət sahəsi2">Fəaliyyət sahəsi2</option>
                                    </select>
                                    @if($errors->first('activity_area')) <small class="form-text text-danger">{{$errors->first('activity_area')}}</small> @endif
                                </div>


                            </div>
                            <div class="col-4">

                                <div class="mb-3">
                                    <label class="col-form-label">Ödəmə Şərti</label>
                                    <select class="form-control" type="text" name="payment_condition">
                                        <option selected disabled>----- </option>
                                        <option value="Ödəmə Şərti1">Ödəmə Şərti1</option>
                                        <option value="Ödəmə Şərti2">Ödəmə Şərti2</option>
                                    </select>
                                    @if($errors->first('payment_condition')) <small class="form-text text-danger">{{$errors->first('payment_condition')}}</small> @endif
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Tarix</label>
                                    <input value="{{$meeting->date}}" class="form-control" type="date" name="date">
                                    @if($errors->first('date')) <small class="form-text text-danger">{{$errors->first('date')}}</small> @endif
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Görüş Tarixi</label>
                                    <input value="{{$meeting->meeting_date}}" class="form-control" type="date" name="meeting_date">
                                    @if($errors->first('meeting_date')) <small class="form-text text-danger">{{$errors->first('meeting_date')}}</small> @endif
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Görüş Saatı</label>
                                    <input value="{{$meeting->meeting_time}}" class="form-control" type="time" name="meeting_time">
                                    @if($errors->first('meeting_time')) <small class="form-text text-danger">{{$errors->first('meeting_time')}}</small> @endif
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Görüş növü</label>
                                    <select class="form-control" type="text" name="meeting_type">
                                        <option selected disabled>----- </option>
                                        <option value="Görüş növü1">Görüş növü1</option>
                                        <option value="Görüş növü2">Görüş növü2</option>
                                    </select>
                                    @if($errors->first('meeting_type')) <small class="form-text text-danger">{{$errors->first('meeting_type')}}</small> @endif
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Xidmət təklifi</label>
                                    <select class="form-control" type="text" name="service_offer">
                                        <option selected disabled>----- </option>
                                        <option value="Xidmət təklifi1">Xidmət təklifi1</option>
                                        <option value="Xidmət təklifi2">Xidmət təklifi2</option>
                                    </select>
                                    @if($errors->first('service_offer')) <small class="form-text text-danger">{{$errors->first('service_offer')}}</small> @endif
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Mənbə</label>
                                    <select class="form-control" type="text" name="source">
                                        <option selected disabled>----- </option>
                                        <option value="Mənbə1">Mənbə1</option>
                                        <option value="Mənbə2">Mənbə2</option>
                                    </select>
                                    @if($errors->first('source')) <small class="form-text text-danger">{{$errors->first('source')}}</small> @endif
                                </div>
                            </div>
                            <div class="col-4">

                                <div class="mb-3">
                                    <label class="col-form-label">Görüşən əməkdaş</label>
                                    <select class="form-control" type="text" name="meeting_person">
                                        <option selected disabled>----- </option>
                                        <option value="Görüşən əməkdaş1">Görüşən əməkdaş1</option>
                                        <option value="Görüşən əməkdaş2">Görüşən əməkdaş2</option>
                                    </select>
                                    @if($errors->first('meeting_person')) <small class="form-text text-danger">{{$errors->first('meeting_person')}}</small> @endif
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Görüşün gedişatı</label>
                                    <input value="{{$meeting->meeting_progress}}" class="form-control" type="text" name="meeting_progress">
                                    @if($errors->first('meeting_progress')) <small class="form-text text-danger">{{$errors->first('meeting_progress')}}</small> @endif
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Qeyd</label>
                                    <input value="{{$meeting->note}}" class="form-control" type="text" name="note">
                                    @if($errors->first('note')) <small class="form-text text-danger">{{$errors->first('note')}}</small> @endif
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Qiymət təklifi</label>
                                    <input value="{{$meeting->price_offer}}" class="form-control" type="text" name="price_offer">
                                    @if($errors->first('price_offer')) <small class="form-text text-danger">{{$errors->first('price_offer')}}</small> @endif
                                </div>

                                <div class="mb-3">
                                    <a href="{{asset('storage/'. $meeting->service_offer_file)}}">Xidmət təklifi faylı</a>
                                    <input value="{{$meeting->service_offer_file}}" class="form-control" type="file" name="service_offer_file">
                                    @if($errors->first('service_offer_file')) <small class="form-text text-danger">{{$errors->first('service_offer_file')}}</small> @endif
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Protokol</label>
                                    <input value="{{$meeting->protocol}}" class="form-control" type="text" name="protocol">
                                    @if($errors->first('protocol')) <small class="form-text text-danger">{{$errors->first('protocol')}}</small> @endif
                                </div>

                                <div class="mb-3">
                                    <a href="{{asset('storage/'. $meeting->protocol_file)}}">Protokol fayl</a>
                                    <input value="{{$meeting->protocol_file}}" class="form-control" type="file" name="protocol_file">
                                    @if($errors->first('protocol_file')) <small class="form-text text-danger">{{$errors->first('protocol_file')}}</small> @endif
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Status</label>
                                    <select class="form-control" type="text" name="is_active">
                                        <option selected disabled>----- </option>
                                        <option value="1" {{$meeting->is_active == true ? 'selected' : ''}}>Active</option>
                                        <option value="0" {{$meeting->is_active == false ? 'selected' : ''}}>Deactive</option>
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
