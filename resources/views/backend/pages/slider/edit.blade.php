@extends("backend.template.template")
@section("content")

<style>
    .image {
        width: 250px;
        position: relative;
    }
    .image img:hover + .action{
        display: flex;
        flex-direction: row;
    }
    .image .action {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: rgba(0, 0, 0, 0.5);
        display: none;
        justify-content: center;
        align-items: center;
    }
</style>
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div class ="w-75">
            <h4>Add Slider</h4>
            <p class="mg-b-0">All Categories Slider added from here</p>
        </div>
        <div class="btn w-25 float-right">
            <a href="{{route('slider.show')}}" class="btn btn-dark">View Slider</a>
        </div>
    </div>

    <div class="br-pagebody">
        <div class="row row-sm">
            <div class="col-md-4">
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-3" :errors="$errors" />
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-3 form-group">
                        <input value="{{ $slider->title }}" type="text" name="title" class="title form-control" placeholder="Slider Title":value="old('title')" required>
                    </div>
                    <div class="mt-3 form-group">
                        <input value="{{ $slider->category }}" type="text" name="category" class="category form-control" placeholder="Slider category":value="old('category')" required>
                    </div>
                    <div class="form-group">
                        <img src="{{ asset('backend/slider/'.$slider->picture) }}" class="w-100">
                    </div>
                    <div class="mt-3 form-group">
                        <textarea  name="description" class="description form-control" placeholder="Slider description":value="old('description')" required>{{ $slider->description }}</textarea>
                    </div>
                    <div class="mt-3 form-group">
                        <input type="file" name="picture" class="picture form-control" placeholder="Slider picture":value="old('picture')" required>
                    </div>
                    <div class="mt-3 form-group">
                        <input value="{{ $slider->link }}" type="text" name="link" class="link form-control" placeholder="Slider link":value="old('link')" required>
                    </div>
                    <div class="mt-3 form-group">
                        <select value="{{ $slider->status }}" name="status" class="status form-control":value="old('status')" required>
                            <option value="">-------Select Status-------</option>
                            <option value="1" @if($slider->status == 1) selected @endif>Active</option>
                            <option value="2" @if($slider->status == 0) selected @endif>Inactive</option>
                        </select>
                    </div>
                    <button class="add-slider btn btn-success">Update Slider</button>
                </form>
            </div>

            <div class="col-md-8">
                @foreach($multi as $multi)
                <div class="m-3 image d-flex">
                    <img src="{{ asset('backend/slider/images/'.$multi->picture) }}" class="w-100">
                    <div class="action">
                        <a href="{{ Route('slider.destroyimg',$multi->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                    </div>
                </div>
                @endforeach

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-3" :errors="$errors" />
                <form action="{{route('slider.multistore')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="slider_id" value="{{ $slider->id }}" hidden>
                    </div>
                    <div class="mt-3 form-group">
                        <input type="file" name="pictures[]" class="pictures form-control":value="old('pictures')" required multiple>
                    </div>
                    <button class="add-image btn btn-success">Add Image</button>
                </form>
            </div>
        </div><!-- row -->
    </div><!-- br-pagebody -->
    <!-- Includes in resource/view/backend/includes/footer.blade.php -->
    @include('backend/includes/footer')
</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

@endsection