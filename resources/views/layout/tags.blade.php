<ul class="tag mtb-50">
    @foreach($tags as $tag)
        <li><a style="border-radius: 5px;background: lightgray;border: lightgray;color: #6d6d6d;" href="{{url('/tags/'.$tag->slug)}}"><b>{{$tag->name}}</b></a></li>
    @endforeach
</ul>