<!-- home.php -->

<?php
session_start();

if(!isset($_SESSION['loggedin'])){
header("Location:index.php");
exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Jonathan's Farm</title>

<!-- GOOGLE FONTS -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- FONT AWESOME -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
scroll-behavior:smooth;
}

body{
background:#f5f7fb;
color:#111827;
transition:0.3s;
}

/* DARK MODE */

body.dark{
background:#0f172a;
color:white;
}

body.dark .navbar,
body.dark .footer{
background:#020617;
}

body.dark .product-card,
body.dark .cart-box,
body.dark .payment-box,
body.dark .review-box{
background:#1e293b;
color:white;
}

body.dark .section-title{
color:white;
}

/* NAVBAR */

.navbar{
background:linear-gradient(to right,#022c22,#065f46,#10b981);
padding:20px 50px;
display:flex;
justify-content:space-between;
align-items:center;
position:sticky;
top:0;
z-index:1000;
}

.logo{
display:flex;
align-items:center;
gap:15px;
color:white;
}

.logo i{
font-size:42px;
color:#d9ff00;
}

.logo h2{
font-size:30px;
}

.nav-links{
display:flex;
align-items:center;
gap:30px;
}

.nav-links a{
color:white;
text-decoration:none;
font-size:18px;
font-weight:500;
transition:0.3s;
}

.nav-links a:hover{
color:#d9ff00;
}

.dark-btn{
background:white;
color:#111;
padding:10px 15px;
border-radius:12px;
border:none;
cursor:pointer;
font-size:18px;
}

/* HERO */

.hero{
height:90vh;
background:
linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),
url('https://images.unsplash.com/photo-1500937386664-56d1dfef3854?q=80&w=1400&auto=format&fit=crop');

background-size:cover;
background-position:center;

display:flex;
justify-content:center;
align-items:center;
text-align:center;
padding:20px;
}

.hero-content{
color:white;
max-width:850px;
}

.hero-content h1{
font-size:65px;
margin-bottom:20px;
}

.hero-content p{
font-size:22px;
line-height:1.8;
margin-bottom:30px;
}

.hero-content button{
padding:18px 40px;
border:none;
background:#10b981;
color:white;
font-size:20px;
border-radius:15px;
cursor:pointer;
transition:0.3s;
}

.hero-content button:hover{
transform:scale(1.05);
background:#059669;
}

/* SECTION */

.section{
padding:70px 50px;
}

.section-title{
font-size:45px;
margin-bottom:40px;
text-align:center;
color:#065f46;
}

/* PRODUCTS */

.products{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(240px,1fr));
gap:30px;
}

.product-card{
background:white;
border-radius:22px;
overflow:hidden;
box-shadow:0 5px 15px rgba(0,0,0,0.08);
transition:0.3s;
}

.product-card:hover{
transform:translateY(-8px);
}

.product-card img{
width:100%;
height:200px;
object-fit:cover;
}

.product-info{
padding:20px;
text-align:center;
}

.product-info h3{
font-size:24px;
margin-bottom:10px;
}

.price{
font-size:24px;
font-weight:700;
color:#10b981;
margin-bottom:15px;
}

.product-info button{
width:100%;
padding:14px;
border:none;
background:#10b981;
color:white;
font-size:18px;
border-radius:12px;
cursor:pointer;
transition:0.3s;
}

.product-info button:hover{
background:#047857;
}

/* CART */

.cart-box{
margin-top:60px;
background:white;
padding:30px;
border-radius:20px;
box-shadow:0 5px 15px rgba(0,0,0,0.08);
}

.cart-box h2{
margin-bottom:20px;
font-size:35px;
}

#cart-items li{
margin-bottom:12px;
font-size:20px;
}

.total{
margin-top:20px;
font-size:30px;
font-weight:bold;
color:#10b981;
}

.checkout-btn{
margin-top:20px;
padding:16px 35px;
border:none;
background:#10b981;
color:white;
font-size:20px;
border-radius:12px;
cursor:pointer;
}

/* PAYMENT */

.payment-grid{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
gap:25px;
}

.payment-box{
background:white;
padding:25px;
border-radius:20px;
box-shadow:0 5px 15px rgba(0,0,0,0.08);
}

.payment-box img{
width:100px;
height:60px;
object-fit:contain;
margin-bottom:15px;
}

.payment-box h3{
margin-bottom:15px;
font-size:28px;
}

.payment-box input{
width:100%;
padding:14px;
margin-bottom:15px;
border-radius:10px;
border:1px solid #ddd;
font-size:16px;
}

/* REVIEWS */

.reviews{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(300px,1fr));
gap:25px;
}

.review-box{
background:white;
padding:25px;
border-radius:20px;
box-shadow:0 5px 15px rgba(0,0,0,0.08);
}

.review-box h4{
margin-bottom:10px;
font-size:22px;
}

.stars{
color:gold;
margin-bottom:10px;
}

