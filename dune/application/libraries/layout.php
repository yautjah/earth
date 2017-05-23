<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layout
{
	private $CI;
	private $var = array();

/*
|===============================================================================
| Constructeur
|===============================================================================
*/

	public function __construct()
	{
        $this->CI =& get_instance();

    	$this->var['output'] = '';

    	$this->var['title'] = ucfirst($this->CI->router->fetch_method()) . ' - ' . ucfirst($this->CI->router->fetch_class());

    	$this->var['charset'] = $this->CI->config->item('charset');

    	$this->var['css'] = array();
    	$this->var['js'] = array();
	}

	public function get_view($name, $data = array())
	{
		return $this->CI->load->view($name, $data, true);
	}

	public function prepare_view($name, $data = array())
	{
		$this->var['output'] .= $this->CI->load->view($name, $data, true);
		return $this;
	}

	public function show_view()
	{
		$this->CI->load->view('layout', $this->var);
	}

	/*public function view($name, $data = array())
	{
		$this->var['output'] .= $this->CI->load->view($name, $data, true);
		$this->CI->load->view('layout', $this->var);
	}

	public function views($name, $data = array())
	{
		$this->var['output'] .= $this->CI->load->view($name, $data, true);
		return $this;
	}*/

    public function set_title($title)
    {
    	if(is_string($title) AND !empty($title))
    	{
    		$this->var['title'] = $title;
    		return true;
    	}
    	return false;
    }

    public function set_charset($charset)
    {
    	if(is_string($charset) AND !empty($charset))
    	{
    		$this->var['charset'] = $charset;
    		return true;
    	}
    	return false;
    }

    public function add_css($name)
    {
    	if(is_string($name) AND !empty($name) AND file_exists('../assets/css/' . $name . '.css'))
    	{
    		$this->var['css'][] = css_url($name);
    		return true;
    	}
    	return false;
    }

    public function add_js($name)
    {
    	if(is_string($name) AND !empty($name) AND file_exists('../assets/javascript/' . $name . '.js'))
    	{
    		$this->var['js'][] = js_url($name);
    		return true;
    	}
    	return false;
    }
}
