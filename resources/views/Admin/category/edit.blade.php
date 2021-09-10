@extends('Admin.layout.master')
@section('content')


     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ویرایش دسته ی {{$category->title}}</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                    <form action="{{route('admin.category.update',$category)}}" method="POST">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="title">عنوان دسته بندی</label>
                            <input type="text" class="form-control" name="title" id="title"
                            value="{{$category->title}}">
                        </div>
                        <div class="form-group">
                            <label for="category_id">دسته والد</label>
                            <select name="category_id" id="category_id">
                                <option value="" disabled selected>دسته ی والد را انتخاب کنید...</option>
                                @foreach ($categories as $categoryProduct)
                                   <option value="{{$categoryProduct->id}}"
                                    @if (optional($category->parent)->id == $categoryProduct->id)
                                        selected
                                    @endif
                                    >{{$categoryProduct->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success btn-sm" value=" ثبت دسته بندی">
                        </div>
                    </form>

                <!-- /.form-group -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
