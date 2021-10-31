@extends('layouts.admin_master')
@section('admin-content')


    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">SubCategory List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Category </th>
                                            <th>SubCategory Name En</th>
                                            <th>SubCategory Name Bn</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subcategories as $item)
                                            <tr>
                                                <td>
                                                    {{ $item->category->category_name_en }}
                                                </td>
                                                <td>{{ $item->subcategory_name_en }}</td>
                                                <td>{{ $item->subcategory_name_bn }}</td>
                                                <td>
                                                    <a href="{{ url('admin/subcategory/edit/' . $item->id) }}"
                                                        class="btn btn-sm btn-primary" title="edit data"> <i
                                                            class="fa fa-pencil"></i></a>

                                                    <a href="{{ url('admin/subcategory/delete/' . $item->id) }}"
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


                </div>
                <!-- /.col -->

                <!--   ------------ Add Category Page -------- -->

                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add SubCategory </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">


                                <form method="POST" action="{{ route('subcategory.store') }}">
                                    @csrf

                                    <div class="form-group">
                                        <label class="form-control-label">Select Category: <span
                                                class="text-danger">*</span></label>
                                        <select class="form-control" name="category_id">
                                            <option label="Choose one"></option>
                                            @foreach ($categories as $cat)
                                                <option value="{{ $cat->id }}">{{ ucwords($cat->category_name_en) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">Sub-Category Name English: <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="subcategory_name_en"
                                            value="{{ old('subcategory_name_en') }}"
                                            placeholder="Enter subcategory name en">
                                        @error('subcategory_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">sub-Category Name Bangla: <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="subcategory_name_bn"
                                            value="{{ old('subcategory_name_bn') }}"
                                            placeholder="Enter subcategory name bn">
                                        @error('subcategory_name_bn')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5"
                                            value="Add Sub Category">
                                    </div>
                                </form>


                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

@endsection
