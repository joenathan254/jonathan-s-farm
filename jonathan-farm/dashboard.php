<?php
session_start();

/* Dashboard Password Protection */

if (!isset($_SESSION['dashboard_access'])) {

    if (isset($_POST['dashboard_password'])) {

        if ($_POST['dashboard_password'] === 'Magoma2008') {

            $_SESSION['dashboard_access'] = true;
            header("Location: dashboard.php");
            exit();

        } else {

            $error = "Incorrect Dashboard Password";
        }
    }

    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Dashboard Access</title>
        <style>
            body{
                font-family:Poppins,sans-serif;
                background:#f5f7fb;
                display:flex;
                justify-content:center;
                align-items:center;
                height:100vh;
            }

            .login-box{
                background:white;
                padding:40px;
                border-radius:20px;
                box-shadow:0 5px 20px rgba(0,0,0,0.1);
                width:400px;
                text-align:center;
            }

            input{
                width:100%;
                padding:15px;
                margin-top:15px;
                border:1px solid #ddd;
                border-radius:10px;
            }

            button{
                width:100%;
                padding:15px;
                margin-top:15px;
                border:none;
                background:#10b981;
                color:white;
                border-radius:10px;
                cursor:pointer;
                font-size:16px;
            }

            .error{
                color:red;
                margin-top:10px;
            }
        </style>
    </head>
    <body>

    <div class="login-box">
        <h2>Admin Dashboard Access</h2>

        <form method="POST">
            <input type="password"
                   name="dashboard_password"
                   placeholder="Enter Dashboard Password"
                   required>

            <button type="submit">
                Enter Dashboard
            </button>
        </form>

        <?php
        if(isset($error)){
            echo "<p class='error'>$error</p>";
        }
        ?>
    </div>

    </body>
    </html>
    <?php
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Jonathan's Farm Dashboard</title>

<!-- GOOGLE FONT -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- FONT AWESOME -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<!-- CHART JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
background:#f3f6fb;
display:flex;
transition:0.3s;
}

/* SIDEBAR */

