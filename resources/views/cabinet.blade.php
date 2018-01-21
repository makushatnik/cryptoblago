@extends('layout')

@section('content')
	@if ($user->role == 1)
		<div class="grid">
			@foreach ($proposals as $proposal)
				<div class="card">
				  <div class="card-block">
				    <h3 class="card-title">{{ $proposal->title }}</h3>
				    <h4 class="card-title">От {{ $proposal->created_at->toFormattedDateString() }}</h4>
				    <p class="card-text">{{ $proposal->body }}</p>
				    <span class="card-status">
				    	@if ($proposal->status == 0)
							Активная
						@elseif ($proposal->status == 1)
							Исполненная
						@endif
				    </span>
				    <a href="#" class="btn btn-success" href="/proposal/pay?id={{ $proposal->id }}&user_id=$user->id">Оплатить</a>
				  </div>
				</div>
	        @endforeach
        <div>
	@elseif ($user->role == 2)
		@if (!$user->verified)
			<div class="alert alert-danger">
				Вы не верифицированы!
			</div>
		@else
			<div class="grid">
				@foreach ($proposals as $proposal)
					<div class="card">
					  <div class="card-block">
					    <h3 class="card-title">{{ $proposal->title }}</h3>
					    <h4 class="card-title">От {{ $proposal->created_at->toFormattedDateString() }}</h4>
					    <p class="card-text">{{ $proposal->body }}</p>
					    <span class="card-status">
					    	@if ($proposal->status == 0)
								Активная
							@elseif ($proposal->status == 1)
								Исполненная
							@endif
					    </span>
					    <a href="#" class="btn btn-success accept-btn" href="/proposal/accept?id={{ $proposal->id }}&user_id=$user->id">Принять</a>
					  </div>
					</div>
		        @endforeach
	        </div>
		@endif
	@elseif ($user->role == 3)
		@if (!$user->verified)
			<div class="alert alert-danger">
				Вы не верифицированы!
			</div>
		@else
			<div class="grid">
				@foreach ($proposals as $proposal)
					<div class="card">
					  <div class="card-block">
					    <h3 class="card-title">{{ $proposal->title }}</h3>
					    <h4 class="card-title">От {{ $proposal->created_at->toFormattedDateString() }}</h4>
					    <p class="card-text">{{ $proposal->body }}</p>
					    <span class="card-status">
					    	@if ($proposal->status == 0)
								Активная
							@elseif ($proposal->status == 1)
								Исполненная
							@endif
					    </span>
					    <a class="btn btn-success accept-btn" href="/proposal/accept?id={{ $proposal->id }}&user_id=$user->id&yes">Да</a>
						<a class="btn btn-success accept-btn" href="/proposal/accept?id={{ $proposal->id }}&user_id=$user->id&no">Нет</a>
					  </div>
					</div>
		        @endforeach
	        </div>
		@endif
	@elseif ($user->role == 4)
		<a class="btn btn-success" href="/proposal/create">Подать заявку</a>

		<div class="grid">
	        @foreach ($proposals as $proposal)
				<div class="card">
				  <div class="card-block">
				    <h3 class="card-title">{{ $proposal->title }}</h3>
				    <h4 class="card-title">От {{ $proposal->created_at->toFormattedDateString() }}</h4>
				    <p class="card-text">{{ $proposal->body }}</p>
				    <span class="card-status">
				    	@if ($proposal->status == 0)
							Активная
						@elseif ($proposal->status == 1)
							Исполненная
						@endif
				    </span>
				    <a class="btn btn-success accept-btn" href="/proposal/accept?id={{ $proposal->id }}">Принять</a>
				  </div>
				</div>
	        @endforeach
        </div>
	@endif
@endsection
