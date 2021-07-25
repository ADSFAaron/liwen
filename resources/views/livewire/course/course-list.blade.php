<div>
    <div id="contact-page" class="contact-section-trans blue-bg section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 text-center wow fadeInRight">
                    <div class="contact-form-wrapper">
                        <div class="section-title">
                            <h2><b>課程瀏覽</b></h2>
                        </div>
                        <div>
                            @foreach ($categories as $category)
                                <div class="mt-3">
                                    <ul>
                                        <li>
                                            <a style="font-size: 28px;"
                                               href="/course/{{ $category->name }}">{{ $category->name }}</a>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
