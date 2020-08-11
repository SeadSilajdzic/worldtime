<footer>
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <img src="{{ asset('assets/images/logo.svg') }}" class="footer-logo" alt="" />
                    <h5 class="font-weight-normal mt-4 mb-5 pr-5">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A consequatur dolorum error
                        ipsum itaque nobis nostrum qui sint. Ducimus eos facere fugit neque, praesentium vitae!
                    </h5>
                    <ul class="social-media mb-3">
                        <li>
                            <a href="#">
                                <i class="mdi mdi-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="mdi mdi-youtube"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="mdi mdi-twitter"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h3 class="font-weight-bold mb-3">CATEGORIES</h3>
                    @foreach($categories as $category)
                        <div class="footer-border-bottom pb-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0 font-weight-600"><a style="text-decoration: none; color: white;" href="{{ route('categories.single', $category->id) }}">{{ $category->name }}</a></h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</footer>
