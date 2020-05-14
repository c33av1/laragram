@extends('layouts.app')

@section('content')
<div class="container" style="padding: 30px 20px 0;">
	<div class="row">
		<div class="col-3 p-5">
			<img src="https://instagram.fyvr3-1.fna.fbcdn.net/v/t51.2885-19/s150x150/67482572_515807549187915_4763076872512733184_n.jpg?_nc_ht=instagram.fyvr3-1.fna.fbcdn.net&_nc_ohc=7PM9pN8hAUEAX_uCvi4&oh=74166b276837be6d414410d86aa7da79&oe=5EDE3581" alt="" class="rounded-circle" />
		</div>
		<div class="col-9 pt-5">
			<div class="d-flex justify-content-between align-items-baseline">
				<h1>{{ $user->username }}</h1>
				<a href="/p/create">Add new post</a>
			</div>

			<a href="/profile/{{ $user->id }}/edit">Edit Profile</a>

			<div class="d-flex">
				<div class="pr-5"><strong>{{ $user->posts->count() }}</strong> posts</div>
				<div class="pr-5"><strong>23k</strong> followers</div>
				<div class="pr-5"><strong>212</strong> followings</div>
			</div>
			<div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
			<div>
				{{ $user->profile->description }}<br />
				<a href="#">{{ $user->profile->url }}</a>
			</div>
		</div>

		<div class="row pt-5">
			@foreach($user->posts as $post)

			<div class="col-4 pb-4">
				<a href="/p/{{ $post->id }}"><img src="/storage/{{ $post->image }}" class="w-100" /></a>
			</div>

			@endforeach

		</div>
	</div>
</div>
@endsection