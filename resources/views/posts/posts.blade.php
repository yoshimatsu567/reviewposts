@if(count($posts) > 0)
    @foreach($posts as $post)
        <div class="post">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/VC4ORS5n9Hg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          <h3>{!! (e($post->title)) !!}</h3>
          <p>{!! (e($user->name)) !!}</p>
          <a href="#" class="btn-flat-border">Read more</a>
        </div>
@endif