@extends('layouts.master')
@section('title')
    @lang('translation.to-do')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/dragula/dragula.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
        <div class="file-manager-sidebar">
            <div class="p-4 d-flex flex-column h-100">
                <div class="mb-3">
                    <button class="btn btn-success w-100" data-bs-target="#createProjectModal" data-bs-toggle="modal"><i
                            class="ri-add-line align-bottom"></i> Add Project</button>
                </div>

                <div class="px-4 mx-n4" data-simplebar style="height: calc(100vh - 468px);">
                    <ul class="to-do-menu list-unstyled" id="projectlist-data">
                        <li>
                            <a data-bs-toggle="collapse" href="#velzonAdmin" class="nav-link fs-13 active">Velzon Admin &
                                Dashboard</a>
                            <div class="collapse show" id="velzonAdmin">
                                <ul class="mb-0 sub-menu list-unstyled ps-3 vstack gap-2 mb-2">
                                    <li>
                                        <a href="#!"><i class="ri-stop-mini-fill align-middle fs-15 text-danger"></i>
                                            v1.4.0</a>
                                    </li>
                                    <li>
                                        <a href="#!"><i
                                                class="ri-stop-mini-fill align-middle fs-15 text-secondary"></i> v1.5.0</a>
                                    </li>
                                    <li>
                                        <a href="#!"><i class="ri-stop-mini-fill align-middle fs-15 text-info"></i>
                                            v1.6.0</a>
                                    </li>
                                    <li>
                                        <a href="#!"><i class="ri-stop-mini-fill align-middle fs-15 text-primary"></i>
                                            v1.7.0</a>
                                    </li>
                                    <li>
                                        <a href="#!"><i class="ri-stop-mini-fill align-middle fs-15 text-warning"></i>
                                            v1.8.0</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a data-bs-toggle="collapse" href="#projectManagement" class="nav-link fs-13">Project
                                Management</a>
                            <div class="collapse" id="projectManagement">
                                <ul class="mb-0 sub-menu list-unstyled ps-3 vstack gap-2 mb-2">
                                    <li>
                                        <a href="#!"><i class="ri-stop-mini-fill align-middle fs-15 text-danger"></i>
                                            v2.1.0</a>
                                    </li>
                                    <li>
                                        <a href="#!"><i
                                                class="ri-stop-mini-fill align-middle fs-15 text-secondary"></i> v2.2.0</a>
                                    </li>
                                    <li>
                                        <a href="#!"><i class="ri-stop-mini-fill align-middle fs-15 text-info"></i>
                                            v2.3.0</a>
                                    </li>
                                    <li>
                                        <a href="#!"><i class="ri-stop-mini-fill align-middle fs-15 text-primary"></i>
                                            v2.4.0</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a data-bs-toggle="collapse" href="#skoteAdmin" class="nav-link fs-13">Skote Admin &
                                Dashboard</a>
                            <div class="collapse" id="skoteAdmin">
                                <ul class="mb-0 sub-menu list-unstyled ps-3 vstack gap-2 mb-2">
                                    <li>
                                        <a href="#!"><i class="ri-stop-mini-fill align-middle fs-15 text-danger"></i>
                                            v4.1.0</a>
                                    </li>
                                    <li>
                                        <a href="#!"><i
                                                class="ri-stop-mini-fill align-middle fs-15 text-secondary"></i> v4.2.0</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a data-bs-toggle="collapse" href="#ecommerceProject" class="nav-link fs-13">Doot - Chat App
                                Template</a>
                            <div class="collapse" id="ecommerceProject">
                                <ul class="mb-0 sub-menu list-unstyled ps-3 vstack gap-2 mb-2">
                                    <li>
                                        <a href="#!"><i class="ri-stop-mini-fill align-middle fs-15 text-danger"></i>
                                            v1.0.0</a>
                                    </li>
                                    <li>
                                        <a href="#!"><i
                                                class="ri-stop-mini-fill align-middle fs-15 text-secondary"></i> v1.1.0</a>
                                    </li>
                                    <li>
                                        <a href="#!"><i class="ri-stop-mini-fill align-middle fs-15 text-info"></i>
                                            v1.2.0</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>


                <div class="mt-auto text-center">
                    <img src="{{ URL::asset('build/images/task.png') }}" alt="Task" class="img-fluid" />
                </div>
            </div>
        </div>
        <!--end side content-->
        <div class="file-manager-content w-100 p-4 pb-0">
            <div class="row mb-4">
                <div class="col-auto order-1 d-block d-lg-none">
                    <button type="button" class="btn btn-soft-success btn-icon btn-sm fs-16 file-menu-btn">
                        <i class="ri-menu-2-fill align-bottom"></i>
                    </button>
                </div>
                <div class="col-sm order-3 order-sm-2 mt-3 mt-sm-0">
                    <h5 class="fw-semibold mb-0">Arsip Dokumen Guru </h5>
                </div>

                <div class="col-auto order-2 order-sm-3 ms-auto">
                    <div class="hstack gap-2">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button class="btn btn-icon fw-semibold btn-soft-danger"><i
                                    class="ri-arrow-go-back-line"></i></button>
                            <button class="btn btn-icon fw-semibold btn-soft-success"><i
                                    class="ri-arrow-go-forward-line"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-3 bg-light rounded mb-4">
                <div class="row g-2">
                    <div class="col-lg">
                        {{-- <div class="search-box">
                            <input type="text" id="searchTaskList" class="form-control search"
                                placeholder="Search task name">
                            <i class="ri-search-line search-icon"></i>
                        </div> --}}
                    </div>
                    <div class="col-lg-auto">
                        <select class="form-control" data-plugin="choices" data-choices data-choices-search-false
                            name="choices-select-tahunajaran" id="idThnAjaran">
                            <option value="" selected>Pilih Tahun Ajaran</option>
                            @foreach ($tahunAjaranOptions as $thnajar)
                                <option value="{{ $thnajar }}">{{ $thnajar }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-auto">
                        <select class="form-control" data-plugin="choices" data-choices data-choices-search-false
                            name="choices-select-semester" id="idSemester">
                            <option value="" selected>Pilih Semester</option>
                            <option value="Ganjil">Ganjil</option>
                            <option value="Genap">Genap</option>
                        </select>
                    </div>
                    <div class="col-lg-auto">
                        <select class="form-control" data-plugin="choices" data-choices data-choices-search-false
                            name="choices-select-jenis-doc" id="idJenisDoc">
                            <option value="" selected>Pilih Jenis Dokumen</option>
                            <option value="GuruMapel">Guru Mata Pelajaran</option>
                            <option value="WaliKelas">Wali Kelas</option>
                        </select>
                    </div>
                    <div class="col-lg-auto">
                        <button class="btn btn-primary createTask" type="button" data-bs-toggle="modal"
                            data-bs-target="#createTask">
                            <i class="ri-add-fill align-bottom"></i> Add Tasks
                        </button>
                    </div>
                </div>
            </div>

            <div class="todo-content position-relative px-4 mx-n4" id="todo-content">
                <div id="elmLoader">
                    <div class="spinner-border text-primary avatar-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <div class="todo-task" id="todo-task">

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/dragula/dragula.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/dom-autoscroller/dom-autoscroller.min.js') }}"></script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
