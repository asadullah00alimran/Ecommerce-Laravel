@extends("backend.template.template")
@section("content")
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>Manage Slider</h4>
            <p class="mg-b-0">Selected Category Slider manage from here (Selected by id)</p>
        </div>
    </div>

    <div class="br-pagebody">
        <div class="row row-sm">

        </div><!-- row -->
    </div><!-- br-pagebody -->
    <!-- Includes in resource/view/backend/includes/footer.blade.php -->
    @include('backend/includes/footer')
</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

@endsection