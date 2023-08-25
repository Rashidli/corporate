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
                                <h4 class="card-title">Ədv ödənişlər</h4>
                                <a href="{{route('vats.create')}}" class="btn btn-primary">+</a>
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
                                            <th>Bank</th>
                                            <th>Ö|növü</th>
                                            <th>Ö|M ƏDV</th>
                                            <th>Ö|T ƏDV</th>
                                            <th>Q|ƏDV</th>
                                            <th>Status</th>
                                            <th>Əməliyyat</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data['items'] as $vat)

                                            <tr>
                                                <th scope="row">{{$vat->id}}</th>
                                                <td>{{$vat->institution_name}}</td>
                                                <td>{{$vat->date}}</td>
                                                <td>{{$vat->corporate_name}}</td>
                                                <td>{{$vat->voen}}</td>
                                                <td>{{$vat->bank}}</td>
                                                <td>{{$vat->payment_method}}</td>
                                                <td>{{$vat->payment_edv}}</td>
                                                <td>{{$vat->payment_date_edv}}</td>
                                                <td>{{$vat->note_edv}}</td>
                                                <td>{{$vat->is_active == true ? 'Active' : 'Deactive'}}</td>
                                                <td><a href="{{route('vats.edit',$vat->id)}}" class="btn btn-primary" style="margin-right: 15px" >Edit</a>
                                                    <form action="{{route('vats.destroy', $vat->id)}}" method="post" style="display: inline-block">
                                                        {{ method_field('DELETE') }}
                                                        @csrf
                                                        <button  type="submit" class="btn btn-danger">Delete</button>
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
