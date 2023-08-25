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
                                <h4 class="card-title">Aktlar</h4>

                                        <a href="{{route('acts.create')}}" class="btn btn-primary">+</a>
                                <br>
                                <br>
                                    @include('includes.search_form')

                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">

                                        <thead>
                                        <tr>
                                            <th>№</th>
                                            <th>A|Nömrəsi</th>
                                            <th>Yekun|məbləğ</th>
                                            <th>ƏDV</th>
                                            <th>K|adı</th>
                                            <th>VÖEN</th>
                                            <th>Müəssisə</th>
                                            <th>Şirkət</th>
                                            <th>File</th>
                                            <th>Status</th>
                                            <th>Əməliyyat</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data['items'] as $act)

                                            <tr>
                                                <th scope="row">{{$act->id}}</th>
                                                <td>{{$act->act_number}}</td>
                                                <td>{{$act->total_price}}</td>
                                                <td>{{$act->edv}}</td>
                                                <td>{{$act->corporate_name}}</td>
                                                <td>{{$act->voen}}</td>
                                                <td>{{$act->enterprise_name}}</td>
                                                <td>{{$act->company_name}}</td>
                                                <td><a href="{{asset('storage/' .$act->file)}}">File</a></td>
                                                <td>{{$act->is_active == true ? 'Active' : 'Deactive'}}</td>
                                                <td>
                                                    <a href="{{route('acts.edit',$act->id)}}" class="btn btn-primary" style="margin-right: 15px" >Edit</a>
                                                    <form action="{{route('acts.destroy', $act->id)}}" method="post" style="display: inline-block">
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
