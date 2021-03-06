<?php
session_start();
?>

<!doctype html>
<html>
  <head>
  	<meta name="viewport" content="width=device-width">
  	<meta charset="UTF-8">
  	<link rel="stylesheet" type="text/css" href="../styles/reset.css">
    <link rel="stylesheet" type="text/css" href="../styles/mainstyle.css"">
    <link rel="stylesheet" type="text/css" href="../styles/calendar.css"">
    <title>Calendar</title>
  </head>
  	<body class="header--fixed">
    <header>
      <nav id="navbar">
        <ul>
          <li><a href="./index.php">Home</a></li>
          <li><a class="activepg" href=".calendar.php">Calendar</a></li>
          <li><a class="dropdown">Recipes</a>
            <ul class="dropdown--menu">
              <li><a class="link" href="./pancake.php">Pancakes</a></li>
              <li><a href="./meatballs.php">Meatballs</a></li>
            </ul>
          </li>
          <?php if(isset($_SESSION['id'])): ?>
            <li><a href="../../classes/Util/logout.php">Logout <?php echo($_SESSION['first'])?></a></li>
          <?php else: ?>
          <li><a class="login">SignUp/Login</a>
            <ul class="dropdown--menu">
              <li><form action="../../classes/signup.php" method="POST">
                    <p>SignUp</p>
                    <input type="text" name="first" placeholder="Firstname"><br>
                    <input type="text" name="last" placeholder="Lastname"><br>
                    <input type="text" name="uid" placeholder="Username"><br>
                    <input type="password" name="pwd" placeholder="Password"><br>
                    <button type="submit">SIGNUP</button>
                  </form>
                  <form action="../../classes/login.php" method="POST">
                  <p>Login</p>
                  <input type="text" name="uid" placeholder="Username"><br>
                  <input type="password" name="pwd" placeholder="Password"><br>
                  <button type="submit">LOGIN</button>
                  </form>
              </li>
            </ul>
          </li>
          <?php endif; ?>    
        </ul>
      </nav>
    </header>
    <article id="calendar">
	    <div class="month"> 
	  		<ul>
	    		<li class="prev">&#10094;</li>
	    		<li class="next">&#10095;</li>
	    		<li>
	      		August<br>
	      		2017
	    		</li>
	  		</ul>
		</div>
		<div class="calendar--wrapper">
			<ul class="weekdays">
	  		<li>Mo</li>
	  		<li>Tu</li>
	  		<li>We</li>
	  		<li>Th</li>
	  		<li>Fr</li>
	  		<li>Sa</li>
	  		<li>Su</li>
			</ul>

			<ul class="days"> 
	  	  <li>1</li>
	  	  <li>2</li>
		  	<li>3</li>
		  	<li>4</li>
		  	<li>5</li>
		  	<li>6</li>
		  	<li>7</li>
		  	<li>8</li>
		  	<li>9</li>
		  	<li><a id="picpancake" title="Pancake Day" class="background" href="pancake.php">10</a></li>
			  <li>11</li>
			  <li>12</li>
			  <li>13</li>
			  <li>14</li>
			  <li>15</li>
			  <li>16</li>
			  <li>17</li>
			  <li>18</li>
			  <li>19</li>
			  <li><a id="picmeat" title="Meatballs Day" class="background" href="meatballs.php">20</a></li>
			  <li>21</li>
			  <li>22</li>
			  <li>23</li>
			  <li>24</li>
			  <li>25</li>
			  <li>26</li>
			  <li>27</li>
			  <li>28</li>
			  <li>29</li>
			  <li>30</li>
			  <li>31</li>
	  	</ul>
	  </div>
	 </article>
  </body>
</html>
