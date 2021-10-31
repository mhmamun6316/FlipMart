@extends('layouts.admin_master')
@section('admin-content')


    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-2"></div>


                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit SubCategory </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">


                                <form method="post" action="{{ route('update.subcategory') }}">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $subcategory->id }}">

                                    <div class="form-group">
                                        <label class="form-control-label">Select Category: <span
                                                class="tx-danger">*</span></label>
                                        <select class="form-control select2-show-search" data-placeholder="Select One"
                                            name="category_id">
                                            <option label="Choose one"></option>
                                            @foreach ($categories as $cat)
                                                <option value="{{ $cat->id }}"
                                                    {{ $cat->id == $subcategory->category_id ? 'selected' : '' }}>
                                                    {{ ucwords($cat->category_name_en) }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">Sub-Category Name English: <span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="subcategory_name_en"
                                            value="{{ $subcategory->subcategory_name_en }}"
                                            placeholder="Enter subcategory name en">
                                        @error('subcategory_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">sub-Category Name Bangla: <span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="subcategory_name_bn"
                                            placeholder="Enter subcategory name bn"
                                            value="{{ $subcategory->subcategory_name_bn }}">
                                        @error('subcategory_name_bn')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                                    </div>
                                </form>


                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>

                <div class="col-2"></div>

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
@endsection
