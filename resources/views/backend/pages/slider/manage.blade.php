@extends("backend.template.template")
@section("content")
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div class="w-75">
            <h4>Manage Slider</h4>
            <p class="mg-b-0">Selected Category Slider manage from here (Selected by id)</p>
        </div>
        <div class="btn w-25 float-right">
            <a href="{{route('slider.add')}}" class="btn btn-dark">Add Slider</a>
            <a href="{{route('slider.multi')}}" class="btn btn-dark">Add Images</a>
        </div>
    </div>

    <div class="br-pagebody">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <!-- <th>#sl</th> -->
                            <th>Slider Name</th>
                            <th>Category</th>
                            <th>Thumbnail Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="data">     
                        
                        @foreach($slider as $slider)
                            <tr>
                                
                                <td>{{ $slider->title }}</td>
                                <td>{{ $slider->category }}</td>
                                <td>
                                    <img src="{{ asset('backend/slider/'.$slider->picture) }}" alt="" width="150" height="100">
                                </td>
                                <td>{{ $slider->status }}</td>
                                <td>
                                    <a href="{{ route('slider.view',$slider->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('slider.edit',$slider->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('slider.destroy',$slider->id) }}" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteSlider"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div><!-- row -->
    </div><!-- br-pagebody -->
    <!-- Includes in resource/view/backend/includes/footer.blade.php -->
    @include('backend/includes/footer')
    </div>
  </div>
</div>
</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

<!-- Jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/script.js/2.0.2/script.min.js" integrity="sha512-UWtTDM6wtl/qutDD6i1JOGZGiEd92dveVzuLl8sMBkMHlOHcbZdexM7ZrKkeaugW7vhqDnWc2pPD/ohEV+BBbg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@endsection

