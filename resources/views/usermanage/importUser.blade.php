@extends('layouts.app')
@section('content')
    <div class="container">
        <form class="form-horizontal" action="/usermanagement" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <label class="file-upload">
                        Browse for file ... <input type="file" name="file" />
                    </label>
                    <button type="submit" class="btn btn-info">Submit</button>
                </div>
            </div>
        </form>
    </div>

@endsection