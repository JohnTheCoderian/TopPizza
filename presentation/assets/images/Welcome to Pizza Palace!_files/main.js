"use strict",

    document.querySelector(".logout").addEventListener("click", () => {
      docCookies.removeItem("loginUser");
    });
