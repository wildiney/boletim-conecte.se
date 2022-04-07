<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        if ($this->input->post()) {

            $this->form_validation->set_rules('senha', 'senha', 'trim|required|xss_clean');
            $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|xss_clean');

            $this->form_validation->set_message('required', 'O campo %s é de preenchimento obrigatório');
            $this->form_validation->set_message('valid_email', 'Insira um email válido');


            if ($this->form_validation->run() == TRUE) {

                $data['email'] = $this->input->post('email');
                $data['senha'] = $this->input->post('senha');

                $this->load->model('login_model');
                $resultado = $this->login_model->validar($data);

                if ($resultado) {
                    foreach ($resultado as $row) {
                        $data = array('id' => $row->id, 'usuario' => $row->nome, 'email' => $row->email, 'logged_in' => TRUE);
                    }
                    $this->session->set_userdata($data);
					
					if($this->session->userdata('redirurl')){
						redirect($this->session->userdata('redirurl'));
					} else {
						redirect('/articles','refresh');
					}
                }
            }
        }
        $this->load->view('header');
        $this->load->view('login');
        $this->load->view('footer');
    }
	
	public function apilogin(){
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, X-Auth-Token');
		header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");

		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata);
		
		if(isset($request->email) && isset($request->password)){
			$data['email'] = $request->email;
			$data['senha'] = $request->password;
			
			$this->load->model('login_model');
			$resultado = $this->login_model->validar($data);
			
			if ($resultado) {
				foreach ($resultado as $row) {
					$data = array('auth'=>'1', 'accessToken' => hash('sha256',$row->id), 'usuario' => $row->nome, 'email' => $row->email, 'logged_in' => TRUE);
				}
				$this->session->set_userdata($data);
				
				header('Content-Type: application/json');
				echo json_encode( $data );	
			} else {
				$arr=array(
					'auth'=>'0',
					'erro'=>'Erro'
				);
				header('Content-Type: application/json');
				echo json_encode( $data );	
			}	
		} else {
			$data=array(
					'auth'=>'0',
					'erro'=>'Erro'
				);
				header('Content-Type: application/json');
				echo json_encode( $data );	
		}
	}

    public function recover() {
        $config['host']             = "mysql";
        $config['dbname']           = "transferto";
        $config['user']             = "";
        $config['pass']             = "";
        $config['rootdir']          = "http://slicedpixel.com/transferto";

        $config['emailHost']        = "";
        $config['emailDomain']      = '';
        $config['emailUsername']    = '';
        $config['emailSenha']       = '';
        $config['emailPorta']       = 465;

        $data="";

        if ($this->input->post()) {

            $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|xss_clean');

            $this->form_validation->set_message('required', 'O campo %s é de preenchimento obrigatório');
            $this->form_validation->set_message('valid_email', 'Insira um email válido');


            if ($this->form_validation->run() == TRUE) {

                $email = $this->input->post('email');

                $this->load->model('login_model');
                $resultado = $this->login_model->recover($email);

                if ($resultado) {
                    foreach ($resultado as $row) {
                        $nome = $row->nome;
                        $email = $row->email;
                        $senha = $row->senha;
                    }
                }

            $data['message'] = "<p><strong>Recuperação de senha</strong></p><p>Olá $nome!</p><p>Sua senha é: $senha</p>";
            $data['subject'] = "[CONECTE.SE] Recuperação de senha";

            $mail = new PHPMailer;
            //$mail->SMTPDebug = 3;                               // Enable verbose debug output

            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = $config['emailHost'];                   // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = $config['emailUsername'];           // SMTP username
            $mail->Password = $config['emailSenha'];              // SMTP password
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = $config['emailPorta'];                  // TCP port to connect to

            $mail->setFrom($config['emailDomain'], 'Conecte.se');
            
            //implementation of multiple address
            
            $mail->addAddress($email);     // Add a recipient
            
            
            // end implementation
            
            //$mail->addReplyTo($data['userEmail']);
            //$mail->addCC('cc@example.com');
            //$mail->addBCC($data['userEmail']);

            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            $mail->isHTML(true);                                  // Set email format to HTML

            $mail->Subject = $data['subject'];
            $mail->Body    = $data['message'];
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if(!$mail->send()) {
                echo 'email-error';
            } else {
                echo 'success';
            }



				

    
                $this->load->view('header');
                $this->load->view('recovered');
                $this->load->view('footer');
            }
        } else {
            $this->load->view('header');
            $this->load->view('recover');
            $this->load->view('footer');
        }
    }

}
