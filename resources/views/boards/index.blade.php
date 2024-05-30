@extends('boards.layout')

@section('content')
여기에 게시판 만들거야

<a href="/boards/create">글쓰기</a>

<!-- < ?php 대신 사용하는 것 -->
<a href="{{ route('boards.create') }}">글쓰기</a>
@endsection