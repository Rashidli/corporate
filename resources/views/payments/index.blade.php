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
                                <h4 class="card-title">Əsas ödənişlər</h4>
                                <a href="{{route('payments.create')}}" class="btn btn-primary">+</a>
                                <br>
                                <br>
                                    @include('includes.search_form')
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">

                                        <thead>
                                        <tr>
                                            <th>№</th>
                                            <th>Müəssisə</th>
                                            <th>Tarix</th>
                                            <th>K|adı</th>
                                            <th>VÖEN</th>
                                            <th>Ö|M-ƏSAS</th>
                                            <th>Ö|T-ƏSAS</th>
                                            <th>Valyuta</th>
                                            <th>Qeyd</th>
                                            <th>Ö|növü</th>
                                            <th>Ö|M ƏDV</th>
                                            <th>Ö|T ƏDV</th>
                                            <th>Q|ƏDV</th>
                                            <th>Status</th>
                                            <th>Əməliyyat</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data['items'] as $payment)

                                            <tr>
                                                <th scope="row">{{$payment->id}}</th>
                                                <td>{{$payment->institution_name}}</td>
                                                <td>{{$payment->date}}</td>
                                                <td>{{$payment->corporate_name}}</td>
                                                <td>{{$payment->voen}}</td>
                                                <td>{{$payment->payment_main}}</td>
                                                <td>{{$payment->payment_date_main}}</td>
                                                <td>{{$payment->currency}}</td>
                                                <td>{{$payment->note}}</td>
                                                <td>{{$payment->payment_method}}</td>
                                                <td>{{$payment->payment_edv}}</td>
                                                <td>{{$payment->payment_date_edv}}</td>
                                                <td>{{$payment->note_edv}}</td>
                                                <td>{{$payment->is_active == true ? 'Active' : 'Deactive'}}</td>
                                                <td><a href="{{route('payments.edit',$payment->id)}}" class="btn btn-primary" style="margin-right: 15px" >Edit</a>
                                                    <form action="{{route('payments.destroy', $payment->id)}}" method="post" style="display: inline-block">
                                                        {{ method_field('DELETE') }}
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">Delete</button>
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
