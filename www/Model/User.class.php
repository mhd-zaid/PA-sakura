<?php

namespace App\Model;

use App\Core\DatabaseDriver;
use App\Core\SendMail;
use App\Core\Jwt;

class User extends DatabaseDriver
{
	private $id = null;
	protected $firstname;
	protected $lastname;
	protected $email;
    protected $password;
	protected $status = 0;
    protected $token = null;
    protected $role = 1;
	private $date_created;
	private $date_updated;


	public function __construct()
	{
		parent::__construct();
	}


    /**
     * @return null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param null $id
     */
    //abstract public function setId($id);
    public function setId(Int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname(String $firstname): void
    {
        $this->firstname = ucwords(mb_strtolower(trim($firstname)));
    }

     /**
     * @return mixed
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname(String $lastname): void
    {
        $this->lastname = mb_strtoupper(trim($lastname));
    }

    /**
     * @return mixed
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail(String $email): void
    {
        $this->email = mb_strtolower(trim($email));
    }

    /**
     * @return mixed
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword(String $password): void
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);

    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getRole(): int
    {
        return $this->role;
    }

    /**
     * @param int $role
     */
    public function setRole(int $role): void
    {
        $this->role = $role;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param int $token
     */
    public function setToken(string $token = null): void
    {
        $this->token = $token;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->date_created;
    }

    /**
     * @return mixed
     */
    public function getDateUpdated()
    {
        return $this->date_updated;
    }

    public function registerForm(){

        return [
                "config" => [
                                "method"=>"POST",
                                "class"=>"form-register",
                                "submit"=>"S'inscrire"
                            ],
                "inputs"=> [
                    "firstname"=>[
                                    "type"=>"text",
                                    "label"=>"Prénom",
                                    "class"=>"ipt-form-entry",
                                    "min"=>2,
                                    "max"=>25,
                                    "required"=>true,
                                    "error"=>"Votre prénom doit faire entre 2 et 25 caractères"
                                ],

                    "lastname"=>[
                                    "type"=>"text",
                                    "label"=>"Nom",
                                    "class"=>"ipt-form-entry",
                                    "min"=>2,
                                    "max"=>75,
                                    "required"=>true,
                                    "error"=>"Votre nom doit faire entre 2 et 75 caractères"
                                ],
                    "email"=>[
                                    "type"=>"email",
                                    "label"=>"Email",
                                    "class"=>"ipt-form-entry",
                                    "required"=>true,
                                    "error"=>"Votre email est incorrect"
                                ],
                    "password"=>[
                                    "type"=>"password",
                                    "label"=>"Votre mot de passe",
                                    "class"=>"ipt-form-entry",
                                    "required"=>true,
                                    "error"=>"Votre mot de passe doit faire plus de 8 caractères avec une minuscule une majuscule et un chiffre"
                                ],
                    "passwordconfirm"=>[
                                    "type"=>"password",
                                    "label"=>"Confirmation",
                                    "class"=>"ipt-form-entry",
                                    "required"=>true,
                                    "confirm"=>"password",
                                    "error"=>"Votre mot de passe de confirmation ne correspond pas"
                                ],

                ]
            ];

    }
    
    
    public function userRegisterForm(){
        
        return [
                "config" => [
                                "method"=>"POST",
                                "class"=>"form-register",
                                "submit"=>"Ajouter l'utilisateur"
                            ],
                "inputs"=> [
                    "firstname"=>[
                                    "type"=>"text",
                                    "label"=>"Prénom",
                                    "class"=>"ipt-form-entry",
                                    "min"=>2,
                                    "max"=>25,
                                    "required"=>true,
                                    "error"=>"Le prénom doit faire entre 2 et 25 caractères"
                                ],

                    "lastname"=>[
                                    "type"=>"text",
                                    "label"=>"Nom",
                                    "class"=>"ipt-form-entry",
                                    "min"=>2,
                                    "max"=>75,
                                    "required"=>true,
                                    "error"=>"Le nom doit faire entre 2 et 75 caractères"
                                ],

                    "email"=>[
                        "type"=>"email",
                        "label"=>"Email",
                        "class"=>"ipt-form-entry",
                        "required"=>true,
                        "error"=>"L'email est incorrect"
                                ],

                    "password"=>[
                                    "type"=>"password",
                                    "label"=>"Votre mot de passe",
                                    "class"=>"ipt-form-entry",
                                    "required"=>true,
                                    "error"=>"Le mot de passe doit faire plus de 8 caractères avec une minuscule une majuscule et un chiffre"
                                ],
                                
                    "passwordconfirm"=>[
                                    "type"=>"password",
                                    "label"=>"Confirmation",
                                    "class"=>"ipt-form-entry",
                                    "required"=>true,
                                    "confirm"=>"password",
                                    "error"=>"Votre Le de passe de confirmation ne correspond pas"
                                ],

                    "administrateur"=>[
                                    "type"=>"radio",
                                    "label"=>"Administrateur",
                                    "class"=>"ipt-form-entry",
                                    "value"=>"1",
                                    "elemName"=>"userRole"
                                ],

                    "editeur"=>[
                                    "type"=>"radio",
                                    "label"=>"Editeur",
                                    "class"=>"ipt-form-entry",
                                    "value"=>"2",
                                    "elemName"=>"userRole"
                                ],
                                
                    "lecteur"=>[
                                    "type"=>"radio",
                                    "label"=>"Lecteur",
                                    "class"=>"ipt-form-entry",
                                    "value"=>"3",
                                    "elemName"=>"userRole"
                                ],

                    "note"=>[
                                    "type"=>"text",
                                    "label"=>"Note (facultatif)",
                                    "class"=>"ipt-form-entry",
                                ],

                    "message"=>[
                                    "type"=>"text",
                                    "label"=>"Message d'invitation (facultatif)",
                                    "class"=>"ipt-form-entry",
                                ],

                ]
            ];

    }
    
    public function userUpdateForm(){

        return [
                "config" => [
                                "method"=>"POST",
                                "class"=>"form-register",
                                "submit"=>"Modifier"
                            ],
                "user"=>$this->getUser($_GET['id']),
                            
                "inputs"=> [
                    "firstname"=>[
                                    "type"=>"text",
                                    "label"=>"Prénom",
                                    "class"=>"ipt-form-entry",
                                    "min"=>2,
                                    "max"=>25,
                                    "required"=>true,
                                    "error"=>"Le prénom doit faire entre 2 et 25 caractères",
                                    "value"=>$this->firstname
                                ],

                    "lastname"=>[
                                    "type"=>"text",
                                    "label"=>"Nom",
                                    "class"=>"ipt-form-entry",
                                    "min"=>2,
                                    "max"=>75,
                                    "required"=>true,
                                    "error"=>"Le nom doit faire entre 2 et 75 caractères"
                                ],

                    "email"=>[
                        "type"=>"email",
                        "label"=>"Email",
                        "class"=>"ipt-form-entry",
                        "required"=>true,
                        "error"=>"L'email est incorrect"
                                ],

                    "password"=>[
                                    "type"=>"password",
                                    "label"=>"Votre mot de passe",
                                    "class"=>"ipt-form-entry",
                                    "required"=>true,
                                    "error"=>"Le mot de passe doit faire plus de 8 caractères avec une minuscule une majuscule et un chiffre"
                                ],
                                
                    "passwordconfirm"=>[
                                    "type"=>"password",
                                    "label"=>"Confirmation",
                                    "class"=>"ipt-form-entry",
                                    "required"=>true,
                                    "confirm"=>"password",
                                    "error"=>"Votre Le de passe de confirmation ne correspond pas"
                                ],

                    "administrateur"=>[
                                    "type"=>"radio",
                                    "label"=>"Administrateur",
                                    "class"=>"ipt-form-entry",
                                    "value"=>"1",
                                    "elemName"=>"userRole"
                                ],

                    "editeur"=>[
                                    "type"=>"radio",
                                    "label"=>"Editeur",
                                    "class"=>"ipt-form-entry",
                                    "value"=>"2",
                                    "elemName"=>"userRole"
                                ],
                                
                    "lecteur"=>[
                                    "type"=>"radio",
                                    "label"=>"Lecteur",
                                    "class"=>"ipt-form-entry",
                                    "value"=>"3",
                                    "elemName"=>"userRole"
                                ],

                    "note"=>[
                                    "type"=>"text",
                                    "label"=>"Note (facultatif)",
                                    "class"=>"ipt-form-entry",
                                ],

                    "message"=>[
                                    "type"=>"text",
                                    "label"=>"Message d'invitation (facultatif)",
                                    "class"=>"ipt-form-entry",
                                ],

                ]
            ];

    }

    public function loginForm(){

        return [
                "config" => [
                                "method"=>"POST",
                                "class"=>"form-register",
                                "submit"=>"Se connecter"
                            ],
                "inputs"=> [
                    "email"=>[
                                    "type"=>"email",
                                    "label"=>"Adresse e-mail",
                                    "class"=>"ipt-form-entry",
                                    "required"=>true,
                                    "error"=>"Votre email ou mot de passe est incorrect"
                                ],
                    "password"=>[
                                    "type"=>"password",
                                    "label"=>"Mot de passe",
                                    "class"=>"ipt-form-entry",
                                    "required"=>true,
                                    "error"=>"Votre email ou mot de passe est incorrect"
                                ],
                ]
            ];

    }

    public function contactForm(){

        return [
                "config" => [
                                "method"=>"POST",
                                "class"=>"form-register",
                                "submit"=>"Envoyer"
                            ],
                "inputs"=> [
                    "name"=>[
                                    "type"=>"text",
                                    "label"=>"Votre nom (obligatoire)",
                                    "class"=>"ipt-form-entry",
                                    "required"=>true,
                                    "error"=>"Votre email ou mot de passe est incorrect"
                                ],
                    "email"=>[
                                    "type"=>"email",
                                    "label"=>"Votre e-mail (obligatoire)",
                                    "class"=>"ipt-form-entry",
                                    "required"=>true,
                                ],
                    "message"=>[
                                    "type"=>"textarea",
                                    "label"=>"Message",
                                    "class"=>"ipt-form-entry",
                                    "required"=>true,
                                ],
                ]
            ];

    }
    public function forgotPasswdForm(){

        return [
                "config" => [
                                "method"=>"POST",
                                "class"=>"form-forgot-passwd",
                                "submit"=>"Continuer"
                            ],
                "inputs"=> [
                    "email"=>[
                                    "type"=>"email",
                                    "label"=>"Adresse e-mail",
                                    "class"=>"ipt-form-entry",
                                    "required"=>true,
                                    "error"=>"Votre email ou mot de passe est incorrect"
                                ],
                ]
            ];

    }
    public function resetPasswdForm(){

        return [
                "config" => [
                                "method"=>"POST",
                                "class"=>"form-reset-passwd",
                                "submit"=>"Continuer"
                            ],
                "inputs"=> [
                    "password"=>[
                        "type"=>"password",
                        "label"=>"Votre mot de passe",
                        "class"=>"ipt-form-entry",
                        "required"=>true,
                        "error"=>"Votre mot de passe doit faire plus de 8 caractères avec une minuscule une majuscule et un chiffre"
                    ],
                    "passwordconfirm"=>[
                        "type"=>"password",
                        "label"=>"Confirmation",
                        "class"=>"ipt-form-entry",
                        "required"=>true,
                        "confirm"=>"password",
                        "error"=>"Votre mot de passe de confirmation ne correspond pas"
                    ],
                ]
            ];

    }

    public function checkLogin(String $email, String $pwd): void
    {
        $sql = "SELECT * FROM $this->table WHERE email = '$email'";
        $result = $this->pdo->query($sql);
        if($result->rowCount() > 0){
            $data = $result->fetch();
            if(password_verify($pwd,$data['Password'])){
                session_start();
                $_SESSION['email'] = $data['Email'];
                $_SESSION['firstname'] = $data['Firstname'];
                $_SESSION['lastname'] = $data['Lastname'];
                $_SESSION['status'] = $data['Status'];
                $token = new Jwt([$data['Firstname'],$data['Lastname'],$data['Email']]);
                $this->setId($data['Id']);
                $this->setFirstname($data['Firstname']);
                $this->setLastname($data['Lastname']);
                $this->setEmail($data['Email']);
                $this->setStatus($data['Status']);
                $this->password = $data['Password'];
                $this->setToken($token->getToken());
                $token = $this->getToken();
                if($data['Status'] == 0){
                    $servername = $_SERVER['HTTP_HOST'];
                    new sendMail($_POST['email'],"VERIFICATION EMAIL","<a href='http://$servername/confirmation-mail?verify_key=$token&email=$email'>Verify email</a>","Compte pas verifie, un email vous à été envoyer","Une erreur s'est produite merci de réesayer plus tard");
                }else{
                    setcookie("JWT",$token,time()+(60*60*2));
                    setcookie("Email",$data['Email'],time()+(60*60*2));
                    $this->save();
                    header("Location: /tableau-de-bord");
                    die();
                }
            }else{
                print_r("Mot de passe ou email incorrect");
            }
        }else{
            print_r('Mot de passe ou email incorrect');
        }
    }

    public function checkForgotPasswd(string $email): ?string{
        $sql = "SELECT * FROM $this->table WHERE email = '$email'";
        $result = $this->pdo->query($sql);
        if($result->rowCount() > 0){
            $data = $result->fetch();
            $header = base64_encode(json_encode(array("alg"=>"HS256","typ"=>"JWT")));
            $playload = base64_encode(json_encode(array_diff($data,[$data['Password']],[$data['Token']])));
            $secret = base64_encode('Za1234');
            $signature = hash_hmac('sha256',$header.".".$playload,$secret);
            $token = $header.".".$playload.".".$signature;
            setcookie("JWT",$token,time()+(60*5));
            $this->setId($data['Id']);
            $this->setFirstname($data['Firstname']);
            $this->setLastname($data['Lastname']);
            $this->setEmail($data['Email']);
            $this->setStatus($data['Status']);
            $this->password = $data['Password'];
            $this->setToken($token);
            $this->save();
                return $this->getToken();
        }else{
            return null;
        }
    }

    public function checkTokenPasswd(string $email,string $token,string $password): bool
    {
        $email = str_replace('%40','@',$email);
        $sql = "SELECT * FROM $this->table WHERE email = '$email' AND token = '$token'";
        $result = $this->pdo->query($sql);
        if($result->rowCount() > 0 ){
            $data = $result->fetch();
            $this->setId($data['Id']);
            $this->setFirstname($data['Firstname']);
            $this->setLastname($data['Lastname']);
            $this->setEmail($data['Email']);
            $this->setStatus($data['Status']);
            $this->setPassword($password);
            $this->setToken($token);
            $this->save();
            return true;
        }else{
            return false;
        }
    }

    public function checkToken(string $token,string $email):string
    {
        $sql = "SELECT Token FROM $this->table where token='$token' AND email= '$email'";
        $result = $this->pdo->query($sql);
        $data = $result->fetch();
        if($result->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function checkTokenEmail(string $token,string $email):void
    {
        $sql = "SELECT Token FROM $this->table where status=0 AND email= '$email'";
        $result = $this->pdo->query($sql);
        $data = $result->fetch();
        
        if($result->rowCount() > 0 && $data['Token']==$token){
            $sql_update = "UPDATE $this->table SET status=1 where email='$email'";
            $this->pdo->query($sql_update);
        } else{
            echo "Le compte n'existe pas ou est déjà validé";
            die();
        }
    }

    public function checkEmailExist($email):Int
    {
        $sql = "SELECT * FROM $this->table where Email='$email'";
        $result = $this->pdo->query($sql);
        if($result->rowCount() > 0){
            print_r("Cet email est déjà associé à un compte");

            return 0;
        }else{
            return 1;
        }
    }
    
    public function getUser($id){
        $sql = "SELECT * FROM ".$this->table." WHERE id =".$id;
        $result = $this->pdo->query($sql);
        $data = $result->fetch();
        return $data;
    }

}