
<?php
/*
 * Model for the users
 */

class UserModel {

    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;

    public function __construct() {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
    }

    public static function getUserModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new UserModel();
        }
        return self::$_instance;
    }

    // get all the users from the DB
    public function getUsers() {
        //query string that retrieves the entire table
        $sql = "SELECT * FROM " . $this->db->getUser();

        //execute the query
        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {
            //array to store all guests
            $guests = array();

            //loop through all rows
            while ($result_row = $query->fetch_assoc()) {
                $guest = new User($result_row["id"], $result_row["first_name"], $result_row["last_name"], $result_row["username"], $result_row["password"], $result_row["role"]);
                $guests[] = $guest;
            }
            return $guests;
        }
        return false;
    }
    

    //add a user into the "user" table in the database
    public function registerUser(User $user) {
             //if the script did not received post data, display an error message and then terminite the script immediately
         if (!filter_has_var(INPUT_POST, 'first_name') ||
                !filter_has_var(INPUT_POST, 'last_name') || 
                   !filter_has_var(INPUT_POST, 'username') || 
                   !filter_has_var(INPUT_POST, 'password')){

            return false;
        }
        
          try {

            if ($first_name == "" ||$last_name=="" ||$username=="" || $password=="") {
                throw new DataMissingException("Please Enter a valid input");
            }

       
        //retrieve data for the new movie; data are sanitized and escaped for security.
        $first_name = $this->dbConnection-> real_escape_string(trim(filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING)));
        $last_name = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_NUMBER_INT)));
        $username = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING)));
        $password = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING)));
        
//        //construct an INSERT query(
//        $id = $user->getId();
//        $first_name = $user->getFirstName();
//        $last_name = $user->getLastName();
//        $username = $user->getUsername();
//        $password = $user->getPassword();
//        $role = $user->getRole();

        //query to insert new users into DB
        $sql = "INSERT INTO " . $this->db->getUserTable() . " VALUES(NULL, '$first_name', '$last_name', '$username', '$password')";
 } catch (DataMissingException $e) {
            $message = $e->getMessage();
            $guesterro = new PodcastError();
            $guesterro->display($message);
            exit();
        }
          try{
       $query = $this->dbConnection->query($sql);
       if(!$query){
           $errmsg = $this->dbConnection->error;
           throw new DatabaseException($errmsg);
       }
       return $query;
   }
   catch(DatabaseException $e){
       $error = new LoginError();
       $error->display($e->getMessage());
       return false;
   }
   catch(Exception $e){
       $error = new LoginError();
       $error->display("An unexpected error has occurred.");
       return false;
   }
    }

//looks for users credentials
    public function userLogin() {
        
     //start session if it has not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//create variable login status.
$_SESSION['login_status'] = 2;
$username = $passcode = "";
 try {

            if ($username=="" || $password=="") {
                throw new DataMissingException("Please Enter a valid input");
            }
//retrieve user name and password from login form
if (filter_has_var(INPUT_POST, 'username') || filter_has_var(INPUT_POST, 'password')) {
    $username =  $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING)));
    $password =  $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING)));
}
  } catch (DataMissingException $e) {
            $message = $e->getMessage();
            $guesterro = new PodcastError();
            $guesterro->display($message);
            exit();
        }
//validate user name and password in database tabel 'users'. If they valid, create session variables.
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

 $query = $this->dbConnection->query($sql);
if($query->num_rows){
    //it is a valid user. Need to store the user in session variales.
    $row = $query->fetch_assoc();
    $_SESSION['login'] = $username;
    $_SESSION['role'] = $row['role'];
    $_SESSION['name'] = $row['firstname'] . " " . $row['lastname'];
    $_SESSION['login_status'] = 1;
}

          return $this->dbConnection->query($sql);
        
    }
        public function addDefault(Login $user){
      $first_name = $user->getFirstName();
  }
         
        
    
    
    

}
