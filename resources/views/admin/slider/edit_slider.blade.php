@extends('layouts.admin_master')


@section('admin-content')


    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-2"></div>
                
                <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Slider Edit</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">


                            <form action="{{ route('update.slider', $slider->id) }}" method="POST"
                                enctype="multipart/form-data">

                                @csrf

                                <input type="hidden" name="old_image" value="{{ $slider->image }}">
                                <input type="hidden" name="id" value="{{ $slider->id }}">

                                @if ($slider->title_en == null)
                                @else
                                    <div class="form-group">
                                        <label class="form-control-label">Slider Title English: <span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="title_en"
                                            value="{{ $slider->title_en }}" placeholder="Enter slider title English">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">Slider Title Bangla: <span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="title_bn"
                                            value="{{ $slider->title_bn }}" placeholder="Enter slider title Bangla">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">SLider Description English: <span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="description_en"
                                            value="{{ $slider->description_en }}" placeholder="Enter description English">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">SLider Description Bangla: <span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="description_bn"
                                            value="{{ $slider->description_bn }}" placeholder="Enter description Bangla">
                                    </div>

                                @endif


                                <div class="form-group">
                                    <label class="form-control-label">Slider Image: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="file" name="image"
                                        placeholder="Enter brand_name_bn">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label class="form-control-label">Old Image: <span
                                            class="tx-danger">*</span></label>
                                    <img src="{{ asset($slider->image) }}" height="60px" width="150px;" alt="">
                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Update Slider">
                                </div>

                            </form>

                        </div>
                    </div>


                </div>

                <div class="col-2"></div>

                <!-- /.col -->
            </div>
        </section>
    </div>

@endsection
