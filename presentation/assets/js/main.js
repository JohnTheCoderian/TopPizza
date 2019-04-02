"use strict",

    document.querySelector(".logout").addEventListener("click", () => {
      docCookies.removeItem("loginUser");
      docCookies.removeItem("basket");
      window.location.href = 'index.php';
    });
