@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">

            <p>
                You can download the PDF by clicking on the link:
                <a href="{{URL::to('examples/pdf/downloadPDF')}}">here</a>
            </p>
              
            <iframe src="{{URL::to('examples/pdf/generatePDF')}}" width="700px" height=1200px"></iframe>
            
        </div>

        @include('examples.sidebar-examples', ['currentExample' => $currentExample])

    </div>
</div>

@endsection

@push('scripts')
<script>
$(function() {

});
</script>
@endpush
