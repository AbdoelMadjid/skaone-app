<footer class="custom-footer bg-dark py-5 position-relative">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mt-4">
                <div>
                    <div>
                        <img src="{{ URL::asset('images/sakola/logo-footer.png') }}" alt="logo light" height="55">
                    </div>
                    <div class="mt-4 fs-13">
                        <p>{{ $profileApp->app_deskripsi ?? '' }}</p>
                        <p class="ff-secondary">Pencetak lulusan yang kompeten dan berintegritas terbaik di Jawa Barat
                            pada tahun
                            2029</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 ms-lg-auto">
                <div class="row">
                    <div class="col-sm-4 mt-4">
                        <h5 class="text-white mb-0">Company</h5>
                        <div class="text-muted mt-3">
                            <ul class="list-unstyled ff-secondary footer-list">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#galery">Gallery</a></li>
                                <li><a href="#profil">Statistik</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-4">
                        <h5 class="text-white mb-0">Apps Pages</h5>
                        <div class="text-muted mt-3">
                            <ul class="list-unstyled ff-secondary footer-list">
                                <li><a href="#">Calendar</a></li>
                                <li><a href="#">Mailbox</a></li>
                                <li><a href="#">Chat</a></li>
                                <li><a href="#">Deals</a></li>
                                <li><a href="#">Kanban Board</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-4">
                        <h5 class="text-white mb-0">Support</h5>
                        <div class="text-muted mt-3">
                            <ul class="list-unstyled ff-secondary footer-list">
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row text-center text-sm-start align-items-center mt-5">
            <div class="col-sm-6">

                <div>
                    <p class="copy-rights mb-0">{{ $profileApp->app_tahun ?? '' }} -
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © {{ $profileApp->app_nama ?? '' }} -
                        {{ $profileApp->app_pengembang ?? '' }}
                    </p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end mt-3 mt-sm-0">
                    <ul class="list-inline mb-0 footer-social-link">
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="avatar-xs d-block">
                                <div class="avatar-title rounded-circle">
                                    <i class="ri-facebook-fill"></i>
                                </div>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="avatar-xs d-block">
                                <div class="avatar-title rounded-circle">
                                    <i class="ri-github-fill"></i>
                                </div>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="avatar-xs d-block">
                                <div class="avatar-title rounded-circle">
                                    <i class="ri-linkedin-fill"></i>
                                </div>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="avatar-xs d-block">
                                <div class="avatar-title rounded-circle">
                                    <i class="ri-google-fill"></i>
                                </div>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="avatar-xs d-block">
                                <div class="avatar-title rounded-circle">
                                    <i class="ri-dribbble-line"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
