@extends('layouts.master')
@section('page_title')
    Settings
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List of Settings</h3>
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
                @include('partials.session')
                @if($record)
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">About App</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Address</th>
                                <th scope="col">inta link</th>
                                <th scope="col"> tw link</th>
                                <th scope="col"> fb link</th>
                                <th scope="col">Edit</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <th scope="row">1</th>
                                <td>{{$record->about_app}}</td>
                                <td>{{$record->email}}</td>
                                <td>{{$record->phone}}</td>
                                <td>{{$record->address}}</td>
                                <td>{{$record->insta_link}}</td>
                                <td>{{$record->tw_link}}</td>
                                <td>{{$record->fb_link}}</td>
                                <td>
                                    <a class=" btn btn-success btn-xs" href={{route('settings.edit',$record->id)}} ><i
                                            class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
@endsection
