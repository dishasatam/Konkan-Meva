document.addEventListener("DOMContentLoaded", function() {
  const carousel = document.querySelector(".carousel");
  const arrowBtns = document.querySelectorAll(".wrapper i");
  const wrapper = document.querySelector(".wrapper");

  const firstCard = carousel.querySelector(".card");
  const firstCardWidth = firstCard.offsetWidth;

  let isDragging = false,
      startX,
      startScrollLeft,
      timeoutId;

  const dragStart = (e) => { 
      isDragging = true;
      carousel.classList.add("dragging");
      startX = e.pageX;
      startScrollLeft = carousel.scrollLeft;
  };

  const dragging = (e) => {
      if (!isDragging) return;
  
      // Calculate the new scroll position
      const newScrollLeft = startScrollLeft - (e.pageX - startX);
  
      // Check if the new scroll position exceeds 
      // the carousel boundaries
      if (newScrollLeft <= 0 || newScrollLeft >= 
          carousel.scrollWidth - carousel.offsetWidth) {
          
          // If so, prevent further dragging
          isDragging = false;
          return;
      }
  
      // Otherwise, update the scroll position of the carousel
      carousel.scrollLeft = newScrollLeft;
  };

  const dragStop = () => {
      isDragging = false; 
      carousel.classList.remove("dragging");
  };

  const autoPlay = () => {
  
      // Return if window is smaller than 800
      if (window.innerWidth < 800) return; 
      
      // Calculate the total width of all cards
      const totalCardWidth = carousel.scrollWidth;
      
      // Calculate the maximum scroll position
      const maxScrollLeft = totalCardWidth - carousel.offsetWidth;
      
      // If the carousel is at the end, stop autoplay
      if (carousel.scrollLeft >= maxScrollLeft) return;
      
      // Autoplay the carousel after every 2500ms
      timeoutId = setTimeout(() => 
          carousel.scrollLeft += firstCardWidth, 2500);
  };

  carousel.addEventListener("mousedown", dragStart);
  carousel.addEventListener("mousemove", dragging);
  document.addEventListener("mouseup", dragStop);
  wrapper.addEventListener("mouseenter", () => 
      clearTimeout(timeoutId));
  wrapper.addEventListener("mouseleave", autoPlay);

  // Add event listeners for the arrow buttons to 
  // scroll the carousel left and right
  arrowBtns.forEach(btn => {
      btn.addEventListener("click", () => {
          carousel.scrollLeft += btn.id === "left" ? 
              -firstCardWidth : firstCardWidth;
      });
  });
});

//product

//cart
var cart = {
    // (A) PROPERTIES
    hPdt : null,      // html products list
    hItems : null,    // html current cart
    items : {},       // current items in cart
    iURL : "images/", // product image url folder
    currency : "$",   // currency symbol
    total : 0,        // total amount
  };
// (B) LOCALSTORAGE CART
// (B1) SAVE CURRENT CART INTO LOCALSTORAGE
save : () => localStorage.setItem("cart", JSON.stringify(cart.items)),

// (B2) LOAD CART FROM LOCALSTORAGE
load : () => {
  cart.items = localStorage.getItem("cart");
  if (cart.items == null) { cart.items = {}; }
  else { cart.items = JSON.parse(cart.items); }
},
  
// (B3) NUKE CART!
nuke : () => { if (confirm("Empty cart?")) {
  cart.items = {};
  localStorage.removeItem("cart");
  cart.list();
}}

// (C) INITIALIZE
init : () => {
    // (C1) GET HTML ELEMENTS
    cart.hPdt = document.getElementById("cart-products");
    cart.hItems = document.getElementById("cart-items");
      
    // (C2) DRAW PRODUCTS LIST
    cart.hPdt.innerHTML = "";
    let template = document.getElementById("template-product").content, p, item;
    for (let id in cart.products) {
      p = cart.products[id];
      item = template.cloneNode(true);
      item.querySelector(".p-img").src = cart.iURL + p.img;
      item.querySelector(".p-name").textContent = p.name;
      item.querySelector(".p-price").textContent = cart.currency + p.price.toFixed(2);
      item.querySelector(".p-add").onclick = () => cart.add(id);
      cart.hPdt.appendChild(item);
    }
      
    // (C3) LOAD CART FROM PREVIOUS SESSION
    cart.load();
      
    // (C4) LIST CURRENT CART ITEMS
    cart.list();
  }

