@extends('layouts.master')
@section('title')
    @lang('translation.chat')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/libs/glightbox/css/glightbox.min.css') }}">
    <style>

    </style>
@endsection
@section('content')
    <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
        <div class="chat-leftsidebar">
            <div class="px-4 pt-4 mb-3">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h5 class="mb-4">Chats</h5>
                    </div>
                    <div class="flex-shrink-0">
                        <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="bottom" title="Add Contact">
                            @if (auth()->check() &&
                                    auth()->user()->hasAnyRole(['master']))
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-soft-success btn-sm">
                                    <i class="ri-add-line align-bottom"></i>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="search-box">
                    <input type="text" class="form-control bg-light border-light" placeholder="Search here...">
                    <i class="ri-search-2-line search-icon"></i>
                </div>

            </div> <!-- .p-4 -->

            <ul class="nav nav-tabs nav-tabs-custom nav-success nav-justified" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#chats" role="tab">
                        Chats
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#contacts" role="tab">
                        Contacts
                    </a>
                </li>
            </ul>

            <div class="tab-content text-muted">
                <div class="tab-pane active" id="chats" role="tabpanel">
                    <div class="chat-room-list pt-3" data-simplebar>

                        @include('pages.pengguna.pesan-pengguna-chat-message')

                        @include('pages.pengguna.pesan-pengguna-channel')
                        <!-- End chat-message-list -->
                    </div>
                </div>
                <div class="tab-pane" id="contacts" role="tabpanel">

                    @include('pages.pengguna.pesan-pengguna-contact')

                </div>
            </div>
            <!-- end tab contact -->
        </div>
        <!-- end chat leftsidebar -->
        <!-- Start User chat -->
        <div class="user-chat w-100 overflow-hidden">

            <div class="chat-content d-lg-flex">
                <!-- start chat conversation section -->
                <div class="w-100 overflow-hidden position-relative">
                    <!-- conversation user -->
                    <div class="position-relative">
                        <div class="position-relative" id="users-chat">
                            <div class="p-3 user-chat-topbar">
                                <div class="row align-items-center">
                                    <div class="col-sm-4 col-8">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 d-block d-lg-none me-3">
                                                <a href="javascript: void(0);" class="user-chat-remove fs-18 p-1"><i
                                                        class="ri-arrow-left-s-line align-bottom"></i></a>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="flex-shrink-0 chat-user-img online user-own-img align-self-center me-3 ms-0">
                                                        <img src="{{ URL::asset('build/images/users/user-dummy-img.jpg') }}"
                                                            class="rounded-circle avatar-xs" alt="">
                                                        <span class="user-status"></span>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="text-truncate mb-0 fs-16"><a class="text-reset username"
                                                                data-bs-toggle="offcanvas" href="#userProfileCanvasExample"
                                                                aria-controls="userProfileCanvasExample"></a>
                                                        </h5>
                                                        <p class="text-truncate text-muted fs-14 mb-0 userStatus">
                                                            <small></small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8 col-4">
                                        <ul class="list-inline user-chat-nav text-end mb-0">
                                            <li class="list-inline-item m-0">
                                                <div class="dropdown">
                                                    <button class="btn btn-ghost-secondary btn-icon" type="button"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i data-feather="search" class="icon-sm"></i>
                                                    </button>
                                                    <div class="dropdown-menu p-0 dropdown-menu-end dropdown-menu-lg">
                                                        <div class="p-2">
                                                            <div class="search-box">
                                                                <input type="text"
                                                                    class="form-control bg-light border-light"
                                                                    placeholder="Search here..." onkeyup="searchMessages()"
                                                                    id="searchMessage">
                                                                <i class="ri-search-2-line search-icon"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="list-inline-item d-none d-lg-inline-block m-0">
                                                <button type="button" class="btn btn-ghost-secondary btn-icon"
                                                    data-bs-toggle="offcanvas" data-bs-target="#userProfileCanvasExample"
                                                    aria-controls="userProfileCanvasExample">
                                                    <i data-feather="info" class="icon-sm"></i>
                                                </button>
                                            </li>

                                            <li class="list-inline-item m-0">
                                                <div class="dropdown">
                                                    <button class="btn btn-ghost-secondary btn-icon" type="button"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i data-feather="more-vertical" class="icon-sm"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item d-block d-lg-none user-profile-show"
                                                            href="#"><i
                                                                class="ri-user-2-fill align-bottom text-muted me-2"></i>
                                                            View Profile</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="ri-inbox-archive-line align-bottom text-muted me-2"></i>
                                                            Archive</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="ri-mic-off-line align-bottom text-muted me-2"></i>
                                                            Muted</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="ri-delete-bin-5-line align-bottom text-muted me-2"></i>
                                                            Delete</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                            <!-- end chat user head -->
                            <div class="chat-conversation p-3 p-lg-4 " id="chat-conversation" data-simplebar>
                                {{-- <div id="elmLoader">
                                    <div class="spinner-border text-primary avatar-sm" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div> --}}
                                <ul class="chat-conversation-list">
                                    {{-- @include('pages.pengguna.pesan-pengguna-isi-chat') --}}
                                </ul>
                                <!-- end chat-conversation-list -->
                            </div>
                            <div class="alert alert-warning alert-dismissible copyclipboard-alert px-4 fade show "
                                id="copyClipBoard" role="alert">
                                Message copied
                            </div>
                        </div>

                        <div class="position-relative" id="channel-chat">
                            <div class="p-3 user-chat-topbar">
                                <div class="row align-items-center">
                                    <div class="col-sm-4 col-8">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 d-block d-lg-none me-3">
                                                <a href="javascript: void(0);" class="user-chat-remove fs-18 p-1"><i
                                                        class="ri-arrow-left-s-line align-bottom"></i></a>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="flex-shrink-0 chat-user-img online user-own-img align-self-center me-3 ms-0">
                                                        <img src="{{ URL::asset('build/images/users/avatar-2.jpg') }}"
                                                            class="rounded-circle avatar-xs" alt="">
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="text-truncate mb-0 fs-16"><a
                                                                class="text-reset username" data-bs-toggle="offcanvas"
                                                                href="#userProfileCanvasExample"
                                                                aria-controls="userProfileCanvasExample">Lisa Parker</a>
                                                        </h5>
                                                        <p class="text-truncate text-muted fs-14 mb-0 userStatus"><small>24
                                                                Members</small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8 col-4">
                                        <ul class="list-inline user-chat-nav text-end mb-0">
                                            <li class="list-inline-item m-0">
                                                <div class="dropdown">
                                                    <button class="btn btn-ghost-secondary btn-icon" type="button"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i data-feather="search" class="icon-sm"></i>
                                                    </button>
                                                    <div class="dropdown-menu p-0 dropdown-menu-end dropdown-menu-lg">
                                                        <div class="p-2">
                                                            <div class="search-box">
                                                                <input type="text"
                                                                    class="form-control bg-light border-light"
                                                                    placeholder="Search here..."
                                                                    onkeyup="searchMessages()" id="searchMessage">
                                                                <i class="ri-search-2-line search-icon"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="list-inline-item d-none d-lg-inline-block m-0">
                                                <button type="button" class="btn btn-ghost-secondary btn-icon"
                                                    data-bs-toggle="offcanvas" data-bs-target="#userProfileCanvasExample"
                                                    aria-controls="userProfileCanvasExample">
                                                    <i data-feather="info" class="icon-sm"></i>
                                                </button>
                                            </li>

                                            <li class="list-inline-item m-0">
                                                <div class="dropdown">
                                                    <button class="btn btn-ghost-secondary btn-icon" type="button"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i data-feather="more-vertical" class="icon-sm"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item d-block d-lg-none user-profile-show"
                                                            href="#"><i
                                                                class="ri-user-2-fill align-bottom text-muted me-2"></i>
                                                            View Profile</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="ri-inbox-archive-line align-bottom text-muted me-2"></i>
                                                            Archive</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="ri-mic-off-line align-bottom text-muted me-2"></i>
                                                            Muted</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="ri-delete-bin-5-line align-bottom text-muted me-2"></i>
                                                            Delete</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                            <!-- end chat user head -->

                            <div class="chat-conversation p-3 p-lg-4 " id="chat-conversation" data-simplebar>
                                <ul class="list-unstyled chat-conversation-list" id="channel-conversation">
                                </ul>
                                <!-- end chat-conversation-list -->

                            </div>
                            <div class="alert alert-warning alert-dismissible copyclipboard-alert px-4 fade show "
                                id="copyClipBoardChannel" role="alert">
                                Message copied
                            </div>
                        </div>

                        <!-- end chat-conversation -->

                        <div class="chat-input-section p-3 p-lg-4">

                            <form id="chatinput-form" enctype="multipart/form-data">
                                <div class="row g-0 align-items-center">
                                    <div class="col-auto">
                                        <div class="chat-input-links me-2">
                                            <div class="links-list-item">
                                                <button type="button" class="btn btn-link text-decoration-none emoji-btn"
                                                    id="emoji-btn">
                                                    <i class="bx bx-smile align-middle"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="chat-input-feedback">
                                            Please Enter a Message
                                        </div>
                                        <input type="text" class="form-control chat-input bg-light border-light"
                                            id="chat-input" placeholder="Type your message..." autocomplete="off">
                                    </div>
                                    <div class="col-auto">
                                        <div class="chat-input-links ms-2">
                                            <div class="links-list-item">
                                                <button type="submit"
                                                    class="btn btn-success chat-send waves-effect waves-light">
                                                    <i class="ri-send-plane-2-fill align-bottom"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>

                        <div class="replyCard">
                            <div class="card mb-0">
                                <div class="card-body py-3">
                                    <div class="replymessage-block mb-0 d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <h5 class="conversation-name"></h5>
                                            <p class="mb-0"></p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <button type="button" id="close_toggle"
                                                class="btn btn-sm btn-link mt-n2 me-n3 fs-18">
                                                <i class="bx bx-x align-middle"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end chat-wrapper -->
    @include('pages.pengguna.offcanvas-chat-profil')
