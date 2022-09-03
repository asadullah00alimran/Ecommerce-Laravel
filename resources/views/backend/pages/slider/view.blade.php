@extends("backend.template.template")
@section("content")

<style>
    .image {
        width: 400px;
        position: relative;
    }
    .image img:hover + .action{
        display: flex;
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
        <div class="w-75">
            <h4>Slider Details</h4>
            <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
        <div class="btn w-25 float-right">
            <a href="{{route('slider.add')}}" class="btn btn-dark">Add Slider</a>
            <a href="{{route('slider.show')}}" class="btn btn-dark">Manage Slider</a>
        </div>
    </div>

    <div class="br-pagebody">
        <div class="row">
            <div class="col-md-12"style="background: white;">
                <table class="table">
                    <tr>
                        <th>Slider Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Link</th>
                        <th>Status</th>
                    </tr>
                    <tr>
                        <td>{{ $slider->title }}</td>
                        <td>{{ $slider->category }}</td>
                        <td>{{ $slider->description }}</td>
                        <td>{{ $slider->link }}</td>
                        <td>{{ $slider->status }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="mt-3 row">
            <div class="col-md-4">
                <img src="{{ asset('backend/slider/'.$slider->picture) }}" width="100%">
            </div>
            <div class="col-md-8">
                @foreach($multi as $multi)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="image">
                                <img src="{{asset('backend/slider/images/'.$multi->picture)}}" class="mt-2 w-100">
                                <div class="action">
                                    <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div><!-- br-pagebody -->

    <!-- Includes in resource/view/backend/includes/footer.blade.php -->
    @include('backend/includes/footer')

</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

<script>
    jQuery(document).ready(function(){
        jQuery(".image").mouseover(function (){
            jQuery(".image").toggleClass("action");
        });
    });
</script>

@endsection