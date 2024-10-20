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
                <h3 class="card-title"> Edit Settings</h3>
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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('settings.update',$record->id)}}"  method="post">
                    @csrf
                    @method('put')
                    <label for="about_app">About app</label>
                    <input class="form-control form-control-lg " name="about_app" value="{{$record->about_app}}" type="text"
                           aria-label=".form-control-lg example">
                    <label for="address">Address</label>
                    <input class="form-control form-control-lg " name="address" value="{{$record->address}}" type="text"
                           aria-label=".form-control-lg example">
                    <label for="email">Email</label>
                    <input class="form-control form-control-lg " name="email" value="{{$record->email}}" type="text"
                           aria-label=".form-control-lg example">
                    <label for="insta_link">Insta link</label>
                    <input class="form-control form-control-lg" name="insta_link" value="{{$record->insta_link}}" type="text"
                           aria-label=".form-control-lg example">
                    <label for="tw_link">Tw link</label>
                    <input class="form-control form-control-lg" name="tw_link" value="{{$record->tw_link}}" type="text"
                           aria-label=".form-control-lg example">
                    <label for="fb_link">fb_link</label>
                    <input class="form-control form-control-lg" name="fb_link" value="{{$record->fb_link}}" type="text"
                           aria-label=".form-control-lg example">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
@endsection