@endsection
@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const userList = document.querySelectorAll('.unread-msg-user');
            const loggedInUserId = {{ auth()->id() }}; // ID pengguna yang sedang login

            userList.forEach(user => {
                user.addEventListener('click', function() {
                    const contactId = this.closest('li').id.replace('contact-id-', '');
                    fetchChatMessages(contactId);
                });
            });

            function fetchChatMessages(contactId) {
                fetch(`/profilpengguna/chats/${contactId}`)
                    .then(response => response.json())
                    .then(data => {
                        const chatList = document.querySelector('.chat-conversation-list');
                        chatList.innerHTML = ''; // Bersihkan chat sebelumnya

                        // Balikkan urutan pesan jika Anda ingin yang terbaru di bawah
                        const messages = data.messages.reverse();

                        messages.forEach(message => {
                            const isSentByUser = message.sender_id === loggedInUserId;
                            const messageClass = isSentByUser ? 'right' : 'left';
                            const senderName = message.sender_name || 'Unknown';

                            // Mengambil URL avatar pengirim
                            const senderAvatar = message.sender_avatar ||
                                'default-avatar.png'; // Gambar default jika tidak ada avatar

                            // Memeriksa apakah pesan ini adalah pesan yang diteruskan
                            const isRedirected = message.is_redirected ||
                                false; // Cek apakah pesan diteruskan
                            const redirectedMessage = isRedirected ? `
                        <div class="redirected-message">
                            <p class="text-muted">This message has been forwarded.</p>
                        </div>
                    ` : '';

                            // Fungsi untuk membangun pesan
                            const messageHtml = `
                    <li class="chat-list ${messageClass}" id="chat-list-${message.id}">
                        <div class="conversation-list">
                            <div class="user-chat-content">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-2">
                                        <img src="${senderAvatar}" alt="User Avatar" class="rounded-circle avatar-sm">
                                    </div>
                                    <div class="ctext-wrap">
                                        ${message.last_message ? `<div class="ctext-wrap-content"><p class="mb-0 ctext-content">${message.last_message}</p></div>` : ''
                                        }

                                        ${message.has_images && message.has_images.length > 0 ? `<div class="message-img mb-0">${message.has_images.map(img => `
                                                    <div class="message-img-list">
                                                        <div>
                                                            <a class="popup-img d-inline-block" href="${img}">
                                                                <img src="${img}" alt="" class="rounded border">
                                                            </a>
                                                        </div>
                                                    </div>
                                                `).join('')} </div>` : ''}

                                        <!-- Menampilkan file jika ada -->
                                        ${message.has_files && message.has_files.length > 0 ? `
                                        <div class="ctext-wrap-content">
                                            <div class="p-3 border-primary border rounded-3">
                                                <div class="d-flex align-items-center attached-file">
                                                    <div class="flex-shrink-0 avatar-sm me-3 ms-0 attached-file-avatar">
                                                        <div class="avatar-title bg-primary-subtle text-primary rounded-circle font-size-20">
                                                            <i class="ri-attachment-2"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <div class="text-start">
                                                            <h5 class="font-size-14 mb-1">design-phase-1-approved.pdf</h5>
                                                            <p class="text-muted text-truncate font-size-13 mb-0">12.5 MB</p>
                                                        </div>
                                                    </div>
                                                    <div class="flex-shrink-0 ms-4">
                                                        <div class="d-flex gap-2 font-size-20 d-flex align-items-start">
                                                            <div>
                                                                <a href="#" class="text-muted">
                                                                    <i class="bx bxs-download"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    ` : ''}

                                        <!-- Dropdown untuk opsi pesan -->
                                        ${message.has_dropDown ? `
                                            <div class="dropdown align-self-start message-box-drop">
                                                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="ri-more-2-fill"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item reply-message" href="#"><i
                                                            class="ri-reply-line me-2 text-muted align-bottom"></i>Reply</a>
                                                    <a class="dropdown-item" href="#"><i
                                                            class="ri-share-line me-2 text-muted align-bottom"></i>Forward</a>
                                                    <a class="dropdown-item copy-message" href="#"><i
                                                            class="ri-file-copy-line me-2 text-muted align-bottom"></i>Copy</a>
                                                    <a class="dropdown-item" href="#"><i
                                                            class="ri-bookmark-line me-2 text-muted align-bottom"></i>Bookmark</a>
                                                    <a class="dropdown-item delete-item" href="#"><i
                                                            class="ri-delete-bin-5-line me-2 text-muted align-bottom"></i>Delete</a>
                                                </div>
                                            </div>
                                        ` : ''}
                                    </div>
                                </div>
                                <div class="conversation-name">
                                    <small class="text-muted time">
                                        ${new Date(message.last_message_at).toLocaleTimeString('en-US', {
                                            hour: '2-digit',
                                            minute: '2-digit',
                                        })}
                                    </small>
                                    ${isSentByUser
                                        ? '<span class="text-success check-message-icon"><i class="bx bx-check"></i></span>'
                                        : `<span class="sender-name">${senderName}</span>`}
                                </div>
                                ${redirectedMessage} <!-- Menampilkan pesan yang diteruskan -->
                            </div>
                        </div>
                    </li>
                `;

                            chatList.insertAdjacentHTML('beforeend', messageHtml);
                        });
                    })
                    .catch(error => console.error('Error fetching chat messages:', error));
            }
        });
    </script>

    <!-- chat app js -->
    <script src="{{ URL::asset('build/libs/glightbox/js/glightbox.min.js') }}"></script>

    <!-- fgEmojiPicker js -->
    <script src="{{ URL::asset('build/libs/fg-emoji-picker/fgEmojiPicker.js') }}"></script>

    <!-- chat init js -->
    <script src="{{ URL::asset('build/js/ngobrol.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
