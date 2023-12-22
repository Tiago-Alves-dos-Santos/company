@if ($tags_value['TAG_COUNTS']->visible  ?? false)
    <div class="container" data-aos="fade-up">

        <div class="row gy-4">

            @php
                $icons = ['bi bi-emoji-smile', 'bi bi-journal-richtext', 'bi bi-headset', 'bi bi-people',''];
            @endphp
            @foreach ($tags_value['TAG_COUNTS'] as $value)
                @if (is_object($value))
                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                        <i class="{{ $icons[$loop->index] }}" @if ($loop->index == 1)
                            style="color: #ee6c20;"
                        @elseif ($loop->index == 2)
                        style="color: #15be56;"
                        @elseif ($loop->index == 3)
                        style="color: #bb0852;"

                        @endif></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="{{ $value->title }}" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>{{ $value->text }}</p>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach

        </div>

    </div>
@endif
