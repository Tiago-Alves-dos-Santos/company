<div class="container" data-aos="fade-up">

    @if ($tags_value['TAG_FEATURES']->visible)
        <header class="section-header">
            <h2>{{ $tags_value['TAG_FEATURES']->title }}</h2>
            <p>{{ $tags_value['TAG_FEATURES']->sub_title }}</p>
        </header>

        <div class="row">

            <div class="col-lg-6">
                <img src="/img/features.png" class="img-fluid" alt="">
            </div>

            <div class="mt-5 col-lg-6 mt-lg-0 d-flex">
                <div class="row align-self-center gy-4">
                    @foreach ($tags_value['TAG_FEATURES'] as $value)
                        @if (is_object($value))
                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="200">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>{{ $value->text }}</h3>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>

        </div>
    @endif
    <!-- / row -->

    <!-- Feature Tabs -->
    @if ($tags_value['TAG_FEATURES_TAB']->visible)
        <div class="row feture-tabs" data-aos="fade-up">
            <div class="col-lg-6">
                <h3>{{ $tags_value['TAG_FEATURES_TAB']->title }}</h3>

                <!-- Tabs -->
                <ul class="mb-3 nav nav-pills">
                    @foreach ($tags_value['TAG_FEATURES_TAB'] as $value)
                        @if (is_object($value))
                            <li>
                                <a class="nav-link @if ($loop->first) active @endif"
                                    data-bs-toggle="pill" href="#tab-{{ $loop->index + 1 }}">{{ $value->title }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul><!-- End Tabs -->

                <!-- Tab Content -->
                <div class="tab-content">
                    @foreach ($tags_value['TAG_FEATURES_TAB'] as $value)
                        @if (is_object($value))
                            <div class="tab-pane fade show @if ($loop->first) active @endif"
                                id="tab-{{ $loop->index + 1 }}">
                                <p>
                                    {{ $value->text }}
                                </p>
                            </div>
                        @endif
                    @endforeach
                    {{-- <div class="tab-pane fade show active" id="tab1">
                        <p>Consequuntur inventore voluptates consequatur aut vel et. Eos doloribus expedita.
                            Sapiente atque consequatur minima nihil quae aspernatur quo suscipit voluptatem.</p>
                        <div class="mb-2 d-flex align-items-center">
                            <i class="bi bi-check2"></i>
                            <h4>Repudiandae rerum velit modi et officia quasi facilis</h4>
                        </div>
                        <p>Laborum omnis voluptates voluptas qui sit aliquam blanditiis. Sapiente minima commodi
                            dolorum non eveniet magni quaerat nemo et.</p>
                        <div class="mb-2 d-flex align-items-center">
                            <i class="bi bi-check2"></i>
                            <h4>Incidunt non veritatis illum ea ut nisi</h4>
                        </div>
                        <p>Non quod totam minus repellendus autem sint velit. Rerum debitis facere soluta
                            tenetur. Iure molestiae assumenda sunt qui inventore eligendi voluptates nisi at.
                            Dolorem quo tempora. Quia et perferendis.</p>
                    </div><!-- End Tab 1 Content --> --}}

                </div>

            </div>

            <div class="col-lg-6">
                <img src="/img/features-2.png" class="img-fluid" alt="">
            </div>

        </div>
    @endif
    <!-- End Feature Tabs -->

    <!-- Feature Icons -->
    @if ($tags_value['TAG_FEATURES_MOBILE']->visible)
        <div class="row feature-icons" data-aos="fade-up">
            <h3>{{ $tags_value['TAG_FEATURES_MOBILE']->title }}</h3>

            <div class="row">

                <div class="text-center col-xl-4" data-aos="fade-right" data-aos-delay="100">
                    <img src="/img/features-3.png" class="p-4 img-fluid" alt="">
                </div>

                <div class="col-xl-8 d-flex content">
                    <div class="row align-self-center gy-4">
                        @php
                            $feature_icons = ['ri-line-chart-line', 'ri-stack-line','ri-brush-4-line','ri-magic-line','ri-command-line','ri-radar-line'];
                        @endphp
                        @foreach ($tags_value['TAG_FEATURES_MOBILE'] as $value)
                            @if (is_object($value))
                                @if ($loop->first)
                                    <div class="col-md-6 icon-box" data-aos="fade-up">
                                        <i class="{{ $feature_icons[$loop->index] }}"></i>
                                        <div>
                                            <h4>{{ $value->title }}</h4>
                                            <p>{{ $value->text }}</p>
                                        </div>
                                    </div>
                                @else
                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                                    <i class="{{ $feature_icons[$loop->index] }}"></i>
                                    <div>
                                        <h4>{{ $value->title }}</h4>
                                            <p>{{ $value->text }}</p>
                                    </div>
                                </div>
                                @endif
                            @endif
                        @endforeach


                    </div>
                </div>

            </div>

        </div>
    @endif
    <!-- End Feature Icons -->

</div>
