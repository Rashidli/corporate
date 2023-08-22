@include('includes.header')

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                @if(session('message'))
                                    <div class="alert alert-success">{{session('message')}}</div>
                                @endif
                                <h4 class="card-title">Görüşlər</h4>
                                <a href="{{route('meetings.create')}}" class="btn btn-primary">+</a>
                                <br>
                                <br>
                                    @include('includes.search_form')
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">

                                        <thead>
                                        <tr>
                                            <th>№</th>
                                            <th>Qiymət təklifi</th>
                                            <th>Protokol</th>
                                            <th>Vöen</th>
                                            <th>Sifarişçi şirkət</th>
                                            <th>Göndərən</th>
                                            <th>Ödəniş şərti</th>
                                            <th>Sahə</th>
                                            <th>Görüş tarixi</th>
                                            <th>Görüş saatı</th>
                                            <th>Görüş növü</th>
                                            <th>Status</th>
                                            <th>Əməliyyat</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data['items'] as $meeting)

                                            <tr>
                                                <th scope="row">{{$meeting->id}}</th>
                                                <td>{{$meeting->price_offer}}</td>
                                                <td>{{$meeting->protocol}}</td>
                                                <td>{{$meeting->voen}}</td>
                                                <td>{{$meeting->corporate_name}}</td>
                                                <td>{{$meeting->sender}}</td>
                                                <td>{{$meeting->payment_condition}}</td>
                                                <td>{{$meeting->activity_area}}</td>
                                                <td>{{$meeting->meeting_date}}</td>
                                                <td>{{$meeting->meeting_time}}</td>
                                                <td>{{$meeting->meeting_type}}</td>
                                                <td>{{$meeting->is_active == true ? 'Active' : 'Deactive'}}</td>
                                                <td><a href="{{route('meetings.edit',$meeting->id)}}" class="btn btn-primary" style="margin-right: 15px" >Edit</a>
                                                    <form action="{{route('meetings.destroy', $meeting->id)}}" method="post" style="display: inline-block">
                                                        {{ method_field('DELETE') }}
                                                        @csrf
                                                        <button onclick="confirm('Məlumatın silinməyin təsdiqləyin')" type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>


                                        @endforeach

                                        </tbody>
                                    </table>
                                    <br>
                                    {{ $data['items']->links('vendor.pagination.bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



@include('includes.footer')