/* CONTACT */

.contact{
text-align:center;
padding:60px 20px;
background:#065f46;
color:white;
}

.contact h2{
font-size:40px;
margin-bottom:20px;
}

.contact p{
font-size:20px;
margin-bottom:10px;
}

/* FOOTER */

.footer{
background:#022c22;
padding:25px;
text-align:center;
color:white;
font-size:18px;
}

/* MOBILE */

@media(max-width:768px){

.navbar{
flex-direction:column;
gap:20px;
}

.hero-content h1{
font-size:42px;
}

.hero-content p{
font-size:18px;
}

.section{
padding:50px 20px;
}

}

</style>

</head>

<body>

<!-- NAVBAR -->

<div class="navbar">

<div class="logo">
<i class="fa-solid fa-leaf"></i>
<h2>Jonathan's Farm</h2>
</div>

<div class="nav-links">

<a href="#">Home</a>
<a href="#products">Products</a>
<a href="#payments">Payments</a>
<a href="#reviews">Reviews</a>
<a href="visit.php">Visit Our Farm</a>
<a href="#contact">Contact</a>
<a href="dashboard.php">Dashboard</a>

<button class="dark-btn" onclick="toggleDarkMode()">
🌙
</button>

<a href="logout.php">
Logout
</a>

</div>

</div>

<!-- HERO -->

<section class="hero">

<div class="hero-content">

<h1>Fresh Organic Farm Products</h1>

<p>
Welcome to Jonathan's Farm.
We provide fresh milk, eggs, fruits, vegetables,
beef and chicken directly from our farm.
</p>

<button>
Shop Now
</button>

</div>

</section>

<!-- PRODUCTS -->

<section class="section" id="products">

<h2 class="section-title">
Farm Products
</h2>

<div class="products">

<!-- PRODUCT 1 -->

<div class="product-card">
<img src="https://images.unsplash.com/photo-1601493700631-2b16ec4b4716?q=80&w=1200&auto=format&fit=crop">

<div class="product-info">
<h3>Mangoes</h3>
<p class="price">KES 300</p>
<button onclick="addToCart('Mangoes',300)">
Add To Cart
</button>
</div>
</div>

<!-- PRODUCT 2 -->

<div class="product-card">
<img src="https://images.unsplash.com/photo-1571771894821-ce9b6c11b08e?q=80&w=1200&auto=format&fit=crop">

<div class="product-info">
<h3>Bananas</h3>
<p class="price">KES 250</p>
<button onclick="addToCart('Bananas',250)">
Add To Cart
</button>
</div>
</div>

<!-- PRODUCT 3 -->

<div class="product-card">
<img src="https://images.unsplash.com/photo-1518569656558-1f25e69d93d7?q=80&w=1200&auto=format&fit=crop">

<div class="product-info">
<h3>Farm Eggs</h3>
<p class="price">KES 450</p>
<button onclick="addToCart('Eggs',450)">
Add To Cart
</button>
</div>
</div>

<!-- PRODUCT 4 -->

<div class="product-card">
<img src="https://images.unsplash.com/photo-1563636619-e9143da7973b?q=80&w=1200&auto=format&fit=crop">

<div class="product-info">
<h3>Fresh Milk</h3>
<p class="price">KES 120</p>
<button onclick="addToCart('Milk',120)">
Add To Cart
</button>
</div>
</div>

<!-- PRODUCT 5 -->

<div class="product-card">
<img src="https://images.unsplash.com/photo-1523049673857-eb18f1d7b578?q=80&w=1200&auto=format&fit=crop">

<div class="product-info">
<h3>Avocados</h3>
<p class="price">KES 350</p>
<button onclick="addToCart('Avocados',350)">
Add To Cart
</button>
</div>
</div>

<!-- PRODUCT 6 -->

<div class="product-card">
<img src="https://images.unsplash.com/photo-1604503468506-a8da13d82791?q=80&w=1200&auto=format&fit=crop">

<div class="product-info">
<h3>Chicken</h3>
<p class="price">KES 950</p>
<button onclick="addToCart('Chicken',950)">
Add To Cart
</button>
</div>
</div>

<!-- PRODUCT 7 -->

<div class="product-card">
<img src="https://images.unsplash.com/photo-1607623814075-e51df1bdc82f?q=80&w=1200&auto=format&fit=crop">

<div class="product-info">
<h3>Fresh Beef</h3>
<p class="price">KES 800</p>
<button onclick="addToCart('Beef',800)">
Add To Cart
</button>
</div>
</div>

<!-- PRODUCT 8 -->

<div class="product-card">
<img src="https://images.unsplash.com/photo-1546094096-0df4bcaaa337?q=80&w=1200&auto=format&fit=crop">

<div class="product-info">
<h3>Tomatoes</h3>
<p class="price">KES 180</p>
<button onclick="addToCart('Tomatoes',180)">
Add To Cart
</button>
</div>
</div>

