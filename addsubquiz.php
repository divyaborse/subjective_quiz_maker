<?php
class addsubquiz extends CI_Controller{
	 function __construct() {
        parent::__construct();
        $this->load->model('Model_final_quiz'); //this will show "Print" word on browser. 
    }
	public function index(){
		$this->load->view('Add_sub_quiz');
	}
	public function quizset(){
		if(isset($_POST['submit'])){
			$title = $_POST['title'];
			foreach ($_POST['class'] as $select)
{
$class = $select; // Displaying Selected Value
} 
foreach ($_POST['sub'] as $select)
{
$subject = $select; // Displaying Selected Value
} 
foreach ($_POST['chapter'] as $select)
{
$chapter = $select; // Displaying Selected Value
} 
$this->load->model('Model_final_quiz');
$this->Model_final_quiz->store_data($title,$class,$subject,$chapter);
$query['query']=$this->Model_final_quiz->display_data();
$this->load->view('open_modal',$query);



		}
	}
	
	public function display_questions(){
		if(isset($_POST['submit'])){
			$this->load->model('Model_final_quiz');
			$question = $_POST['question'];
			/*$data_q = array(
				'question' => $question,
				'id' => $id
		
			);*/
		//	$show['show']=$this->Model_final_quiz->show_t();
		//$this->load->view('Add_subj_quiz',$show);
			$result = $this->Model_final_quiz->get_id();
			foreach($result->result() as $row){
				$id = $row->id;
			}
			$data_q = array(
				'question' => $question,
				'id' => $id
		
			);
			$this->Model_final_quiz->insert_data_quiz($data_q);
			$data['data']=$this->Model_final_quiz->show_ques();
		$this->load->view('quiz_show',$data);
		}
	}


public function view_q(){
		if(isset($_POST['submit'])){

    if(!empty($_POST['ques'])) {

        foreach($_POST['ques'] as $value){
           $data_display['data_display'] = $value;
           $this->load->model('Model_final_quiz');
           $output['output'] =$this->Model_final_quiz->store_q($data_display);
           $this->load->view('show_ques_title',$output);

        }


    }

}
	}


	public function show(){
		$this->load->model('Model_final_quiz');
	$data['data']=$this->Model_final_quiz->fetch_data($this->input->post("hidden_id"));
	$this->load->view('attempt_quiz',$data);
	}

	public function store_a(){
		if(isset($_POST['submit'])){
			$q_id = $this->input->post("hidden_id");
			$title = $_POST['hidden_title'];
			$question = $_POST['question'];
			$answer = $_POST['answer'];
			$this->load->model('Model_final_quiz');
			$this->Model_final_quiz->insert_fetch_q($q_id,$title
				,$question,$answer);
			$query['query'] =$this->Model_final_quiz->view_score($q_id);
			//$this->load->view('Score_dis',$query);

		}
	}
}

?>