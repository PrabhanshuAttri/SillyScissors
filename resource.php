<?php
	$key = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['q']);

// if resource is public
	$availability = 1;
	
	// if the link is redirecting
	$redirect = 0;
	
	$file = '';
	$filename = '';
	$redirect_to = '';
	
	switch ($key) {
        case "resume":
            // if you want to make your resume available after certain date (6th of sept)   
	    	if(date('d') >= '6' && date('m') >= '9') {
                $file = 'path/to/resume';
                $filename = 'Resume-PrabhanshuAttri.pdf';
            } else {
                $availability = 0;
            }    
            break;
        
        case "LFS101x2":
            // for your certicates
	    	$file = 'path/to/certicates';
		    $filename = 'PrabhanshuAttri_LFS101x2.pdf';
	        break;

        // social media links      
	    case "quora":
		    $redirect_to = 'https://quora.com/Prabhanshu-Attri';
	    	$redirect = 1;
	        break;
	        
	    case "twitter":
	    	$redirect_to = 'https://twitter.com/PrabhanshuAttri';
	    	$redirect = 1;
	        break;
	        	        
	    case "linkedin":
		    $redirect_to = 'https://www.linkedin.com/in/prabhanshuattri';
	    	$redirect = 1;
	        break;
	        	        
	    case "github":
		    $redirect_to = 'http://prabhanshuattri.github.io';
	    	$redirect = 1;
	        break;
	        
	    case "github-repo":
		    $redirect_to = 'https://github.com/prabhanshuattri';
	    	$redirect = 1;
	        break;
	        
	    case "mail":
		    $redirect_to = 'mailto:contact@prabhanshu.com';
	    	$redirect = 1;
	        break;
	        
	    case "zomato":
		    $redirect_to = 'https://www.zomato.com/prabhanshu';
	    	$redirect = 1;
	        break;
        
        default:
	        break;
	}

	if($availability && $filename && $file) {
        // if it's a pdf document and public
		header('Content-type: application/pdf');
		header('Content-Disposition: inline; filename="' . $filename . '"');
		header('Content-Transfer-Encoding: binary');
		header('Accept-Ranges: bytes');
		@readfile($file);
    } else if(!$availability && $filename && $file) {
        // if document is not available
		header('Location: http://prabhanshu.com/not-available');
		exit;
    } else if($redirect && $redirect_to) {
        // redirecting to other web pages
		header('Location: '.$redirect_to);
		exit;
	} else {
		header('Location: http://'.$_SERVER['HTTP_HOST'].'/404');
		exit;
	}
?>
