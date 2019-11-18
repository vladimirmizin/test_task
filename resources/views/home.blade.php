@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form class="submit_form">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputPassword1">Comment</label>
                                <textarea class="form-control" name="comment" id="comment_body" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <br>
                        @include('comments', ['comments' => $comments])
                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('submit','.submit_form', function(e){
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '/comment/add',
                data: $(this).serialize(),
                success: function(result){
                    $('#comment_body').val("")
                    $('#comments').html(result);

                }
            });
        });
        $(document).on('click',".showbutton", function () {
            $(this).siblings("#showblock").toggle("slow");
        });
    });
</script>
@endsection


