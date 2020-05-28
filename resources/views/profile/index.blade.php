@extends('layouts.app')

@section('content')
<div class="container" style="padding: 30px 20px 0;">
	<div class="row">
		<div class="col-3 p-5">
			<img src="{{ $user->profile->profileImage() }}" alt="" class="rounded-circle w-100" />
		</div>
		<div class="col-9 pt-5">
			<div class="d-flex justify-content-between align-items-baseline">
				<div class="d-flex">
					<div class="h3">{{ $user->username }}</div>

					<x-follow-button :userid="$user->id" :follows="$follows" />
				</div>


				@can('update', $user->profile)
				<a href="/p/create">Add new post</a>
				@endcan

			</div>

			@can('update', $user->profile)
			<a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
			@endcan

			<div class="d-flex">
				<div class="pr-5"><strong>{{ $postCount }}</strong> posts</div>
				<div class="pr-5"><strong>{{ $followersCount }}</strong> followers</div>
				<div class="pr-5"><strong>{{ $followingCount }}</strong> followings</div>
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