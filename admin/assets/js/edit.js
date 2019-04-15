function EditSuccessful(){
	var edit = alert("You have succesfully updated your record!");
	window.location = '../../../meeting-documents.php';
    
    // var editfail = alert("Your update was not successful");
	
   
        if(edit == true){

        	return true;
            
        }
        else{

            return false;
        }
}