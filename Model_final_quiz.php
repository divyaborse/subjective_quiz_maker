<?php
class Model_final_quiz extends CI_Model{
	function __construct() {
            parent::__construct();
        }
        public function store_data($title,$class,$subject,$chapter){
		$this->load->database('final_sub_quiz');
	$query="insert into quiz values('','$title','$class','$subject','$chapter')";
	$this->db->query($query);
	}

	public function display_data(){
		$this->load->database('final_sub_quiz');
		$query = $this->db->query("SELECT * FROM quiz ORDER BY id DESC LIMIT 1");
	
return $query;
	}

	public function show_t(){
		$this->load->database('final_sub_quiz');
		$query = $this->db->query("SELECT * FROM quiz ORDER BY id DESC LIMIT 1");
	
return $query;
	}
	public function get_id(){
		$this->load->database('final_sub_quiz');
		$query = $this->db->query("SELECT * FROM quiz ORDER BY id DESC LIMIT 1");
	
return $query;
	}
	public function insert_data_quiz($data_q){
		$this->load->database('final_sub_quiz');
		$this->db->insert('quiz_ques',$data_q);

		
	}
	public function show_ques(){
		$this->load->database('final_sub_quiz');
		
		$query = $this->db->get('quiz_ques');
		return $query;
	}
	public function store_q($data_display){
		$this->load->database('final_sub_quiz');
		$query = $this->db->query("SELECT id,title,class,subject FROM quiz ORDER BY id DESC LIMIT 1");
		foreach($query->result() as $row){
			$q_id = $row->id;
			$title = $row->title;
			$class = $row->class;
			$subject = $row->subject;
		}
		foreach($data_display as $row){
		$query="insert into final_quiz values('','$q_id','$row','$title','$class','subject')";
	$this->db->query($query);		
		}
		$this->db->where('q_id',$q_id);
		$output= $this->db->query("SELECT * FROM final_quiz ORDER BY id DESC LIMIT 1");
	//	display($output);
		return $output;

	}

	function fetch_data($id){
		$this->load->database('final_sub_quiz');
		
		$this->db->where("q_id",$id);
		$query = $this->db->get("final_quiz");
		return $query;
	}
	
	public function insert_fetch_q($q_id,$title,$question,$answer){
		$this->load->database('final_sub_quiz');
		$score = 0;
		$query="insert into fetch_q values('','$q_id','$title','$question','$answer','$score')";
	$this->db->query($query);	
	echo "quiz submitted";	
	}
	public function view_score($q_id){
		$this->load->database('final_sub_quiz');
		 $this->db->select_sum('score');

		$this->db->from('fetch_q');
		$this->db->where('q_id',$q_id);
		 $result = $this->db->get()->result();
		 //$score = $result->score;
		//$query="insert into history values('','$q_id','$score')";
	//$this->db->query($query); 
        return $result;
		
	
	}

	public function teacher_questions(){
		$this->load->database('final_sub_quiz');
		return $this->db->get('fetch_q');

	}
	public function save_score($q_id,$score){
		$this->load->database('final_sub_quiz');
		$data=['score' =>$score,];
		$this->db->where('q_id',$q_id);
		$this->db->update('fetch_q',$data);

	}
	
}


?>