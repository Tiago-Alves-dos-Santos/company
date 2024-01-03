@if ($tags_value['TAG_VALUES']->visible  ?? false)
    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h2>{{ $tags_value['TAG_VALUES']->title }}</h2>
            <p>{{ $tags_value['TAG_VALUES']->sub_title }}</p>
        </header>

        <div class="row">
            @foreach ($tags_value['TAG_VALUES'] as $value)
                @if (is_object($value))
                    @if ($loop->first)
                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="box">
                                <img src="/img/values-{{ $loop->index + 1 }}.png" class="img-fluid" alt="">
                                <h3>{{ $value->title }}</h3>
                                <p>{{ $value->text }}</p>
                            </div>
                        </div>
                    @else
                        <div class="mt-4 col-lg-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
                            <div class="box">
                                <img src="/img/values-{{ $loop->index + 1 }}.png" class="img-fluid" alt="">
                                <h3>{{ $value->title }}</h3>
                                <p>{{ $value->text }}</p>
                            </div>
                        </div>
                    @endif
                @endif
            @endforeach


        </div>

    </div>
@endif
