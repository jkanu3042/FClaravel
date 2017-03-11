<div class="panel">
  <div class="panel-body">
      <h4><a href="{{ route('profile',['user'=>$user->id]) }}">{{ $user->name }}</a></h4>
      <p>{{ $user->email }}</p>
  </div>
</div>
