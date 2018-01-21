@extends('layout')

@section('content')
	<div class="proposal-form">
		<form action="/proposal/create" method="post">
			{{ csrf_field() }}
			<input type="hidden" name="user_id" value="{{ $userId }}">

			<div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" name="title" required />
            </div>
            <div class="form-group">
                <label for="body">Назначение заявки</label>
                <textarea name="body" required></textarea>
            </div>
            <div class="form-group">
                <label for="sum">Сумма</label>
                <input type="text" name="sum" required />
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Создать заявку</button>
            </div>

            @include('layouts.errors')
		</form>
	</div>
@endsection