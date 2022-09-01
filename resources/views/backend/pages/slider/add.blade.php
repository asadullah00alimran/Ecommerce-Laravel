@extends("backend.template.template")
@section("content")
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>Add Slider</h4>
            <p class="mg-b-0">All Categories Slider added from here</p>
        </div>
    </div>

    <div class="br-pagebody">
        <div class="row row-sm">
            <div class="col-md-6 offset-md-3">
                <form action="{{ Route('slider.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-3 form-group">
                        <input type="text" name="title" class="title form-control" placeholder="Slider Title">
                    </div>
                    <div class="mt-3 form-group">
                        <input type="text" name="category" class="category form-control" placeholder="Slider category">
                    </div>
                    <div class="mt-3 form-group">
                        <textarea name="description" class="description form-control" placeholder="Slider description"></textarea>
                    </div>
                    <div class="mt-3 form-group">
                        <input type="file" name="picture" class="picture form-control" placeholder="Slider picture">
                    </div>
                    <div class="mt-3 form-group">
                        <input type="text" name="link" class="link form-control" placeholder="Slider link">
                    </div>
                    <!-- <div class="mt-3 form-group">
                        <select name="status" class="status form-control">
                            <option value="">-------Select Status-------</option>
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                        </select>
                    </div> -->
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