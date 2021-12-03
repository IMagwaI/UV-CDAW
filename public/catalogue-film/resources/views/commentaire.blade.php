@if ($comments)
    @foreach ($comments as $comment)
        <div class="comment mt-4 text-justify float-left"> <img src="{{ $comment->user->image }}"
                onError="this.src = 'https://bootdey.com/img/Content/avatar/avatar7.png'" alt="" class="rounded-circle"
                width="40" height="40">
            <h4>{{ $comment->user->name }}</h4>
            <span style="font-size: 12px">{{ $comment->created_at->diffForHumans() }}</span>
            <br>
            <p>{{ $comment->text }}</p>
            <button class="modify">Modify Comment</button>
            <button class="remove">Remove Comment</button>
        </div>
    @endforeach
@endif
@if (!$comments)
    <p>Aucun commentaire pour le moment</p>
@endif
