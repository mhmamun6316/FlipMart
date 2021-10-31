@extends('layouts.admin_master')


@section('admin-content')

    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-3">

                </div>
                
                <div class="col-6">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Brand Edit</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">


                            <form action="{{ route('update.brand', $brand->id) }}" method="POST"
                                enctype="multipart/form-data">

                                @csrf

                                <input type="hidden" name="id" value="{{ $brand->id }}">
                                <input type="hidden" name="old_image" value="{{ $brand->brand_image }}">

                                <div class="form-group">
                                    <label class="form-control-label">Brand Name English: <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="brand_name_en" value="{{ $brand->brand_name_en }}" placeholder="Enter brand_name_en">
                                    @error('brand_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">Brand Name Bangla: <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="brand_name_bn" value="{{ $brand->brand_name_bn }}" placeholder="Enter brand_name_bn">
                                    @error('brand_name_bn')
                                    <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">Brand Image: <span class="text-danger">*</span></label>
                                    <input class="form-control" type="file" name="brand_image" placeholder="Enter brand_name_bn">
                                    @error('brand_image')
                                    <span class="text-danger">{{ $message }}</span>
                                 @enderror
                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Update Brand">
                                </div>

                            </form>

                        </div>
                    </div>


                </div>

                <div class="col-3">

                </div>

                <!-- /.col -->

            </div>

        </section>
    </div>

@endsection
