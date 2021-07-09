<div>
	<div id="contact-page" class="contact-section-trans blue-bg section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 text-center wow fadeInRight">
                    <div class="contact-form-wrapper">
                        <div class="section-title">
                            <h2><b>課程瀏覽</b></h2>
                        </div>
                        @foreach ($categories as $category)
                            <a style="font-size: 28px;" href="/course/{{ $category->name }}">{{ $category->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
