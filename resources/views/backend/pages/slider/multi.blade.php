@extends("backend.template.template")
@section("content")
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div class="w-75">
            <h4>Add Image</h4>
            <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
        <div class="btn w-25 float-right">
            <a href="{{route('slider.add')}}" class="btn btn-dark">Add Slider</a>
            <a href="{{route('slider.show')}}" class="btn btn-dark">Manage Slider</a>
        </div>
    </div>

    <div class="br-pagebody">
        <div class="row row-sm">
            <div class="col-md-6 offset-md-3">
                <!-- Validation Errors -->
                <!-- <x-auth-validation-errors class="mb-3" :errors="$errors" /> -->
                <form id="formimage" action="{{route('slider.multistore')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-3 form-group">
                        <select name="slider_id" class="slider_id form-control":value="old('slider_id')" >
                            <option value="">-------Select Slider-------</option>
                            @foreach($slider as $slider)
                            <option value="{{ $slider->id }}">{{$slider->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3 form-group">
                        <input type="file" name="pictures[]" class="pictures form-control" placeholder="Slider picture":value="old('picture')" multiple>
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