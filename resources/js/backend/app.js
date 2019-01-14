/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

// Thumbnail Functionality

let thumbUrl = document.querySelector("#thumbnail_url");
let thumb = document.querySelector("#thumbnail");
let form = document.querySelector("form");

if (thumbUrl) {
    if (thumbUrl.value) {
        thumb.setAttribute("disabled", true);
    }

    thumbUrl.addEventListener("focus", function() {
        thumb.setAttribute("disabled", true);
    });
}

if (thumbUrl) {
    thumbUrl.addEventListener(
        "blur",
        function() {
            if (this.value == "") {
                thumb.disabled = false;
            }
        },
        true
    );
}
