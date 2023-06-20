<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Blogs</title>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap");

    *, *::before, *::after {
      box-sizing: border-box;
      padding: 0;
      margin: 0;
    }

    body {
      font-family: "Quicksand", sans-serif;
      display: grid;
      place-items: center;
      height: 100vh;
      background: #7f7fd5;
      background: linear-gradient(to right, #91eae4, #86a8e7, #7f7fd5);
    }

    .container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      max-width: 1200px;
      margin-block: 2rem;
      gap: 2rem;
    }

    img {
      max-width: 100%;
      display: block;
      object-fit: cover;
    }

    .card {
      display: flex;
      flex-direction: column;
      width: clamp(20rem, calc(20rem + 2vw), 22rem);
      overflow: hidden;
      box-shadow: 0 .1rem 1rem rgba(0, 0, 0, 0.1);
      border-radius: 1em;
      background: #ECE9E6;
      background: linear-gradient(to right, #FFFFFF, #ECE9E6);
    }

    .card__body {
      padding: 1rem;
      display: flex;
      flex-direction: column;
      gap: .5rem;
    }

    .tag {
      align-self: flex-start;
      padding: .25em .75em;
      border-radius: 1em;
      font-size: .75rem;
    }

    .tag + .tag {
      margin-left: .5em;
    }

    .tag-blue {
      background: #56CCF2;
      background: linear-gradient(to bottom, #2F80ED, #56CCF2);
      color: #fafafa;
    }

    .tag-brown {
      background: #D1913C;
      background: linear-gradient(to bottom, #FFD194, #D1913C);
      color: #fafafa;
    }

    .tag-red {
      background: #cb2d3e;
      background: linear-gradient(to bottom, #ef473a, #cb2d3e);
      color: #fafafa;
    }

    .card__body h4 {
      font-size: 1.5rem;
      text-transform: capitalize;
    }

    .card__footer {
      display: flex;
      padding: 1rem;
      margin-top: auto;
    }

    .user {
      display: flex;
      gap: .5rem;
    }

    .user__image {
      border-radius: 50%;
    }

    .user__info > small {
      color: #666;
    }

    /* Add the CSS for the text links */
    .text-links {
    position: absolute;
    top: 1rem;
    right: 1rem;
    display: flex;
    gap: 1rem;
    font-size: 1rem;
    font-weight: bold;
    text-decoration: none;
  }

  .text-links a {
    color: #182346; /* Grey color */
    transition: color 0.3s ease;
    text-decoration: none;
  }

  .text-links a:hover {
    color: #000; /* Black color on hover */
    text-decoration: underline;
  }
    
      /* Whatsaap Image */
      .float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color:#000000;
	color:#FFF;
	border-radius:50px;
	text-align:center;
  font-size:28px;
	/* box-shadow: 2px 2px 3px #999; */
  z-index:100;
}

.my-float{
	margin-top:16px;
}
  </style>
</head>
<body>
    
<div class="text-links">
    @if (Route::has('login'))
        @auth
        <a href="{{ url('dashboard/') }}">Dashboard</a>
    @else
        <a href="{{ route('login') }}">Log in</a>
    @if (Route::has('register'))
        <a href="{{ route('register') }}">Register</a>
    @endif
        @endauth        
    @endif
</div>

{{-- Create Post Image --}}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
@if (auth()->check())
<a href="{{ url('/dashboard') }}" class="float" target="_blank">
  <i class="fa fa-plus-square my-float"></i>
  </a>
@else
<a href="{{ route('login') }}" class="float" target="_blank">
  <i class="fa fa-sign-in my-float"></i>
  </a>
@endif
{{-- Create Post Image end --}}

<div class="container">
  @foreach ($posts as $post)
  <div class="card">
    <div class="card__header">
      <img src="https://i.gifer.com/PcWZ.gif" alt="card__image" class="card__image" width="600">
    </div>
    <div class="card__body">
      <h4>{{ $post->title }}</h4>
      <div>{!! $post->description !!}</div>
    </div>
    <div class="card__footer">
      <div class="user">
        <img src="https://i.pravatar.cc/40?img=1" alt="user__image" class="user__image">
        <div class="user__info">
          <h5>Jane Doe</h5>
          <small>2h ago</small>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
</body>
</html>