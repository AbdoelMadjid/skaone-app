<section class="section bg-light py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="text-center mb-2">
                    <h1 class="mb-3 ff-secondary fw-semibold text-capitalize lh-base">Program <span
                            class="text-primary">Studi</span></h1>
                    <p class="text-muted">Beriktu Kompetensi Keahlian yang ada di SMKN 1 Kadipaten.</p>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
        <div class="row align-items-center mt-1 pt-lg-1 gy-4">
            <div class="col-lg-12">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-custom nav-success nav-justified mb-3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#akuntansi" role="tab">
                                    AK<br>
                                    Akuntansi<br><br>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#manajemenperkantoran" role="tab">
                                    MP<br>
                                    Manajemen Perkantoran
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#bisnisdigital" role="tab">
                                    BD <br>
                                    Bisnis Digital<br><br>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#rpl" role="tab">
                                    RPL<br>
                                    Rekayasa Perangkat Lunak
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tkj" role="tab">
                                    TKJ<br>
                                    Teknik Komputer dan Jaringan
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content text-muted">
                            <div class="tab-pane active" id="akuntansi" role="tabpanel">
                                @include('welcome.jurusan.ak')
                            </div>
                            <div class="tab-pane" id="manajemenperkantoran" role="tabpanel">
                                @include('welcome.jurusan.mp')
                            </div>
                            <div class="tab-pane" id="bisnisdigital" role="tabpanel">
                                @include('welcome.jurusan.bd')
                            </div>
                            <div class="tab-pane" id="rpl" role="tabpanel">
                                @include('welcome.jurusan.rpl')
                            </div>
                            <div class="tab-pane" id="tkj" role="tabpanel">
                                @include('welcome.jurusan.tkj')
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- MANAJEMEN PERKANTORAN -->
        </div>
    </div>
</section>
