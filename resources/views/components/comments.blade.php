 @foreach($comments as $comment)
<div class="comment-item">
<div class="comment-img">
<img src="{{ asset('storage/userAvatar/'.$comment->path) }}" alt="">
</div>
			<div class="comment-text">
			<div class="phantom">
            <p class="comment-name">{{ $comment->user_name }}</p>
            <p class="comment-date">{{ $comment->created_at }}</p>
            @auth
            @if(Auth::user()->status == 'admin')
            <button class="delete_btn" value="{{ $comment->id }}"><img class="delete_img" src="{{ asset('storage/img/delete.png') }}" alt=""></button>
            @endif
            @endauth
        	</div>
            <p class="comment-text2">{{ $comment->text }}</p>
            </div>
</div>
 @endforeach

<style type="text/css">
	img {
		width: 150px;
		height: 150px;
		border-radius: 150px; 
	}

	.comment-text {
		margin-left: 3%;
		margin-top: 2%;
	}

	.comment-item {
		display: flex;
		margin-top: 10%;
	}

	.comment-name {
		font-size: 24px;
	}

	.phantom {
		display: flex;
		white-space: nowrap;

	}

	.comment-text2 {
		font-size: 24px;
		margin-top: 6%;
	}

	.comment-date {
		font-size: 16px;
		color: #9D9D9D;
		margin-top: 2%;
		margin-left: 15%;
	}

	.delete_btn {
		width: 30px;
		height: 25px;
		padding: auto;
		position: relative;
		margin-top: 1%;
		right: 10%;
	}

	.delete_img {
		width: 25px;
		height: 25px;
	}
</style>