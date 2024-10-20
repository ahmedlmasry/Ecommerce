@extends('layouts.master')
@inject('perms','\App\Models\Permission')
@section('page_title')
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> Create Roles</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            @include('partials.session')
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
                <form action="{{route('roles.store')}}" method="post">
                    @csrf
                    <label for="name">name</label>
                    <input class="form-control form-control-lg" name="name" type="text"
                           aria-label=".form-control-lg example">
                    <br>
                    <input id="selectAll" type="checkbox"><label for='selectAll' class="col-md-4">Select All</label>
                    <div class="row">
                        @foreach($perms->all() as $permission)
                            <div class="form-check col-md-2">
                                <input class="form-check-input" id="exampleCheck1" type="checkbox"
                                       value="{{$permission->id}}"
                                       name="permissions_list[]">
                                <label class="form-check-label" for="exampleCheck1">{{$permission->name}}</label>
                            </div>
                        @endforeach
                    </div>
                    <br>
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
@push('scripts')
    <script>
        $("#selectAll").click(function () {
            $("input[type=checkbox]").prop("checked", $(this).prop("checked"));
        });
    </script>
@endpush
