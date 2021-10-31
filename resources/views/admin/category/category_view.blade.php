@extends('layouts.admin_master')


@section('admin-content')


    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title"> All Category</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>

                                            <th>Category Icon</th>
                                            <th>Category name En</th>
                                            <th>Category name Bn</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $item)
                                            <tr>
                                                <td>
                                                    <span><i class="{{ $item->category_icon }}"></i></span>
                                                </td>
                                                <td>{{ $item->category_name_en }}</td>
                                                <td>{{ $item->category_name_bn }}</td>
                                                <td>
                                                    <a href="{{ url('admin/category/edit/' . $item->id) }}"
                                                        class="btn btn-sm btn-primary" title="edit data"> <i
                                                            class="fa fa-pencil"></i></a>

                                                    <a href="{{ url('admin/category/delete/' . $item->id) }}"
                                                        class="btn btn-sm btn-danger" id="delete" title="delete data"><i
                                                            class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                    <!-- /.box -->
                </div>
                <!-- /.col -->

                <div class="col-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Category Add</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="form-control-label">Category Icon: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="category_icon"
                                        value="{{ old('brand_name_en') }}" placeholder="Enter category_icon">
                                    @error('category_icon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">Category Name English: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="category_name_en"
                                        value="{{ old('category_name_en') }}" placeholder="Enter brand_name_bn">
                                    @error('category_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">Category Name Bangla: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="category_name_bn"
                                        value="{{ old('category_name_bn') }}" placeholder="Enter brand_name_bn">
                                    @error('category_name_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <input type="submit" class="btn btn-rounded btn-info" value="Add Category">
                        </div>

                        </form>

                    </div>
                </div>

            </div>

        </section>
    </div>

@endsection