<!-- PRODUCT 9 -->

<div class="product-card">
<img src="https://images.unsplash.com/photo-1447175008436-054170c2e979?q=80&w=1200&auto=format&fit=crop">

<div class="product-info">
<h3>Carrots</h3>
<p class="price">KES 150</p>
<button onclick="addToCart('Carrots',150)">
Add To Cart
</button>
</div>
</div>

<!-- PRODUCT 10 -->

<div class="product-card">
<img src="https://images.unsplash.com/photo-1563114773-84221bd62daa?q=80&w=1200&auto=format&fit=crop">

<div class="product-info">
<h3>Watermelon</h3>
<p class="price">KES 400</p>
<button onclick="addToCart('Watermelon',400)">
Add To Cart
</button>
</div>
</div>

</div>

<!-- CART -->

<div class="cart-box">

<h2>Shopping Cart</h2>

<ul id="cart-items"></ul>

<div class="total">
Total: KES <span id="total">0</span>
</div>

<button class="checkout-btn" onclick="checkout()">
Checkout
</button>

</div>

</section>

<!-- PAYMENTS -->

<section class="section" id="payments">

<h2 class="section-title">
Payment Options
</h2>

<div class="payment-grid">

<div class="payment-box">

<img src="https://upload.wikimedia.org/wikipedia/commons/1/15/M-PESA_LOGO-01.svg">

<h3>M-Pesa</h3>

<form action="stkpush.php" method="POST">

<label>Full Name</label>

<input
type="text"
name="fullname"
placeholder="Enter Full Name"
required>

<label>Phone Number</label>

<input
type="text"
name="phone"
placeholder="2547XXXXXXXX"
required>

<label>Amount</label>

<input
type="number"
name="amount"
id="paymentAmount"
readonly>

<button
type="submit"
class="checkout-btn">

Proceed to Payment

</button>

</form>

</div>
<div class="payment-box">
<img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg">
<h3>PayPal</h3>
<input type="text" placeholder="Enter PayPal Email">
</div>

<div class="payment-box">
<img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg">
<h3>Apple Pay</h3>
<input type="text" placeholder="Apple Pay Account">
</div>

<div class="payment-box">
<img src="https://seeklogo.com/images/M/mtn-logo-40644FC8B0-seeklogo.com.png">
<h3>MTN Mobile Money</h3>
<input type="text" placeholder="Enter phone nummber">
</div>

</div>
</section>

<!-- REVIEWS -->

<section class="section" id="reviews">

<h2 class="section-title">
Customer Reviews
</h2>

<div class="reviews">

<div class="review-box">
<h4>Mary Wanjiku</h4>
<div class="stars">★★★★★</div>
<p>Fresh products and fast delivery.</p>
</div>

<div class="review-box">
<h4>Brian Otieno</h4>
<div class="stars">★★★★★</div>
<p>Very professional farm website.</p>
</div>

<div class="review-box">
<h4>Kevin Mutua</h4>
<div class="stars">★★★★★</div>
<p>Best organic products in Kenya.</p>
</div>

</div>

</section>
<section class="customer-reviews">

<h2>⭐⭐ Customer Reviews</h2>
<p>Tell us about your experience at Jonathan's Farm.</p>

<form id="reviewForm">

<input type="text" id="name" placeholder="Your Name" required>

<select id="rating">
<option value="★★★★★">★★★★★ Excellent</option>
<option value="★★★★☆">★★★★☆ Very Good</option>
<option value="★★★☆☆">★★★☆☆ Good</option>
<option value="★★☆☆☆">★★☆☆☆ Fair</option>
<option value="★☆☆☆☆">★☆☆☆☆ Poor</option>
</select>

<textarea id="review" rows="5"
placeholder="Share your opinion..."
required></textarea>

<button type="submit">
Submit Review
</button>

</form>

<div id="reviewsList">

<h3>What Our Customers Say</h3>

</div>

</section>
<!-- CONTACT -->

<section class="contact" id="contact">

<h2>Contact Us</h2>

<p>Email: jn191340@gmail.com</p>
<p>Phone: 0114770542</p>

</section>

<!-- FOOTER -->

<div class="footer">
© 2026 Jonathan's Farm. All Rights Reserved.
</div>

<script>

let total = 0;

function addToCart(product, price){

    const li = document.createElement("li");

    li.innerHTML = product + " - KES " + price;

    document.getElementById("cart-items").appendChild(li);

    total += price;

    document.getElementById("total").innerHTML = total;

    // Automatically update M-Pesa amount
    document.getElementById("paymentAmount").value = total;
}

function checkout(){

    if(total == 0){

        alert("Your cart is empty.");

        return;

    }

    document.getElementById("payments").scrollIntoView({
        behavior:"smooth"
    });

}

function toggleDarkMode(){

    document.body.classList.toggle("dark");

}

</script>
</body>
</html>