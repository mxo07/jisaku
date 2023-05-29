<div class="media">
    <div class="media-body comment-body">
        <div class="row">
            <span class="comment-body-user">{{ $comment['id'] }}</span>
            <span class="comment-body-time">{{ $comment['created_at'] }}</span>
        </div>
        <span class="comment-body-content">
        {!! nl2br(e($comment['comment'])) !!}
        </span>
    </div>
</div>