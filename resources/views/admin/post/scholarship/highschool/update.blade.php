@extends('adminlte::page')

@section('title', 'Update product')

@section('content_header')
    <h1 class="font-weight-bold text-center text-primary">Update Post High School</h1>
@stop

@section('content')
    <form action={{route('highschool.update',$highschools->id)}} method='post' enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('PUT')}}

        <input type="hidden" name="id" id="id" value="{{$highschools->id}}">
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
        <div class="form-group">
            <label for="pname">Country Name</label>
            <input type="text" name = "country_name" class="form-control" id="pname"  placeholder="Product name" value="{{$highschools->country_name}}">
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" value="highschool" name="category" id="defaultCheck1">
            <label class="form-check-label font-weight-bold" for="defaultCheck1">
                highschool
            </label>
        </div>

        <div>
            <div class="form-group">
                <label for="pimg">Product image</label>
                <input type="file" name = "image" class="form-control-file" id="pimg" value="{{asset("ScholarshiphighschoolImages/".$highschools->image)}}">
            </div>

            <div class="form-group">
                <label for="pdes">Product description</label>
                <textarea id="summary-ckeditor" name="description" class="form-control" value="sdfksljdflksjldjflksjdlfkjksdf"></textarea>
            </div>

            <a href="{{route('highschool.index')}}" class="btn btn-warning">Cancel</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor' );
    </script>
    <script>
        function display_ct7() {
            var x = new Date()
            var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
            hours = x.getHours( ) % 12;
            hours = hours ? hours : 12;
            hours=hours.toString().length==1? 0+hours.toString() : hours;

            var minutes=x.getMinutes().toString()
            minutes=minutes.length==1 ? 0+minutes : minutes;

            var seconds=x.getSeconds().toString()
            seconds=seconds.length==1 ? 0+seconds : seconds;

            var month=(x.getMonth() +1).toString();
            month=month.length==1 ? 0+month : month;

            var dt=x.getDate().toString();
            dt=dt.length==1 ? 0+dt : dt;

            var x1=month + "/" + dt + "/" + x.getFullYear();
            x1 = x1 + " - " +  hours + ":" +  minutes + ":" +  seconds + " " + ampm;
            document.getElementById('ct7').innerHTML = x1;
            display_c7();
        }
        function display_c7(){
            var refresh=1000; // Refresh rate in milli seconds
            mytime=setTimeout('display_ct7()',refresh)
        }
        display_c7()
    </script>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
