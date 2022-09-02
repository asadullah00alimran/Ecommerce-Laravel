@extends("backend.template.template")
@section("content")
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
            <div class="col-md-6 offset-md-3">
                <!-- Validation Errors -->
                 <x-auth-validation-errors class="mb-3" :errors="$errors" />
                <form action="{{ Route('slider.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-3 form-group">
                        <input type="text" name="title" class="title form-control" placeholder="Slider Title":value="old('title')" required>
                    </div>
                    <div class="mt-3 form-group">
                        <input type="text" name="category" class="category form-control" placeholder="Slider category":value="old('category')" required>
                    </div>
                    <div class="mt-3 form-group">
                        <textarea name="description" class="description form-control" placeholder="Slider description":value="old('description')" required></textarea>
                    </div>
                    <div class="mt-3 form-group">
                        <input type="file" name="picture" class="picture form-control" placeholder="Slider picture":value="old('picture')" required>
                    </div>
                    <div class="mt-3 form-group">
                        <input type="text" name="link" class="link form-control" placeholder="Slider link":value="old('link')" required>
                    </div>
                    <div class="mt-3 form-group">
                        <select name="status" class="status form-control":value="old('status')" required>
                            <option value="">-------Select Status-------</option>
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                        </select>
                    </div>
                    <button class="add-slider btn btn-success">Add Slider</button>
                </form>
            </div>
        </div><!-- row -->
    </div><!-- br-pagebody -->
    <!-- Includes in resource/view/backend/includes/footer.blade.php -->
    @include('backend/includes/footer')
</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

@endsection