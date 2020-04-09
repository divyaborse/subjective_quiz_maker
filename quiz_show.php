<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <style>
        a:hover {
            color: #fff;
        }

        .body {
            overflow-x: hidden !important;
            min-width: 200px !important;
        }

        @media (max-width:500px) {
            .add_quiz {
                font-size: 1.4rem;
                /* padding-left:1.5rem; */
            }
        }
    </style>
</head>
<body>
<div class="p-3 body">
    <h3 style="width: 100%;height: 60px; background: #27293d !important; position: relative; color: white;" class="add_quiz p-4">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <b> Add Quiz</b>
    </h3>

    <div class="card border-info p-3 m-2 mb-3  main " style="background: #D0ECE7">
        <h5 class="p-2">Create Quiz</h5>
        <form action="addsubquiz/quizset" method="POST" class="form-inline p-2">
            <div class="input-group col-md-2 m-2">
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Quiz Title" aria-describedby="Enter Quiz Title" required>
            </div>
            <div class="input-group col-md-2 m-2">
                <select id="class" name="class[]" required class="form-control">
                    <option selected disabled value="">Select a Class</option>

                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
            </div>
            <div class="input-group col-md-2 m-2">
                <select id="sub" name="sub[]" class="form-control" required name="subject">
                    
                     <option value="English">English</option>
                    <option value="Maths">Maths</option>
                    
                </select>
            </div>

            <div class="input-group col-md-2 m-2">
                <select id="chapter" class="form-control" required name="chapter[]">
                    <option selected disabled value="">Chapter Number</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                </select>
            </div><br>

            <div class="" style=" display:flex;flex-wrap:wrap;">
                <button type="submit" class="btn bg-success m-2" style="font-weight:bold;color:white;" name="submit">Submit</button>
                <a href="<?php echo base_url(); ?>teacher/remove_session" class="btn  float-right bg-danger m-2" style="color:white;"><b> Back </b></a>
            </div>
        </form>
</div>
          
    
                   
 <!-- Custom Modal -->
    <div class="modal fade " id="customQuestionModal" tabindex="-1" role="dialog" aria-labelledby="customQuestionModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="customQuestionModalTitle">To Add Custom Question</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="ajax-contact" action="<?= base_url('addsubquiz/display_questions') ?>" method="POST">
                    <div class="modal-body">
                        <label for="quizQuestion"> Question:</label>
                        <textarea class="form-control" id="quizQuestion" name="question" placeholder="Enter your question here!!" required aria-required="Eveter the Question" rows="3"></textarea>
                        
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary btn-lg" type="submit" name="submit">Save Question</button>

                        <a type="button" href=" " style="text-decoration: none;" class="btn btn-lg btn-outline-danger float-right" aria-label="Close">
                            <b>Finish Adding</b>

                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

 <div class="container">
  <form  action="<?= base_url('addsubquiz/view_q') ?> " 
        method= "post">
  <?php
  if(isset($data)){
    foreach($data->result() as $row)
      echo '<div class="ard-body border bg-white shadow m-2">
                            <div class="custom-control custom-checkbox 
                            align-middle m-4">
      <input type="checkbox"  name ="ques[]" value='.$row->question.'><b>'.$row->question.'</b><br><br>
    </div></div>';
    
  }
  ?>
  
  <div class="card-footer my-2 bg-white p-0 col-md-8 offset-md-2">
                        <button class="btn shadow btn-lg btn-block btn-outline-success" name="submit">
                            <h3><b>Create Quiz</b></h3>
                        </button>
                    </div>
</form>
</div>
</body>
</html>
