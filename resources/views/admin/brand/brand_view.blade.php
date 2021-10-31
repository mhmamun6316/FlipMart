@extends('layouts.admin_master')


@section('admin-content')


    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">


                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title"> All Brands</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>

                                            <th>Brand Name EN</th>
                                            <th>Brand Name BN</th>
                                            <th>Brand Img</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                     @foreach ($brands as $item)
                                        <tr>					

                                            <td>{{ $item->brand_name_en }}</td>
                                            <td>{{ $item->brand_name_bn }}</td>
                                            <td>

                                                <img src="{{ asset($item->brand_image) }}" alt="" style="width: 80px;">
                                            </td>

                                            <td>
                                                <a href="{{ url('admin/brand/edit/'.$item->id) }}" class="btn btn-sm btn-primary" title="edit data"> <i class="fa fa-pencil"></i></a>

                                                <a href="{{ url('admin/brand/delete/'.$item->id) }}" class="btn btn-sm btn-danger" id="delete" title="delete data"><i class="fa fa-trash"></i></a>
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

                <div class="col-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Brand Add</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label class="form-control-label">Brand Name English: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="brand_name_en"
                                        value="{{ old('brand_name_en') }}" placeholder="Enter brand_name_en">
                                    @error('brand_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label class="form-control-label">Brand Name Bangla: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="brand_name_bn"
                                        value="{{ old('brand_name_bn') }}" placeholder="Enter brand_name_bn">
                                    @error('brand_name_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">Brand Image: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="file" name="brand_image"
                                        placeholder="Enter brand_name_bn">
                                    @error('brand_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Add Brand">
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>

@endsection
