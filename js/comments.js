$(document).ready(function(){

	var art_id = $("#art_id").val();

	$.post("http://localhost/pinasikat/has_commented",
		{
			'art_id': art_id
		},
		function(data){
			//alert(data);
			if(Number(data) == 1){
				$("#comment-field").hide();
			}else{
				$("#comment-field").show();
			}
		}
	);

	$("#load-more").click(function(){
		var art_id = $("#art_id").val();
		var offset = $("#offset").val();

		$.post("http://localhost/pinasikat/count_comments",
			{
				'art_id': art_id,
				'offset': offset
			},
			function( data ) {
		  		//alert( "Data Loaded: " + data );
		  		if(Number(data) > 10){
		  			$("#load-more").show();
		  		}else{
		  			$("#load-more").hide();
		  		}
			}
		);

		$.post("http://localhost/pinasikat/load_comments",
			{
				'art_id': art_id,
				'offset': offset
			},
			function(data){
				//alert( "Data Loaded: " + data );
				$("#comment-section").append(data);
			}
		);

		offset++;
		$("#offset").val(offset);
	});

	$("#load-more").click();

	$("#submit-comment").click(function(){

		var art_id = $("#art_id").val();
		var comment = $("#comment-area").val();

		$.post("http://localhost/pinasikat/submit_comment",
			{
				'comment': comment,
				'art_id': art_id
			},
			function(data){
				//alert(data);
				if(Number(data) == 1){
					$("#offset").val(1);
					$("#comment-section").html("");
					$("#comment-area").val('');
					$("#comment-field").hide();
					$("#load-more").click();
				}
				else
					Materialize.toast("Don't try that again, ok?",1500);
			}
		);
	});

});