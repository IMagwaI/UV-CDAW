<?php

@section('content');

<div>
    @foreach ($categories as $category)
        <b>{{$category->name}}</b><br>
    @endforeach
    </div>