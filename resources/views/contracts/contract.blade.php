@extends('layouts/logged')

@section('title', 'Contract')

@section('body_class', 'contract')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    {{--CONTRACT TYPE--}}
                    {{$conType}}:&nbsp;
                    {{--COMPANY_NAME--}}
                    <small>{{ $company->company }}</small>
                </h1>
                <input type="text" class="form-control" style="width: 300px;margin-top:5px;" placeholder="Search Contract ....">
                <div class="panel-group" id="accordion1">
                    @foreach($topics as $topic)
                        <div class="panel panel-default">
                        <div class="panel-heading accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" data-target="#{{$topic->slug}}">
                            <h4 class="panel-title">{{$topic->topic}} </h4>
                            <span class="pull-right" style="margin-top:-16px;">
                                <i class="btnEdit fa fa-pencil"></i>
                            </span>
                        </div>
                        <div id="{{$topic->slug}}" class="panel-collapse collapse">
                            <div class="panel-body">
                                @include("contracts.GTA." . $topic->slug)
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->
@endsection

@section('footer')
    @include('layouts/partials/footer')
@endsection

@push('scripts')
<script>
    $(function() {
        $('#accordion1').on('shown.bs.collapse', function () {
            var myEl = $(this).find('.collapse.in').prev('.panel-heading');

            $('html, body').animate({
                scrollTop: $(myEl).offset().top
            }, 100);
        });

        /*$('#accordion1 .btnEdit')
            .off('click')
            .on('click', function() {
                alert('clicked');
            });​*/
    });
</script>
@endpush