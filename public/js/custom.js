function getCSRFToken(){
		$token = $('meta[name="csrf-token"]').attr('content');
		console.log($token);
		return $token;
}

function runQuery(){
    let query = document.getElementById("search-question").value;;
    if(query != ''){
      searchQuestion(query);
    }
}

	

  function searchQuestion(query){
		$.ajax({
				type: "GET",
				url: '/search-question/'+query,
				dataType: 'json',
				beforeSend: function(){
			    	$html = loadingCardHtml();
					$("#search-record").html($html);
			    },
				success: function(data){
					$html = searchQuestionHtml(data);
					$("#aws-desc").html('');
					$("#search-record").html($html);
				},
				error: function(){
					
				},
          cache: false,
          contentType: false,
          processData: false
			});
}

function loadingCardHtml(){
		$result = "";
		for (let i = 0; i < 4; i++) {
			$result += '<div class="col-lg-12 col-md-12"><div class="question-box"></div></div>';
		}
		return $result;
}

function searchQuestionHtml(data){
		$result = "";
		for (let i = 0; i < data.length; i++) {
			var num = i+1;
		$result +='<div class="col-md-12"><div class="question-box"><div class="question-title"><span class="Qu">Q.'+num+'</span> '+data[i].question+'</div><div class="answer-options-section">';
		if(data[i].ans_type == "option"){
			$result +='<div class="answer-options">';
			if(data[i].A){
				$result +='<span class="options-ans-left"><div class="form-check-inline"><label class="form-check-label radio-btn-design" for="checkA_'+data[i].id+'"><input type="radio" class="form-check-input" id="checkA_'+data[i].id+'" name="" value="A">'+data[i].A+'<span class="checkmark"></span></label></div></span>';
			}
			if(data[i].B){
				$result +='<span class="options-ans-right"><div class="form-check-inline"><label class="form-check-label radio-btn-design" for="checkB_'+data[i].id+'"><input type="radio" class="form-check-input" id="checkB_'+data[i].id+'" name="question_'+data[i].id+'" value="B">'+data[i].B+'<span class="checkmark"></span></label></div></span>';
			}
			$result +='</div><div class="answer-options p-t-10">';
			if(data[i].C){
				$result +='<span class="options-ans-left"><div class="form-check-inline"><label class="form-check-label radio-btn-design" for="checkC_'+data[i].id+'"><input type="radio" class="form-check-input" id="checkC_'+data[i].id+'" name="question_'+data[i].id+'" value="C">'+data[i].C+'<span class="checkmark"></span></label></div></span>';
			}
			if(data[i].D){
				$result +='<span class="options-ans-right"><div class="form-check-inline"><label class="form-check-label radio-btn-design" for="checkD_'+data[i].id+'"><input type="radio" class="form-check-input" id="checkD_'+data[i].id+'" name="question_'+data[i].id+'" value="D">'+data[i].D+'<span class="checkmark"></span></label></div></span>';
			}
			$result +='</div><div class="show-answer m-t-20"><span class="ans">Ans.</span> '+data[i].answer+'</div>';
		}
		if(data[i].ans_type == "choice"){
			$result +='<div class="form-check">';

			if(data[i].checkbox_1){
			 	$result +='<div class="checkbox"><label for="checkbox1" class="form-check-label checkbox-btn-design"><input type="checkbox" id="checkbox1" name="checkbox1" value="'+data[i].checkbox_1+'" class="form-check-input"> '+data[i].checkbox_1+'<span class="checkbox-checkmark"></span></label></div>';
			}
			if(data[i].checkbox_2){
				$result +='<div class="checkbox"><label for="checkbox2" class="form-check-label checkbox-btn-design"><input type="checkbox" id="checkbox2" name="checkbox2" value="'+data[i].checkbox_2+'" class="form-check-input"> '+data[i].checkbox_2+'<span class="checkbox-checkmark"></span></label></div>';
			}
			if(data[i].checkbox_3){
				$result +='<div class="checkbox"><label for="checkbox3" class="form-check-label checkbox-btn-design"><input type="checkbox" id="checkbox3" name="checkbox3" value="'+data[i].checkbox_3+'" class="form-check-input"> '+data[i].checkbox_3+'<span class="checkbox-checkmark"></span></label></div>';
			}
			if(data[i].checkbox_4){
				$result +='<div class="checkbox"><label for="checkbox4" class="form-check-label checkbox-btn-design"><input type="checkbox" id="checkbox4" name="checkbox4" value="'+data[i].checkbox_4+'" class="form-check-input"> '+data[i].checkbox_4+'<span class="checkbox-checkmark"></span></label></div>';
			}
			if(data[i].checkbox_5){
				$result +='<div class="checkbox"><label for="checkbox5" class="form-check-label checkbox-btn-design"><input type="checkbox" id="checkbox5" name="checkbox5" value="'+data[i].checkbox_5+'" class="form-check-input"> '+data[i].checkbox_5+'<span class="checkbox-checkmark"></span></label></div>';
			}
			if(data[i].checkbox_6){
				$result +='<div class="checkbox"><label for="checkbox6" class="form-check-label checkbox-btn-design"><input type="checkbox" id="checkbox6" name="checkbox6" value="'+data[i].checkbox_6+'" class="form-check-input"> '+data[i].checkbox_6+'<span class="checkbox-checkmark"></span></label></div>';
			}

			$result +='<div class="show-answer m-t-20"><span class="ans">Ans.</span><br>'; 
			
			if(data[i].checkbox_ans_1){
			 $result +=''+data[i].checkbox_ans_1+'<br>'; 
			}
			if(data[i].checkbox_ans_2){
			 $result +=''+data[i].checkbox_ans_2+'<br>';
			 }
			if(data[i].checkbox_ans_3){
			 $result +=''+data[i].checkbox_ans_3+'<br>';
			 }
			if(data[i].checkbox_ans_4){
			 $result +=''+data[i].checkbox_ans_4+'<br>';
			 }
			if(data[i].checkbox_ans_5){
			 $result +=''+data[i].checkbox_ans_5+'<br>'; 
			}
			if(data[i].checkbox_ans_6){
			 $result +=''+data[i].checkbox_ans_6+''; 
			}

			$result +='</div></div>';

		}
		if(data[i].ans_type == "true_false"){
			$result +='<div class="answer-options"><label class="form-check-label radio-btn-design" for="checkTrue_'+data[i].id+'"><input type="radio" class="form-check-input" id="checkTrue_'+data[i].id+'" name="question_'+data[i].id+'" value="1">  True<span class="checkmark"></span></label><br><label class="form-check-label radio-btn-design" for="checkFalse_'+data[i].id+'"><input type="radio" class="form-check-input" id="checkFalse_'+data[i].id+'" name="question_'+data[i].id+'" value="0">  False<span class="checkmark"></span></label><div class="show-answer m-t-20"><span class="ans">Ans.</span>';
			 if(data[i].true_false_answer){
			 	$result +=' True';
			 }else{
			 	$result +=' False';
			 } 
			 $result +='</div></div>';
		}
		if(data[i].ans_type == "write"){
			$result +='<div class="show-answer m-t-20"><span class="ans">Ans.</span> '+data[i].write_ans+'</div>'
		}
		$result +='</div></div></div>';

		  }

		  return $result;
}

