<div class="largeSlider">
  @foreach ( $property->gallery as $gallery )
    @foreach ( $gallery->medias as $media )
      <div class="single-item" style="background-image: url('{{ $media->url }}')"></div>
    @endforeach
  @endforeach

  {{-- <div class="single-item" style="background-image: url('https://source.unsplash.com/random/1600x900/?property')"></div> --}}

  {{-- <div class="single-item" style="background-image: url('https://swiperjs.com/demos/images/nature-1.jpg')"></div> --}}
</div>

<div class="thumbSlider">
  @foreach ( $property->gallery as $gallery )
    @foreach ( $gallery->medias as $media )
      <div class="single-item" style="background-image: url('{{ $media->url }}')"></div>
    @endforeach
  @endforeach

  {{-- <div class="single-item" style="background-image: url('https://source.unsplash.com/random/1600x900/?property')"></div> --}}

  {{-- <div class="single-item" style="background-image: url('https://swiperjs.com/demos/images/nature-1.jpg')"></div> --}}
</div>
