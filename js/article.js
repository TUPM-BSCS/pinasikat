$(document).ready(function(){

	Dropzone.options.imagesForm = {
		paramName: "images",
		dictDefaultMessage: "Drag and drop your photos here.",
		autoProcessQueue: false,
		addRemoveLinks: true,
		uploadMultiple: true,
		dictRemoveFile: "Remove Photo",
		init: function(){
			imagesForm = this;
			this.on("queuecomplete", function(){
				$("#info-form").submit();
			});
		}
	}

	$("#art-submit").click(function(){
		imagesForm.processQueue();
	});
	
});