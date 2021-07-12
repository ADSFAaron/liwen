<div>
	<div id="contact-page" class="contact-section-trans blue-bg section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 text-center wow fadeInRight">
                    <div class="contact-form-wrapper">
                        <div class="section-title">
                            <h2><b>{{ $category }}</b></h2>
                        </div>
                        <div>
                            @foreach ($courses as $course)
                                <div class="mt-3">
                                    <li>
                                        <a href="/course/{{ $category }}/{{ $course->name }}">{{ $course->name }}</a>
                                    </li>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
