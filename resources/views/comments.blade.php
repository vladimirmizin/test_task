
<div id="comments">
        @if($comments)
            @foreach($comments as $comment)
                <div class="card">
                    <div class="card-body comment-body">
                        <div class="card-text">
                            {{$comment['comment']}}
                        </div>
                        <div class="card-subtitle"><p>{{$comment->author['name']}}</p></div>
                        <button class="showbutton">Add Comment</button>
                        <div id="showblock">
                            <form class="submit_form">
                                @csrf
                                <div class="form-group" >
                                    <input type="hidden" name="parent_id" id="parent_id_{{$comment['id']}}" value="{{$comment['id']}}">
                                    <label for="exampleInputPassword1">Comment</label>
                                    <textarea class="form-control" name="comment" id="comment_body_{{$comment['id']}}" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary submit-sub-form">Submit</button>
                            </form>
                        </div>
                        @if(count($comment->sub_comments)>=1)
                            @foreach($comment->sub_comments as $sub_comment)
                                <br>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-text">
                                            {{$sub_comment['comment']}}
                                        </div>
                                        <div class="card-subtitle"><p>{{$comment->author['name']}}</p></div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <br>
            @endforeach
        @endif
</div>
