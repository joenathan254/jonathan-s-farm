<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Visit Jonathan's Farm</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Poppins,sans-serif;
}

body{

background:#f4f7f4;

}

.container{

width:700px;
margin:40px auto;
background:white;
padding:40px;
border-radius:15px;
box-shadow:0 5px 15px rgba(0,0,0,.2);

}

h1{

text-align:center;
color:#065f46;
margin-bottom:20px;

}

input,
select,
textarea{

width:100%;
padding:14px;
margin:12px 0;
border:1px solid #ccc;
border-radius:10px;
font-size:16px;

}

button{

width:100%;
padding:15px;
background:#16a34a;
color:white;
border:none;
border-radius:10px;
font-size:18px;
cursor:pointer;

}

button:hover{

background:#065f46;

}

</style>

</head>

<body>

<div class="container">

<h1>Book a Farm Visit</h1>

<form action="save_visit.php" method="POST">

<input type="text" name="fullname" placeholder="Full Name" required>

<input type="text" name="phone" placeholder="Phone Number" required>

<input type="email" name="email" placeholder="Email">

<input type="number" name="visitors" placeholder="Number of Visitors" required>

<label>Preferred Visit Date</label>

<input type="date" name="visit_date" required>

<label>Preferred Time</label>

<input type="time" name="visit_time" required>

<select name="purpose" required>

<option value="">Purpose of Visit</option>

<option>Educational Tour</option>

<option>Farm Tour</option>

<option>Training</option>

<option>Research</option>

<option>Family Visit</option>

</select>

<textarea name="notes" rows="5" placeholder="Additional Notes"></textarea>

<button type="submit">

Book Visit

</button>

</form>

</div>

</body>

</html>