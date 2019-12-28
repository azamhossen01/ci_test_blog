<?php 
class Public_ctrl extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Article','article');
    }
    
    public function index(){
        $this->load->library('pagination');
        $config = [
            'base_url' => base_url('public_ctrl/index'),
            'per_page' => 2,
            'total_rows' => $this->article->all_num_rows('articles'),
            'full_tag_open' => "<ul class='pagination'>",
            'full_tag_close' => "</ul>",
            'next_tag_open' => "<li>",
            'next_tag_close' => "</li>",
            'prev_tag_open' => "<li>",
            'prev_tag_close' => "</li>",
            'num_tag_open' => "<li>",
            'num_tag_close' => "</li>",
            'cur_tag_open' => "<li class='active'><a>",
            'cur_tag_open' => "</a><li>"

        ];
        $this->pagination->initialize($config);
        $data = $this->article->all_article_list('articles',$config['per_page'],$this->uri->segment(3));
        $this->load->view('public/article_list',compact('data'));
    }
}
?>