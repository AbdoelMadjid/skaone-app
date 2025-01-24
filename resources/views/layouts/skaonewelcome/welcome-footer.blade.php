<footer class="g-bg-secondary g-pt-100 g-pb-50">
    <div class="container">
        {{-- <div class="row g-mb-40">
            <div class="col-6 col-md-3 g-mb-20">
                <!-- Footer Links -->
                <ul class="list-unstyled">
                    <li class="g-py-5"><a class="u-link-v5 g-color-footer-links g-color-primary--hover g-font-size-16"
                            href="#">Future Students</a></li>
                    <li class="g-py-5"><a class="u-link-v5 g-color-footer-links g-color-primary--hover g-font-size-16"
                            href="#">Current Students</a></li>
                    <li class="g-py-5"><a class="u-link-v5 g-color-footer-links g-color-primary--hover g-font-size-16"
                            href="#">Alumni</a></li>
                    <li class="g-py-5"><a class="u-link-v5 g-color-footer-links g-color-primary--hover g-font-size-16"
                            href="#">Faculty &amp; Staff</a></li>
                    <li class="g-py-5"><a class="u-link-v5 g-color-footer-links g-color-primary--hover g-font-size-16"
                            href="#">Donors</a></li>
                </ul>
                <!-- End Footer Links -->
            </div>

            <div class="col-6 col-md-3 g-mb-20">
                <!-- Footer Links -->
                <ul class="list-unstyled">
                    <li class="g-py-5"><a class="u-link-v5 g-color-footer-links g-color-primary--hover g-font-size-16"
                            href="#">News &amp; Media</a></li>
                    <li class="g-py-5"><a class="u-link-v5 g-color-footer-links g-color-primary--hover g-font-size-16"
                            href="#">Research &amp; Innovation</a></li>
                    <li class="g-py-5"><a class="u-link-v5 g-color-footer-links g-color-primary--hover g-font-size-16"
                            href="#">Academics</a></li>
                    <li class="g-py-5"><a class="u-link-v5 g-color-footer-links g-color-primary--hover g-font-size-16"
                            href="#">Programs of Study</a></li>
                    <li class="g-py-5"><a class="u-link-v5 g-color-footer-links g-color-primary--hover g-font-size-16"
                            href="#">University Life</a></li>
                </ul>
                <!-- End Footer Links -->
            </div>

            <div class="col-6 col-md-3 g-mb-20">
                <!-- Footer Links -->
                <ul class="list-unstyled">
                    <li class="g-py-5"><a class="u-link-v5 g-color-footer-links g-color-primary--hover g-font-size-16"
                            href="#">Contacts</a></li>
                    <li class="g-py-5"><a class="u-link-v5 g-color-footer-links g-color-primary--hover g-font-size-16"
                            href="#">Careers</a></li>
                    <li class="g-py-5"><a class="u-link-v5 g-color-footer-links g-color-primary--hover g-font-size-16"
                            href="#">Accessibility</a></li>
                    <li class="g-py-5"><a class="u-link-v5 g-color-footer-links g-color-primary--hover g-font-size-16"
                            href="#">Privacy</a></li>
                    <li class="g-py-5"><a class="u-link-v5 g-color-footer-links g-color-primary--hover g-font-size-16"
                            href="#">Site Feedback</a></li>
                </ul>
                <!-- End Footer Links -->
            </div>

            <div class="col-6 col-md-3 g-mb-20">
                <!-- Footer Links -->
                <ul class="list-unstyled">
                    <li class="g-py-5"><a class="u-link-v5 g-color-footer-links g-color-primary--hover g-font-size-16"
                            href="#">Downtown Ontario Campus</a></li>
                    <li class="g-py-5"><a class="u-link-v5 g-color-footer-links g-color-primary--hover g-font-size-16"
                            href="#">Mississauga Campus</a></li>
                    <li class="g-py-5"><a class="u-link-v5 g-color-footer-links g-color-primary--hover g-font-size-16"
                            href="#">Scarborough Campus</a></li>
                    <li class="g-py-5"><a class="u-link-v5 g-color-footer-links g-color-primary--hover g-font-size-16"
                            href="#">Campus Maps</a></li>
                    <li class="g-py-5"><a class="u-link-v5 g-color-footer-links g-color-primary--hover g-font-size-16"
                            href="#">Campus Safety</a></li>
                </ul>
                <!-- End Footer Links -->
            </div>
        </div> --}}

        <div class="row align-items-center">
            <div class="col-md-4 text-center text-md-left g-mb-30">
                <!-- Logo -->
                <a class="g-text-underline--none--hover mr-4" href="index.html">
                    <img class="g-width-95" src="{{ URL::asset('build/assets/img/logo/logo-mini.png') }}" alt="Logo">
                </a>
                <!-- End Logo -->
                <p class="d-inline-block align-middle g-color-gray-dark-v5 g-font-size-13 mb-0">&copy;
                    {{ $profileApp->app_tahun ?? '' }}
                    <script>
                        document.write(new Date().getFullYear())
                    </script> {{ $profileApp->app_nama ?? '' }}.
                    <br>All Rights Reserved. {{ $profileApp->app_pengembang ?? '' }}
                </p>
            </div>

            <div class="col-md-4 g-mb-30">
                <!-- Social Icons -->
                <ul class="list-inline text-center mb-0">
                    <li class="list-inline-item">
                        <a class="u-icon-v3 u-icon-size--sm g-color-gray-light-v1 g-color-white--hover g-bg-transparent g-bg-primary--hover rounded"
                            href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="u-icon-v3 u-icon-size--sm g-color-gray-light-v1 g-color-white--hover g-bg-transparent g-bg-primary--hover rounded"
                            href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="u-icon-v3 u-icon-size--sm g-color-gray-light-v1 g-color-white--hover g-bg-transparent g-bg-primary--hover rounded"
                            href="#"><i class="fa fa-pinterest"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="u-icon-v3 u-icon-size--sm g-color-gray-light-v1 g-color-white--hover g-bg-transparent g-bg-primary--hover rounded"
                            href="#"><i class="fa fa-instagram"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="u-icon-v3 u-icon-size--sm g-color-gray-light-v1 g-color-white--hover g-bg-transparent g-bg-primary--hover rounded"
                            href="#"><i class="fa fa-youtube"></i></a>
                    </li>
                </ul>
                <!-- End Social Icons -->
            </div>

            <div class="col-md-4 g-mb-30 text-right">
                <div class="d-inline-block g-mx-15">
                    <h4 class="g-color-gray-dark-v5 g-font-size-11 text-left text-uppercase">Email</h4>
                    <a href="#">info@smkn1kadipaten.sch.id</a>
                </div>
                <div class="d-inline-block g-mx-10">
                    <h4 class="g-color-gray-dark-v5 g-font-size-11 text-left text-uppercase">Phone</h4>
                    <a href="#">(0233) 661434</a>
                </div>
            </div>
        </div>
        <!-- Footer Copyright -->

        <!-- End Footer Copyright -->
    </div>
</footer>
