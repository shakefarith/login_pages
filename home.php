 
<html>
    <head>
        <title>home page</title>
        <div style="width:150px;margin:auto;height:500px;margin-top:300px">
</head>
<body>
<h1> welcome <?php 
session_start();
echo $_SESSION['USERNAME']; ?></h1>
<div style="width:150px;margin:auto;height:500px;margin-top:300px">
<a href="login.html"><h1>logout</h2></a>
</div>
</div>
</body>
</html>