// (D) LIST CURRENT CART ITEMS (IN HTML)
list : () => {
    // (D1) RESET
    cart.total = 0;
    cart.hItems.innerHTML = "";
    let item, empty = true;
    for (let key in cart.items) {
      if (cart.items.hasOwnProperty(key)) { empty = false; break; }
    }
  
    // (D2) CART IS EMPTY
    if (empty) {
      item = document.createElement("div");
      item.innerHTML = "Cart is empty";
      cart.hItems.appendChild(item);
    }
      
    // (D3) CART IS NOT EMPTY - LIST ITEMS
    else {
      let template = document.getElementById("template-cart").content, p;
      for (let id in cart.items) {
        p = cart.products[id];
        item = template.cloneNode(true);
        item.querySelector(".c-del").onclick = () => cart.remove(id);
        item.querySelector(".c-name").textContent = p.name;
        item.querySelector(".c-qty").value = cart.items[id];
        item.querySelector(".c-qty").onchange = function () { cart.change(id, this.value); };
        cart.hItems.appendChild(item);
        cart.total += cart.items[id] * p.price;
      }
  
      // (D3-3) TOTAL AMOUNT
      item = document.createElement("div");
      item.className = "c-total";
      item.id = "c-total";
      item.innerHTML = `TOTAL: ${cart.currency}${cart.total}`;
      cart.hItems.appendChild(item);
   
      // (D3-4) EMPTY & CHECKOUT
      item = document.getElementById("template-cart-checkout").content.cloneNode(true);
      cart.hItems.appendChild(item);
    }
  }
  
// (E) ADD ITEM INTO CART
add : id => {
    if (cart.items[id] == undefined) { cart.items[id] = 1; }
    else { cart.items[id]++; }
    cart.save(); cart.list();
  },
  
  // (F) CHANGE QUANTITY
  change : (pid, qty) => {
    // (F1) REMOVE ITEM
    if (qty <= 0) {
      delete cart.items[pid];
      cart.save(); cart.list();
    }
  
    // (F2) UPDATE TOTAL ONLY
    else {
      cart.items[pid] = qty;
      var total = 0;
      for (let id in cart.items) {
        cart.total += cart.items[id] * products[id].price;
        document.getElementById("c-total").innerHTML = `TOTAL: ${cart.currency}${cart.total}`;
      }
    }
  },
  
  document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".cart-btn").forEach(button => {
        button.addEventListener("click", function(event) {
            event.preventDefault();
            let productId = this.getAttribute("data-id");

            fetch("cart.php", {
                method: "POST",
                body: new URLSearchParams({ "product_id": productId }),
                headers: { "Content-Type": "application/x-www-form-urlencoded" }
            })
            .then(response => response.json())
            .then(data => alert(data.message))
            .catch(error => console.error("Error:", error));
        });
    });

    document.querySelectorAll(".wishlist-btn").forEach(button => {
        button.addEventListener("click", function(event) {
            event.preventDefault();
            let productId = this.getAttribute("data-id");

            fetch("wishlist.php", {
                method: "POST",
                body: new URLSearchParams({ "product_id": productId }),
                headers: { "Content-Type": "application/x-www-form-urlencoded" }
            })
            .then(response => response.json())
            .then(data => alert(data.message))
            .catch(error => console.error("Error:", error));
        });
    });
});

  // (G) REMOVE ITEM FROM CART
  remove : id => {
    delete cart.items[id];
    cart.save();
    cart.list();
  },
    
  // (H) CHECKOUT
  checkout : () => {
    // SEND DATA TO SERVER
    // CHECKS
    // SEND AN EMAIL
    // RECORD TO DATABASE
    // PAYMENT
    // WHATEVER IS REQUIRED
    alert("TO DO");
  
    /*
    var data = new FormData();
    data.append("cart", JSON.stringify(cart.items));
    data.append("products", JSON.stringify(products));
    data.append("total", cart.total);
   
    fetch("SERVER-SCRIPT", { method:"POST", body:data })
    .then(res=>res.text())
    .then(res => console.log(res))
    .catch(err => console.error(err));
    */
  }