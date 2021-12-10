var swiper = new Swiper(".mySwiper", {
    loop: true,
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
});
var swiper2 = new Swiper(".mySwiper2", {
    loop: true,
    spaceBetween: 10,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    thumbs: {
        swiper: swiper,
    },
});

/*------------- Cookie -------------*/
function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(";");
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == " ") {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie(key) {
    let value = getCookie(key);
    if (value == "") {
        return false;
    } else {
        return true;
    }
}

/*------------- cart -------------*/
$("#quantity").click(function (e) {
    if (e.target.classList.contains("plus")) {
        $("#input-quantity").val(Number($("#input-quantity").val()) + 1);
        if ($("#input-quantity").val() >= 5) {
            $(".plus").css("pointer-events", "none");
        }
        if ($("#input-quantity").val() > 1) {
            $(".minus").css("pointer-events", "auto");
        }
    }
    if (e.target.classList.contains("minus")) {
        $("#input-quantity").val(Number($("#input-quantity").val()) - 1);
        if ($("#input-quantity").val() <= 1) {
            $(".minus").css("pointer-events", "none");
        }
        if ($("#input-quantity").val() < 5) {
            $(".plus").css("pointer-events", "auto");
        }
    }
});
let timeout = null;
let timeout_error = null;
$("#add-btn").click(function () {
    let id = $(this).data("id");
    $.ajax({
        url: "http://127.0.0.1:8000/cart/" + id,
        method: "get",
        data: {
            quantity: $("#input-quantity").val(),
        },
        dataType: "json",
        success: function (data) {
            if (data.message == "OK") {
                clearTimeout(timeout);
                $("html").animate(
                    {
                        scrollTop: 0,
                    },
                    1
                );
                $("#cart_quantity").removeClass("hide");
                $("#little_cart").css("display", "block");
                $("#little_cart img").attr("src", data.image);
                $("#little_cart #product_name").text(data.name);
                $("#cart_quantity").text(data.cart_total);
                timeout = setTimeout(function () {
                    $("#little_cart").css("display", "none");
                }, 5000);
            } else {
                clearTimeout(timeout_error);
                if (!$("#add-btn").parent().parent().next().hasClass("error")) {
                    $("#add-btn")
                        .parent()
                        .parent()
                        .after(
                            "<span class='error mt-3'>Quantity exceed 5,you already have " +
                                data.already_in_cart +
                                " in cart!</span>"
                        );
                }
                timeout_error = setTimeout(function () {
                    $(".error").remove();
                }, 5000);
            }
        },
        error: function (message) {
            console.log(message);
        },
    });
});
/*---------------- review ------------------*/
$("#review-box button").click(function () {
    $(".inputchildreply").remove();
    $(".inputreply form").css("display", "none");
    if ($("#review-box #review-content").val() == "") {
        if (!$("#review-box p").length) {
            $("#review-box #review-content").after(
                "<p style='color:red'>Please enter your content!<p>"
            );
            setTimeout(function () {
                $("#review-box p").remove();
            }, 5000);
        }
    } else {
        if (!checkCookie("name")) {
            $("#user-info").css("display", "flex");
        } else {
            $.ajax({
                url: "http://127.0.0.1:8000/review/add",
                method: "get",
                data: {
                    product_id: $("#review-box").data("id"),
                    content: $("#review-content").val(),
                },
                success: function (data) {
                    $("#user-info form").trigger("reset");
                    $("#review-box textarea").val("");
                    $("#review-container").prepend(data);
                },
                error: function (message) {
                    console.log(message);
                },
            });
        }
    }
});

$.validator.addMethod(
    "phone",
    function (value) {
        let patt = /^0[0-9]{9,10}$/;
        return patt.test(value);
    },
    "Phone number is invalid!"
);
$("#user-info form").validate({
    rules: {
        name: {
            required: true,
        },
        email: {
            required: true,
            email: true,
        },
        phone_number: {
            required: true,
            phone: true,
        },
    },
    message: {
        name: {
            required: "Please enter your name!",
        },
        email: {
            required: "Please enter your email!",
        },
        phone_number: {
            required: "Please enter your phone number!",
        },
    },
});

$("#user-info form button").click(function (event) {
    event.preventDefault();
    if ($(this).attr("id") == "send-info") {
        let name = $("#user-info input[name='name']").val();
        let email = $("#user-info input[name='email']").val();
        let phone_number = $("#user-info input[name='phone_number']").val();
        setCookie("name", name, 1);
        setCookie("email", email, 1);
        setCookie("phone", phone_number, 1);
        if ($("#user-info form").valid()) {
            $("#user-info form").trigger("reset");
            $("#user-info").css("display", "none");
            $("#review-box button").before(
                '<a href="javascript:void(0)" id="change-info" class="btn btn-primary me-1">change info</a>'
            );
        }
    }
});

$("#user-info form span").click(function () {
    $("#user-info").css("display", "none");
    $("#user-info form").trigger("reset");
});

function showformreply(id) {
    $(".inputreply form").css("display", "none");
    $(".inputchildreply").remove();
    $("form#r" + id).css("display", "block");
    let reviewer = $(".review[data-id=" + id + "] > strong > span.name").text();
    $("form#r" + id + " textarea").val("@" + reviewer + ": ");
    $("form#r" + id + " textarea").focus();
}

function closereplyform(btn) {
    btn.parentElement.style.display = "none";
}

/*----------- reply review -----------*/
function sendreply(id) {
    if (!checkCookie("name")) {
        $("#user-info").css("display", "flex");
        return;
    }
    let reply_content = $(
        "form[id=r" + id + "] textarea[name='reply_content']"
    ).val();
    let _token = $("#user-info input[name='_token']").val();
    let product_id = $("form[id=r" + id + "] input[name='product_id']").val();
    $.ajax({
        url: "http://127.0.0.1:8000/review/reply/add",
        method: "post",
        data: {
            _token: _token,
            reply_content: reply_content,
            review_id: id,
            product_id: product_id,
        },
        success: function (data) {
            if ($("#r" + data.review_id).hasClass("hide-list")) {
                $("#r" + data.review_id).removeClass("hide-list");
            }
            $("#r" + data.review_id).append(data.response);
            $("form[id=r" + id + "]").trigger("reset");
            $("form[id=r" + id + "]").css("display", "none");
        },
        error: function (message) {
            console.log(message);
        },
    });
}

/*------------ child reply -----------*/
$(document).on("click", ".child-reply-btn", function () {
    $(".inputchildreply").remove();
    $(".inputreply form").css("display", "none");
    let product_id = $(this).parent().data("product");
    let reply_id = $(this).parent().data("id");
    let replier = $(
        ".reply-content[data-id=" + reply_id + "] strong span.name"
    ).text();
    let review_id = $(this).parent().data("parent");
    $("form#r" + review_id).css("display", "none");
    let _token = $("form#r" + review_id + " input[name='_token']").val();
    let form =
        '<div class="inputchildreply">' +
        '<form method="post" autocomplete="off" id="' +
        reply_id +
        '">' +
        '<input type="hidden" name="_token" value="' +
        _token +
        '">' +
        '<div class="mb-3">' +
        '<textarea class="form-control" name="childreply_content" rows="3"></textarea>' +
        "</div>" +
        '<input type="hidden" name="parent_id" value="' +
        reply_id +
        '">' +
        '<input type="hidden" name="product_id" value="' +
        product_id +
        '">' +
        '<input type="hidden" name="review_id" value="' +
        review_id +
        '">' +
        '<a href="javascript:void(0)" data-id="' +
        reply_id +
        '" class="child-reply-send">Send</a>' +
        '<a href="javascript:void(0)" onclick="closereplyform(this)">Cancel</a>' +
        "</form>" +
        "</div>";
    $(".reply-content[data-id=" + reply_id + "]").after(form);
    $("form#" + reply_id + " textarea[name='childreply_content']").val(
        "@" + replier + ": "
    );
    $("form#" + reply_id + " textarea[name='childreply_content']").focus();
});

$(document).on("click", ".child-reply-send", function () {
    if (!checkCookie("name")) {
        $("#user-info").css("display", "flex");
        return;
    }
    let reply_id = $(this).data("id");
    let product_id = $("form#" + reply_id + " input[name='product_id']").val();
    let _token = $("#user-info input[name='_token']").val();
    let review_id = $("form#" + reply_id + " input[name='review_id']").val();
    let childreply_content = $(
        "form#" + reply_id + " textarea[name='childreply_content']"
    ).val();
    $.ajax({
        url: "http://127.0.0.1:8000/review/reply/addchild",
        method: "post",
        data: {
            product_id: product_id,
            _token: _token,
            reply_id: reply_id,
            review_id: review_id,
            childreply_content: childreply_content,
        },
        success: function (data) {
            $("#r" + data.review_id).append(data.response);
            $(".inputchildreply").remove();
        },
        error: function (message) {
            console.log(message);
        },
    });
});
/*---------------- change info ------------------*/
$(document).on("click", "#change-info", function () {
    let name = getCookie("name");
    let email = getCookie("email");
    let phone_number = getCookie("phone");
    $("#user-info form input[name='name']").val(name);
    $("#user-info form input[name='email']").val(email);
    $("#user-info form input[name='phone_number']").val(phone_number);
    $("#user-info form button").text("Change");
    $("#user-info form button").attr("id", "change-act");
    $("#user-info").css("display", "flex");
});

$(document).on("click", "#change-act", function (e) {
    e.preventDefault();
    if ($("#user-info form").valid()) {
        let name = $("#user-info form input[name='name']").val();
        let email = $("#user-info form input[name='email']").val();
        let phone_number = $(
            "#user-info form input[name='phone_number']"
        ).val();
        setCookie("name", name, 1);
        setCookie("email", email, 1);
        setCookie("phone", phone_number, 1);
        $("#user-info").css("display", "none");
    }
});
