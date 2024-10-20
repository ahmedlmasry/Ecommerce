@extends('layouts.master')
@section('page_title')
    Create Products
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add</h3>
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
                <form action={{route('products.store')}}  method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="name">name</label>
                    <input class="form-control form-control-lg" name="name" type="text"
                           aria-label=".form-control-lg example">
                    <br>
                    <label for="category">Category</label>
                    <select name="category_id" id="category_id" class="form-control" >
                        <option value="" > --Category--</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id }}">{{$category->name }}</option>
                        @endforeach
                    </select>
                    <label for="description">description</label>
                    <input class="form-control form-control-lg" name="description" type="text"
                           aria-label=".form-control-lg example">
                    <label for="price">price</label>
                    <input class="form-control form-control-lg" name="price" type="number"
                           aria-label=".form-control-lg example">
                    <div class="form-group">
                        <label for="image">Image</label>
                        <br>
                        <input type="file" name="image"  id="imageInput">
                        <img id="imagePreview" class="img-thumbnail" style="max-width: 300px; display: none;" >
                    </div>
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