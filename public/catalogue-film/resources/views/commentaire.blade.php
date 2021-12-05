@if ($comments)
    @foreach ($comments as $comment)
        <div class="comment mt-4 text-justify float-left">
            <img src="{{ $comment->user->image }}"
                onError="this.src = 'https://bootdey.com/img/Content/avatar/avatar7.png'"
                alt="{{ $comment->user->name }}" class="rounded-circle" width="40" height="40">
            <h4>{{ $comment->user->name }}</h4>
            <span style="font-size: 12px">{{ $comment->created_at->diffForHumans() }}</span>
            <br>
            <p>{{ $comment->text }}</p>
            @if ($comment->etat_moderation == 0)
                <span style="color: red">Ce commentaire est en attente de modération</span>
            @endif
            @if (Auth::check())
                <form action="{{ route('updateComment', [$comment->id, $comment->media_id]) }}" method="PUT">
                    @csrf
                    @method('put')
                    <input type="text" name="text" value="{{ $comment->text }}" class="form-control">
                    <button type="submit" class="get-started-btn  btn-warning btn-sm">Update</button>
                </form>
                <form action="{{ route('deleteComment', [$comment->id, $comment->media_id]) }}" method="DELETE">
                    @csrf
                    @method('delete')
                    <button type="submit" class="get-delete-btn  btn-danger btn-sm">Delete</button>
                </form>
            @endif

        </div>
    @endforeach
@endif
@if (!$comments)
    <p>Aucun commentaire pour le moment</p>
@endif
