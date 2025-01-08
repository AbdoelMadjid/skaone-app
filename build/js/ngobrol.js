/*
Template Name: Velzon - Admin & Dashboard Template
Author: Themesbrand
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: Chat init js
*/

(function () {
    var dummyUserImage = "build/images/users/user-dummy-img.jpg";
    var dummyMultiUserImage = "build/images/users/multi-user.jpg";
    var isreplyMessage = false;

    // favourite btn
    document.querySelectorAll(".favourite-btn").forEach(function (item) {
        item.addEventListener("click", function (event) {
            this.classList.toggle("active");
        });
    });

    // toggleSelected
    function toggleSelected() {
        var userChatElement = document.querySelectorAll(".user-chat");
        Array.from(document.querySelectorAll(".chat-user-list li a")).forEach(function (item) {
            item.addEventListener("click", function (event) {
                userChatElement.forEach(function (elm) {
                    elm.classList.add("user-chat-show");
                });

                // chat user list link active
                var chatUserList = document.querySelector(".chat-user-list li.active");
                if (chatUserList) chatUserList.classList.remove("active");
                this.parentNode.classList.add("active");
            });
        });

        // user-chat-remove
        document.querySelectorAll(".user-chat-remove").forEach(function (item) {
            item.addEventListener("click", function (event) {
                userChatElement.forEach(function (elm) {
                    elm.classList.remove("user-chat-show");
                });
            });
        });
    }


    //User current Id
    var currentChatId = "users-chat";
    var currentSelectedChat = "users";
    var url="build/json/";
    var usersList = "";
    var userChatId = 1;

    scrollToBottom(currentChatId);

    toggleSelected();
    chatSwap();

    contactList();
    toggleSelected();

    function contactList() {
        document.querySelectorAll(".sort-contact ul li").forEach(function (item) {
            item.addEventListener("click", function () {
                currentSelectedChat = "users";
                updateSelectedChat();

                // Ambil nama kontak
                var contactName = item.querySelector(".contactlist-name").textContent.trim();
                document.querySelector(".user-chat-topbar .text-truncate .username").textContent = contactName;
                document.querySelector(".profile-offcanvas .username").textContent = contactName;

                // Cek keberadaan avatar
                var avatarImg = item.querySelector(".avatar-xxs img");
                if (avatarImg && avatarImg.getAttribute("src")) {
                    // Jika avatar ada, gunakan gambar avatar
                    var contactImg = avatarImg.getAttribute("src");
                    document.querySelector(".user-own-img").innerHTML = `<img src="${contactImg}" class="rounded-circle avatar-xs" alt="">`;
                    document.querySelector(".profile-offcanvas .profile-img").innerHTML = `<img src="${contactImg}" class="rounded-circle avatar-xs" alt="">`;
                } else {
                    // Jika avatar tidak ada, gunakan inisial
                    var initialsElement = item.querySelector(".avatar-title");
                    if (initialsElement) {
                        var initials = initialsElement.textContent.trim();
                        document.querySelector(".user-own-img").innerHTML = `<span class="avatar-title rounded-circle bg-primary fs-10" style="width: 24px; height: 24px;">${initials}</span>`;
                        document.querySelector(".profile-offcanvas .profile-img").innerHTML = `<span class="avatar-title rounded-circle bg-primary fs-10" style="width: 24px; height: 24px;">${initials}</span>`;
                    } else {
                        // Jika tidak ada inisial atau avatar, fallback ke gambar dummy
                        document.querySelector(".user-own-img").innerHTML = `<img src="${dummyUserImage}" class="rounded-circle avatar-xs" alt="">`;
                        document.querySelector(".profile-offcanvas .profile-img").innerHTML = `<img src="${dummyUserImage}" class="rounded-circle avatar-xs" alt="">`;
                    }
                }

                // Ubah gambar di percakapan (jika ada)
                var conversationImg = document.getElementById("users-conversation");
                conversationImg.querySelectorAll(".left .chat-avatar img").forEach(function (chatAvatarImg) {
                    if (avatarImg && avatarImg.getAttribute("src")) {
                        chatAvatarImg.setAttribute("src", avatarImg.getAttribute("src"));
                    } else {
                        chatAvatarImg.setAttribute("src", dummyUserImage);
                    }
                });

                // Jika sedang membalas pesan, tutup replyCard
                if (isreplyMessage === true) {
                    isreplyMessage = false;
                    document.querySelector(".replyCard").classList.remove("show");
                }
            });
        });
    }



    function updateSelectedChat() {
        if (currentSelectedChat == "users") {
            document.getElementById("channel-chat").style.display = "none";
            document.getElementById("users-chat").style.display = "block";
            //getChatMessages(url + "chats.json");
        } else {
            document.getElementById("channel-chat").style.display = "block";
            document.getElementById("users-chat").style.display = "none";
            //getChatMessages(url + "chats.json");
        }
    }
    updateSelectedChat();

    // // Scroll to Bottom
    function scrollToBottom(id) {
        setTimeout(function () {
            var simpleBar = (document.getElementById(id).querySelector("#chat-conversation .simplebar-content-wrapper")) ?
                document.getElementById(id).querySelector("#chat-conversation .simplebar-content-wrapper") : ''

            var offsetHeight = document.getElementsByClassName("chat-conversation-list")[0] ?
                document.getElementById(id).getElementsByClassName("chat-conversation-list")[0].scrollHeight - window.innerHeight + 335 : 0;
            if (offsetHeight)
                simpleBar.scrollTo({
                    top: offsetHeight,
                    behavior: "smooth"
                });
        }, 100);
    }

    //chat form
    var chatForm = document.querySelector("#chatinput-form");
    var chatInput = document.querySelector("#chat-input");
    var chatInputfeedback = document.querySelector(".chat-input-feedback");

    function currentTime() {
        var ampm = new Date().getHours() >= 12 ? "pm" : "am";
        var hour =
            new Date().getHours() > 12 ?
                new Date().getHours() % 12 :
                new Date().getHours();
        var minute =
            new Date().getMinutes() < 10 ?
                "0" + new Date().getMinutes() :
                new Date().getMinutes();
        if (hour < 10) {
            return "0" + hour + ":" + minute + " " + ampm;
        } else {
            return hour + ":" + minute + " " + ampm;
        }
    }
    setInterval(currentTime, 1000);

    var messageIds = 0;

    if (chatForm) {
        //add an item to the List, including to local storage
        chatForm.addEventListener("submit", function (e) {
            e.preventDefault();

            var chatId = currentChatId;
            var chatReplyId = currentChatId;

            var chatInputValue = chatInput.value

            if (chatInputValue.length === 0) {
                chatInputfeedback.classList.add("show");
                setTimeout(function () {
                    chatInputfeedback.classList.remove("show");
                }, 2000);
            } else {
                if (isreplyMessage == true) {
                    getReplyChatList(chatReplyId, chatInputValue);
                    isreplyMessage = false;
                } else {
                    getChatList(chatId, chatInputValue);
                }
                scrollToBottom(chatId || chatReplyId);
            }
            chatInput.value = "";

            //reply msg remove textarea
            document.getElementById("close_toggle").click();
        })
    }

    //user Name and user Profile change on click
    function chatSwap() {
        // Event untuk daftar pengguna (direct messages)
        document.querySelectorAll("#userList li").forEach(function (item) {
            item.addEventListener("click", function () {
                // Update chat type
                currentSelectedChat = "users";
                updateSelectedChat();

                // Ambil informasi dari elemen
                var contactName = item.querySelector(".text-truncate.mb-0").textContent.trim();
                var avatarImg = item.querySelector(".avatar-xxs img");
                var initialsElement = item.querySelector(".avatar-title");

                // Update nama pengguna
                document.querySelector(".user-chat-topbar .username").textContent = contactName;
                document.querySelector(".profile-offcanvas .username").textContent = contactName;

                // Perbarui avatar di tampilan
                if (avatarImg && avatarImg.getAttribute("src")) {
                    var contactImg = avatarImg.getAttribute("src");
                    document.querySelector(".user-own-img").innerHTML = `<img src="${contactImg}" class="rounded-circle avatar-xs" alt="">`;
                    document.querySelector(".profile-offcanvas .profile-img").innerHTML = `<img src="${contactImg}" class="rounded-circle avatar-xs" alt="">`;
                } else if (initialsElement) {
                    var initials = initialsElement.textContent.trim();
                    document.querySelector(".user-own-img").innerHTML = `<span class="avatar-title rounded-circle bg-primary fs-10" style="width: 24px; height: 24px;">${initials}</span>`;
                    document.querySelector(".profile-offcanvas .profile-img").innerHTML = `<span class="avatar-title rounded-circle bg-primary fs-10" style="width: 24px; height: 24px;">${initials}</span>`;
                } else {
                    // Fallback jika avatar dan inisial tidak ada
                    document.querySelector(".user-own-img").innerHTML = `<img src="${dummyUserImage}" class="rounded-circle avatar-xs" alt="">`;
                    document.querySelector(".profile-offcanvas .profile-img").innerHTML = `<img src="${dummyUserImage}" class="rounded-circle avatar-xs" alt="">`;
                }

                // Jika sedang membalas pesan, tutup replyCard
                if (isreplyMessage === true) {
                    isreplyMessage = false;
                    document.querySelector(".replyCard").classList.remove("show");
                }
            });
        });

        // Event untuk daftar channel
        document.querySelectorAll("#channelList li").forEach(function (item) {
            item.addEventListener("click", function () {
                currentChatId = "channel-chat";
                currentSelectedChat = "channel";
                updateSelectedChat();

                // Ambil nama channel
                var channelname = item.querySelector(".text-truncate").textContent.trim();
                var channelTopbar = document.getElementById("channel-chat");
                channelTopbar.querySelector(".user-chat-topbar .text-truncate .username").textContent = channelname;
                document.querySelector(".profile-offcanvas .username").textContent = channelname;

                // Avatar channel selalu berupa simbol `#`
                var channelAvatar = `
                    <div class="flex-shrink-0 chat-user-img align-self-center me-3 ms-0">
                        <div class="avatar-xxs">
                            <div class="avatar-title bg-light rounded-circle text-body">#</div>
                        </div>
                    </div>`;
                var oldAvatar = channelTopbar.querySelector(".user-chat-topbar .chat-user-img");
                if (oldAvatar) {
                    oldAvatar.outerHTML = channelAvatar; // Ganti seluruh elemen avatar
                }

                // Ambil data created by dan jumlah member dari elemen
                var createdBy = item.querySelector("#created")?.textContent.trim() || "Created by: Unknown";
                var membersCount = item.querySelector("#count-member")?.textContent.trim() || "Members: 0";

                // Perbarui informasi created by dan members di channel topbar
                var channelInfo = `Created by: ${createdBy.replace("Created by:", "").trim()}, ${membersCount}`;
                var channelInfoElement = channelTopbar.querySelector(".user-chat-topbar .userStatus small");
                if (channelInfoElement) {
                    channelInfoElement.textContent = channelInfo;
                }

                // Tutup reply card jika aktif
                if (isreplyMessage === true) {
                    isreplyMessage = false;
                    document.querySelector(".replyCard").classList.remove("show");
                }
            });
        });

    }



    var emojiPicker = new FgEmojiPicker({
        trigger: [".emoji-btn"],
        removeOnSelection: false,
        closeButton: true,
        position: ["top", "right"],
        preFetch: true,
        dir: "build/js/pages/plugins/json",
        insertInto: document.querySelector(".chat-input"),
    });

    // emojiPicker position
    var emojiBtn = document.getElementById("emoji-btn");
    emojiBtn.addEventListener("click", function () {
        setTimeout(function () {
            var fgEmojiPicker = document.getElementsByClassName("fg-emoji-picker")[0];
            if (fgEmojiPicker) {
                var leftEmoji = window.getComputedStyle(fgEmojiPicker) ? window.getComputedStyle(fgEmojiPicker).getPropertyValue("left") : "";
                if (leftEmoji) {
                    leftEmoji = leftEmoji.replace("px", "");
                    leftEmoji = leftEmoji - 40 + "px";
                    fgEmojiPicker.style.left = leftEmoji;
                }
            }
        }, 0);
    });

})();

// chat-conversation
var scrollEl = new SimpleBar(document.getElementById('chat-conversation'));
scrollEl.getScrollElement().scrollTop = document.getElementById("users-conversation").scrollHeight;
