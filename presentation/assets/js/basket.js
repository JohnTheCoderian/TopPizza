"use strict",

  (window.onload = function() {

    //setBasket
    updateCart(getBasket());

    //onclick event add,clear
    //click ADD
    document.querySelectorAll("#addToBasket").forEach(btn => {
      btn.addEventListener("click", event => addtoCart(event));
    });

    //clear basket
    document.querySelector("#clearBasket").addEventListener("click", () => {
      docCookies.removeItem("basket");
      updateCart(getBasket());
    });

    //ADD
    function addtoCart(event) {
      let basket = getBasket();
      let pizzaID = event.path[1].id;
      let name = document.querySelector(`#${pizzaID}>.pizzaNaam`).innerText;
      let price = toNumber(
        document.querySelector(`#${pizzaID}>.pizzaPrijs`).innerText
      );
      let orderline = {
        productID: pizzaID,
        productName: name,
        price: price,
        amount: 1
      };
      addLine(basket, orderline);
      updateCart(basket);
      basket = JSON.stringify(basket);
      docCookies.setItem("basket", basket);
    }

    function addLine(arr, obj) {
      let i = arr.findIndex(x => x.productID === obj.productID);
      if (i > -1) {
        arr[i].amount += 1;
      } else {
        arr.push(obj);
      }
    }

    function toNumber(str) {
      let regex = /[0-9]/g;
      let nstr = str.match(regex).join("");
      return parseFloat(nstr);
    }

    function getBasket() {
      let x = docCookies.getItem("basket");
      if (x !== null) {
        x = JSON.parse(x);
        return x;
      } else {
        x = [];
        return x;
      }
    }

    //UPDATE html
    function updateCart(arr) {
      //update the cart lines
      let element = document.querySelector(".cartLineItems");
      let html = arr
        .map(obj => {
          return `
            <li class="cartItem">
              <div class="cartContent">
                <span class="amount">${obj.amount}x</span>
                <span class="item">${obj.productName}</span>
                <span class="totalPerLine">€${obj.amount * obj.price}</span>
                <div class="buttons">
                  <button type="button"  class="removeItemperLine" id="${
                    obj.productID
                  }">-</button>
                </div>
              </div>
            </li>`;
        })
        .join("");
      element.innerHTML = html;
      //assign function to minus button
      document.querySelectorAll(".removeItemperLine").forEach(btn => {
        btn.addEventListener("click", event => removeLine(event));
      });
      //set Total:
      let totalEl = document.querySelector(".cartTotal span:nth-child(2)");
      let totalValue = arr.reduce(
        (acc, obj) => acc + obj.price * obj.amount,
        0
      );
      totalEl.innerText = `€${totalValue}`;
    }

    function removeLine(event) {
      let basket = getBasket();
      let lineID = event.path[0].id;
      let i = basket.findIndex(x => x.productID === lineID);
      let obj = basket[i];
      if (obj.amount > 1) {
        obj.amount -= 1;
      } else {
        basket.splice(i, 1);
      }
      updateCart(basket);
      basket = JSON.stringify(basket);
      docCookies.setItem("basket", basket);
    }


    //animate functions

    let closeCart=document.querySelector('.cartClose');
    let panel=document.querySelector('.basketPanel');
    let basket=document.querySelector('.basketbtn');

    closeCart.addEventListener('click',()=>{
      panel.style.transform="translateX(100%)";
    });

    basket.addEventListener('click',()=>{
      panel.style.transform="translateX(0)";
    })
  }); //end onload
