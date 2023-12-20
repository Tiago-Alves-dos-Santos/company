@if ($tags_value['TAG_FAQ']->visible  ?? false)
    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h2>{{ $tags_value['TAG_FAQ']->title }}</h2>
            <p>{{ $tags_value['TAG_FAQ']->sub_title }}</p>
        </header>

        <div class="row">
            <div class="col-lg-6">
                <!-- F.A.Q List 1-->
                <div class="accordion accordion-flush" id="faqlist1">
                    @foreach ($tags_value['TAG_FAQ'] as $value)
                        @if (is_object($value) && $loop->index <= 2)
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-content-{{ $loop->index }}">
                                        {{ $value->question }}
                                    </button>
                                </h2>
                                <div id="faq-content-{{ $loop->index }}" class="accordion-collapse collapse"
                                    data-bs-parent="#faqlist1">
                                    <div class="accordion-body">
                                        {{ $value->answer }}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>

            <div class="col-lg-6">

                <!-- F.A.Q List 2-->
                <div class="accordion accordion-flush" id="faqlist2">
                    @foreach ($tags_value['TAG_FAQ'] as $value)
                        @if (is_object($value) && $loop->index > 2)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq2-content-{{ $loop->index }}">
                                    {{ $value->question }}
                                </button>
                            </h2>
                            <div id="faq2-content-{{ $loop->index }}" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                                <div class="accordion-body">
                                    {{ $value->answer }}
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach


                </div>
            </div>

        </div>

    </div>
@endif