.sidebar{
width:280px;
height:100vh;
background:linear-gradient(to bottom,#021b14,#033b25,#066d3b);
padding:25px;
position:fixed;
left:0;
top:0;
overflow:auto;
}

.logo{
display:flex;
align-items:center;
gap:15px;
margin-bottom:40px;
color:white;
}

.logo i{
font-size:45px;
color:#a3ff12;
}

.logo h2{
font-size:30px;
}

.logo p{
font-size:14px;
opacity:0.8;
}

/* MENU */

.menu{
display:flex;
flex-direction:column;
gap:12px;
}

.menu a{
text-decoration:none;
color:white;
padding:16px;
border-radius:14px;
font-size:17px;
display:flex;
align-items:center;
gap:15px;
transition:0.3s;
}

.menu a:hover,
.menu .active{
background:#10b981;
}

.logout{
margin-top:30px;
background:#ef4444;
padding:16px;
border-radius:15px;
text-align:center;
display:block;
color:white;
text-decoration:none;
font-size:18px;
}

/* MAIN */

.main{
margin-left:280px;
width:calc(100% - 280px);
padding:30px;
}

/* TOPBAR */

.topbar{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:30px;
position:relative;
}

.topbar h1{
font-size:40px;
color:#111827;
}

.search-box{
background:white;
padding:14px 20px;
border-radius:15px;
display:flex;
align-items:center;
gap:10px;
width:350px;
box-shadow:0 5px 15px rgba(0,0,0,0.08);
}

.search-box input{
border:none;
outline:none;
width:100%;
font-size:16px;
}

.top-icons{
display:flex;
align-items:center;
gap:25px;
}

.top-icons i{
font-size:22px;
cursor:pointer;
color:#374151;
}

.profile{
display:flex;
align-items:center;
gap:15px;
}

.profile-image{
width:55px;
height:55px;
border-radius:50%;
object-fit:cover;
border:3px solid #10b981;
}

/* CARDS */

.cards{
display:grid;
grid-template-columns:repeat(4,1fr);
gap:25px;
margin-bottom:30px;
}

.card{
background:white;
padding:25px;
border-radius:20px;
display:flex;
align-items:center;
gap:20px;
box-shadow:0 5px 15px rgba(0,0,0,0.08);
}

.card i{
font-size:35px;
padding:20px;
border-radius:15px;
color:white;
}

.blue{
background:#2563eb;
}

.green{
background:#10b981;
}

.purple{
background:#9333ea;
}

.orange{
background:#f59e0b;
}

.card h4{
font-size:16px;
color:#6b7280;
}

.card h2{
font-size:32px;
margin-top:6px;
}

/* CHARTS */

.charts{
display:grid;
grid-template-columns:2fr 1fr;
gap:25px;
margin-bottom:30px;
}

.chart-box{
background:white;
padding:25px;
border-radius:20px;
box-shadow:0 5px 15px rgba(0,0,0,0.08);
}

/* BOTTOM */

.bottom{
display:grid;
grid-template-columns:1.5fr 1fr 1fr;
gap:25px;
}

.box{
background:white;
padding:25px;
border-radius:20px;
box-shadow:0 5px 15px rgba(0,0,0,0.08);
}

.box h2{
margin-bottom:20px;
}

/* TABLE */

table{
width:100%;
border-collapse:collapse;
}

table th,
table td{
padding:15px;
border-bottom:1px solid #eee;
text-align:left;
}

.status{
padding:8px 12px;
border-radius:20px;
color:white;
font-size:13px;
}

.delivered{
background:#10b981;
}

.processing{
background:#f59e0b;
}

.shipped{
background:#2563eb;
}

/* PRODUCTS */

.product-item{
display:flex;
align-items:center;
justify-content:space-between;
margin-bottom:20px;
}

.product-left{
display:flex;
align-items:center;
gap:12px;
}

.product-left img{
width:55px;
height:55px;
border-radius:12px;
object-fit:cover;
}

/* REVIEWS */

.review{
display:flex;
gap:15px;
margin-bottom:20px;
}

.review img{
width:55px;
height:55px;
border-radius:50%;
}

.stars{
color:#fbbf24;
margin:5px 0;
}

/* SETTINGS */

.settings-panel{
background:white;
padding:25px;
border-radius:20px;
box-shadow:0 5px 15px rgba(0,0,0,0.08);
margin-top:25px;
}

.setting-item{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:20px;
border-bottom:1px solid #eee;
padding-bottom:15px;
}

/* SWITCH */

.switch{
position:relative;
display:inline-block;
width:60px;
height:30px;
}

.switch input{
opacity:0;
width:0;
height:0;
}

.slider{
position:absolute;
cursor:pointer;
top:0;
left:0;
right:0;
bottom:0;
background:#ccc;
transition:0.4s;
border-radius:30px;
}

.slider:before{
position:absolute;
content:"";
height:22px;
width:22px;
left:4px;
bottom:4px;
background:white;
transition:0.4s;
border-radius:50%;
}

input:checked + .slider{
background:#10b981;
}

input:checked + .slider:before{
transform:translateX(28px);
}

/* NOTIFICATIONS */

.notification-box,
.message-box{
position:absolute;
top:70px;
right:0;
width:320px;
background:white;
padding:20px;
border-radius:20px;
box-shadow:0 10px 30px rgba(0,0,0,0.15);
display:none;
z-index:999;
}

.notification-box.active,
.message-box.active{
display:block;
}

.notification-item{
display:flex;
gap:15px;
margin-bottom:20px;
}

.notification-item i{
background:#10b981;
color:white;
padding:12px;
border-radius:12px;
height:45px;
}

/* DARK MODE */

.dark-mode{
background:#0f172a;
color:white;
}

.dark-mode .main,
.dark-mode .card,
.dark-mode .chart-box,
.dark-mode .box,
.dark-mode .settings-panel,
.dark-mode .notification-box,
.dark-mode .message-box,
.dark-mode .search-box{
background:#1e293b;
color:white;
}

.dark-mode .topbar h1,
.dark-mode .box h2,
.dark-mode .card h4{
color:white;
}

.dark-mode table td,
.dark-mode table th{
color:white;
}

.dark-mode .search-box input{
background:transparent;
color:white;
}

/* MOBILE */

@media(max-width:1200px){

.cards{
grid-template-columns:repeat(2,1fr);
}

.charts{
grid-template-columns:1fr;
}

.bottom{
grid-template-columns:1fr;
}

}

@media(max-width:768px){

.sidebar{
width:100%;
height:auto;
position:relative;
}

.main{
margin-left:0;
width:100%;
}

.cards{
grid-template-columns:1fr;
}

.topbar{
flex-direction:column;
align-items:flex-start;
gap:20px;
}

.search-box{
width:100%;
}

}

</style>
</head>

<body>

<!-- SIDEBAR -->

<div class="sidebar">

<div class="logo">
<i class="fa-solid fa-leaf"></i>

<div>
<h2>Jonathan's Farm</h2>
<p>Admin Dashboard</p>
</div>

</div>

<div class="menu">

<a href="#" class="active">
<i class="fa-solid fa-chart-line"></i>
Dashboard
</a>

<a href="home.php">
<i class="fa-solid fa-house"></i>
Homepage
</a>

<a href="#">
<i class="fa-solid fa-cart-shopping"></i>
Orders
</a>

<a href="#">
<i class="fa-solid fa-box"></i>
Products
</a>

<a href="#">
<i class="fa-solid fa-users"></i>
Customers
</a>

<a href="#">
<i class="fa-solid fa-star"></i>
Reviews
</a>

<a href="#">
<i class="fa-solid fa-gear"></i>
Settings
</a>

</div>

<a href="logout.php" class="logout">
<i class="fa-solid fa-right-from-bracket"></i>
Logout
</a>

</div>

<!-- MAIN -->

<div class="main">

<!-- TOPBAR -->

<div class="topbar">

<h1>Dashboard</h1>

<div class="search-box">
<i class="fa-solid fa-magnifying-glass"></i>
<input type="text" placeholder="Search anything...">
</div>

<div class="top-icons">

<i class="fa-regular fa-bell" id="bellBtn"></i>

<i class="fa-regular fa-envelope" id="mailBtn"></i>

<div class="profile">

<img src="WIN_20250904_08_29_11_Pro.jpg" class="profile-image">

<div>
<h4>Jonathan</h4>
<p>Administrator</p>
</div>

</div>

</div>

<!-- NOTIFICATIONS -->

<div class="notification-box" id="notificationBox">

<h3>Notifications</h3>

<div class="notification-item">

<i class="fa-solid fa-cart-shopping"></i>

<div>
<h4>New Order</h4>
<p>Mary purchased Milk and Eggs</p>
</div>

</div>

<div class="notification-item">

<i class="fa-solid fa-bell"></i>

<div>
<h4>Payment Received</h4>
<p>M-Pesa payment successful</p>
</div>

</div>

</div>

<!-- MESSAGES -->

<div class="message-box" id="messageBox">

<h3>Messages</h3>

<div class="notification-item">

<i class="fa-solid fa-envelope"></i>

<div>
<h4>Brian</h4>
<p>Thank you for fast delivery.</p>
</div>

</div>

</div>

</div>

<!-- CARDS -->

<div class="cards">

<div class="card">
<i class="fa-solid fa-dollar-sign blue"></i>

<div>
<h4>Total Revenue</h4>
<h2>KES 125K</h2>
</div>

</div>

<div class="card">
<i class="fa-solid fa-cart-shopping green"></i>

<div>
<h4>Total Orders</h4>
<h2>1,429</h2>
</div>

</div>

<div class="card">
<i class="fa-solid fa-users purple"></i>

<div>
<h4>Customers</h4>
<h2>245</h2>
</div>

</div>

<div class="card">
<i class="fa-solid fa-box orange"></i>

<div>
<h4>Products</h4>
<h2>568</h2>
</div>

</div>

</div>

<!-- CHARTS -->

<div class="charts">

<div class="chart-box">
<h2>Sales Overview</h2>
<canvas id="salesChart"></canvas>
</div>

<div class="chart-box">
<h2>Payments</h2>
<canvas id="paymentChart"></canvas>
</div>

</div>

<!-- BOTTOM -->

<div class="bottom">

<!-- ORDERS -->

<div class="box">

<h2>Recent Orders</h2>

<table>

<tr>
<th>Order</th>
<th>Customer</th>
<th>Status</th>
</tr>

<tr>
<td>#ORD1025</td>
<td>Mary</td>
<td><span class="status delivered">Delivered</span></td>
</tr>

<tr>
<td>#ORD1024</td>
<td>Brian</td>
<td><span class="status processing">Processing</span></td>
</tr>

<tr>
<td>#ORD1023</td>
<td>Kevin</td>
<td><span class="status shipped">Shipped</span></td>
</tr>

</table>

</div>

<!-- PRODUCTS -->

<div class="box">

<h2>Top Products</h2>

<div class="product-item">

<div class="product-left">

<img src="https://images.unsplash.com/photo-1563636619-e9143da7973b?q=80&w=1200&auto=format&fit=crop">

<div>
<h4>Fresh Milk</h4>
<p>KES 100</p>
</div>

</div>

</div>

<div class="product-item">

<div class="product-left">

<img src="https://images.unsplash.com/photo-1607623814075-e51df1bdc82f?q=80&w=1200&auto=format&fit=crop">

<div>
<h4>Mangoes</h4>
<p>KES 300</p>
</div>

</div>

</div>

</div>

<!-- REVIEWS -->

<div class="box">

<h2>Customer Reviews</h2>

<div class="review">

<img src="https://randomuser.me/api/portraits/women/44.jpg">

<div>
<h4>Mary</h4>

<div class="stars">★★★★★</div>

<p>Excellent products and fast delivery.</p>

</div>

</div>

<div class="review">

<img src="https://randomuser.me/api/portraits/men/45.jpg">

<div>
<h4>Brian</h4>

<div class="stars">★★★★★</div>

<p>Best organic products in Kenya.</p>

</div>

</div>

</div>

</div>

<!-- SETTINGS -->

<div class="settings-panel">

<h2>Dashboard Settings</h2>

<div class="setting-item">

<div>
<h4>Dark Mode</h4>
<p>Enable dark appearance</p>
</div>

<label class="switch">
<input type="checkbox" id="darkToggle">
<span class="slider"></span>
</label>

</div>

<div class="setting-item">

<div>
<h4>Order Notifications</h4>
<p>Receive order alerts</p>
</div>

<label class="switch">
<input type="checkbox" checked>
<span class="slider"></span>
</label>

</div>

<div class="setting-item">

<div>
<h4>Email Notifications</h4>
<p>Receive customer messages</p>
</div>

<label class="switch">
<input type="checkbox" checked>
<span class="slider"></span>
</label>

</div>

</div>

</div>

<!-- SCRIPT -->

<script>

/* SALES CHART */

new Chart(document.getElementById('salesChart'),{
type:'line',

data:{
labels:['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],

datasets:[{
label:'Sales',
data:[12000,19000,15000,28000,24000,35000,42000],
borderColor:'#16a34a',
backgroundColor:'rgba(34,197,94,0.2)',
fill:true,
tension:0.4
}]
}

});

/* PAYMENT CHART */

new Chart(document.getElementById('paymentChart'),{
type:'doughnut',

data:{
labels:['M-Pesa','PayPal','Apple Pay','MTN'],

datasets:[{
data:[45,20,20,15],

backgroundColor:[
'#16a34a',
'#2563eb',
'#9233ea36',
'#f59e0b'
]
}]
}

});

/* DARK MODE */

const darkToggle = document.getElementById("darkToggle");

darkToggle.addEventListener("change", () => {
document.body.classList.toggle("dark-mode");
});

/* NOTIFICATIONS */

const bellBtn = document.getElementById("bellBtn");
const notificationBox = document.getElementById("notificationBox");

bellBtn.addEventListener("click", () => {
notificationBox.classList.toggle("active");
});

/* MESSAGES */

const mailBtn = document.getElementById("mailBtn");
const messageBox = document.getElementById("messageBox");

mailBtn.addEventListener("click", () => {
messageBox.classList.toggle("active");
});

</script>

</body>
</html>