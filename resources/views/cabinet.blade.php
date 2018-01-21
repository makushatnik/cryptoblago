@extends('layout')

@section('content')
	@if ($user->role == 1)
		@foreach ($proposals as $proposal)
			<div class="proposal">
				<span class="id">{{ $proposal->id }}</span>
				<span class="title">
					<a href="/proposal/{{ $proposal->id }}">{{ $proposal->title }}</a>
				</span>
				<span class="created">{{ $proposal->created_at->toFormattedDateString() }}</span>
				<span class="status">{{ $proposal->status }}</span>
				<span class="action">
					<a class="btn btn-success pay-btn" href="/proposal/pay?id={{ $proposal->id }}&user_id=$user->id">Оплатить</a>
				</span>
			</div>
        @endforeach
	@elseif ($user->role == 2)
		@if (!$user->verified)
			<div class="alert alert-danger">
				Вы не верифицированы!
			</div>
		@else
			@foreach ($proposals as $proposal)
				<div class="proposal">
					<span class="id">{{ $proposal->id }}</span>
					<span class="title">
						<a href="/proposal/{{ $proposal->id }}">{{ $proposal->title }}</a>
					</span>
					<span class="created">{{ $proposal->created_at->toFormattedDateString() }}</span>
					<span class="status">{{ $proposal->status }}</span>
					<span class="action">
						<a class="btn btn-success accept-btn" href="/proposal/accept?id={{ $proposal->id }}&user_id=$user->id">Принять</a>
					</span>
				</div>
	        @endforeach
		@endif
	@elseif ($user->role == 3)
		@if (!$user->verified)
			<div class="alert alert-danger">
				Вы не верифицированы!
			</div>
		@else
			@foreach ($proposals as $proposal)
				<div class="proposal">
					<span class="id">{{ $proposal->id }}</span>
					<span class="title">
						<a href="/proposal/{{ $proposal->id }}">{{ $proposal->title }}</a>
					</span>
					<span class="created">{{ $proposal->created_at->toFormattedDateString() }}</span>
					<span class="status">{{ $proposal->status }}</span>
					<span class="action">
						<a class="btn btn-success accept-btn" href="/proposal/accept?id={{ $proposal->id }}&user_id=$user->id">Да</a>
						<a class="btn btn-success accept-btn" href="/proposal/accept?id={{ $proposal->id }}&user_id=$user->id">Нет</a>
					</span>
				</div>
	        @endforeach
		@endif
	@elseif ($user->role == 4)
		<a class="btn btn-success" href="/proposal/create">Подать заявку</a>

        @foreach ($proposals as $proposal)
			<div class="proposal">
				<span class="id">{{ $proposal->id }}</span>
				<span class="title">
					<a href="/proposal/{{ $proposal->id }}">{{ $proposal->title }}</a>
				</span>
				<span class="created">{{ $proposal->created_at->toFormattedDateString() }}</span>
				<span class="status">{{ $proposal->status }}</span>
				<span class="action">
					<a class="btn btn-success accept-btn" href="/proposal/accept?id={{ $proposal->id }}">Принять</a>
				</span>
			</div>
        @endforeach
	@endif
@endsection