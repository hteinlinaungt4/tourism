@foreach ($package as $p)
<div class="rom-btm">
    <div class="col-md-3 room-left wow fadeInLeft animated" data-wow-delay=".5s">
        <img src="{{asset('storage/packages/'.$p->image)}}" class="img-responsive" alt="">
    </div>
    <div class="col-md-6 room-midle wow fadeInUp animated" data-wow-delay=".5s">
        <h4>Package Name: {{$p->name}}</h4>
        <h6>Package Type : {{$p->packageType}}</h6>
        <p><b>Package Location :</b> {{$p->location}}</p>
        <p><b>Features</b> {{$p->features}}</p>
    </div>
    <div class="col-md-3 room-right wow fadeInRight animated" data-wow-delay=".5s">
        <h5>USD {{$p->price}}</h5>
        <a href="{{route('package.detail.list',$p->id)}}" class="view">Details</a>
    </div>
    <div class="clearfix"></div>
</div>
@endforeach

<div id="pagination-links">
    {{ $package->links() }}
</div>