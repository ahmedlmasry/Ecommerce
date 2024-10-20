@extends('layouts.master')
@section('page_title')
    Clients
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List of Clients</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form method="get">
                    <div class="row">
                        <div class="col-md-4">
                            <input name="search" value="{{request('search')}}" class="form-control "
                                   type="search" placeholder="Search" aria-label="Search">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary"><i
                                    class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <br>
                @include('partials.session')
                @if(count($records))
                    <div class="table-responsive">
                        <table class="table table-bordered mt-3">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">phone</th>
                                {{--                                <th scope="col">District</th>--}}
                                {{--                                <th scope="col">Image</th>--}}
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($records as $record)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$record->name}}</td>
                                    <td>{{$record->email}}</td>
                                    <td>{{$record->phone}}</td>
                                    {{--                                    <td class="text-center">{{$record->district->name}}</td>--}}
                                    {{--                                    <td>--}}
                                    {{--                                        <img src="{{$record->image}}" class="img-circle elevation-4"--}}
                                    {{--                                           height="40px"  alt="User Image">--}}
                                    {{--                                    </td>--}}
                                    <td>  @if ($record->status)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-secondary">Inactive</span>
                                        @endif</td>
                                    <td>
                                        @if (!$record->status)
                                            <a href="{{ route('clients.activate', $record->id) }}"
                                               class="btn btn-sm btn-success">Active</a>
                                        @else
                                            <a href="{{ route('clients.de-activate', $record->id) }}"
                                               class="btn btn-sm btn-secondary">DeActive</a></td>
                                    @endif
                                    <td>
                                        <form method="post" action={{route('clients.destroy',$record->id)}} onsubmit="return confirmDelete(event);">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-xs"><i
                                                    class="fas fa-trash" ></i></button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $records->links('vendor.pagination.bootstrap-5') }}
                    </div>
                @else
                <h2 > Sorry, there are no clients. </h2>
                @endif

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
@endsection
