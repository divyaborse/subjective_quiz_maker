<?php

class Teacher_ques extends CI_Controller{
	 function __construct() {
        parent::__construct();
        $this->load->model('Model_final_quiz'); 
    }
	public function index(){
		$this->load->model('Model_final_quiz');
		$result['result'] = $this->Model_final_quiz->teacher_questions();
		$this->load->view('Teacher_view',$result);
	}
	public function store_score(){
		if(isset($_POST['submit'])){
			$score = $_POST['score'];
			$q_id = $this->input->post("hidden_id");
			$this->load->model('Model_final_quiz');
			$this->Model_final_quiz->save_score($q_id,$score);
			echo "Score saved";
		}
	}
	
}


?>