<?php
class MY_Loader extends CI_Loader {
    public function template($template_name, $vars = array(), $return = FALSE)
    {
        
        if($return):
        $content  = $this->view('inc/header', $vars, $return);
        $content .= $this->view($template_name, $vars, $return);
        $content .= $this->view('inc/footer', $vars, $return);

        return $content;
    else:
        $this->view('inc/header', $vars);
        $this->view($template_name, $vars);
        $this->view('inc/footer', $vars);
    endif;
    }
}
?>