<?php 
if (isset($_COOKIE['authenticationCorrect']) && $_COOKIE['authenticationCorrect']=='true') {
echo "<center><h1>Below are fields for creating separately 1. a new user 2. a new user profile page</h1><hr>";
echo "<br><h2>Enter username and password for new account:</h2><br>";
echo "<form method='post' action='../addAccount.php' name='addAccountForm'>";
echo "Login:<input type='text' name='login'></textarea><br>";
echo "Password:<input type='password' name='password'></textarea><br>";
echo "<input type='submit' value='Submit new account'>";
echo "</form>";
echo "<br><br><hr><hr><br>";

echo "<h2>Please enter details for a new user profile page:</h2>";
	echo "<form method='post' action='../addUserProfilePage.php' id='newProfileForm' name='newProfileForm'>";
	echo "Type of user: <select name='typeOfUserField'>" ;
  echo "<option value='Faculty' >Faculty</option>";
  echo "<option value='PostDoc' >Post Doctoral Student</option>";
  echo "<option value='Phd' >PhD Student</option>";
  echo "<option value='Masters' >Masters Student</option>";
  echo "<option value='Graduates' >Graduated Student</option>";
  echo "</select><br><br>";
  echo "Name: <input type='text' name='UserName'></input><br><br>";
  echo "Position: <input type='text' name='Position'></input><br><br>";
  echo "Email: <input type='text' name='Email'></input><br><br>";
  echo "Phone: <input type='text' name='Phone'></input><br><br>";
  echo "Text description: <input type='text' name='TextDescription'></input><br>";
  echo "Photos can be added to users' text descriptions once the profile page is made.<br>";
  echo "Photos uploaded in the format FirstnameLastname.jpg are automatically added to users' profiles in new profiles.<br><br>";
  echo "<input type='Submit' value='Submit new profile page'>";
  echo "</form></center>";
exit;	
} 
else {
	echo "Correct username and password must be used to access this page";
}?>