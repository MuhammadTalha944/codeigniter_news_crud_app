<?php
class News extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model');
                $this->load->helper('url_helper');
        }

        public function index()
        {
                $data['news'] = $this->news_model->get_news();
                $data['title'] = 'CodeIgniter News archive';

                $this->load->view('templates/header', $data);
                $this->load->view('news/index', $data);
                $this->load->view('templates/footer');
        }

        public function view($slug = NULL)
        {
                // echo "Hy";die();
                $data['news_item'] = $this->news_model->get_news($slug);

                if (empty($data['news_item']))
                {
                        show_404();
                }

                $data['title'] = $data['news_item']['title'];

                $this->load->view('templates/header', $data);
                $this->load->view('news/view', $data);
                $this->load->view('templates/footer');
        }


        
        public function create()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['title'] = 'Create a news item';

            $this->form_validation->set_rules('title', 'Title', 'required|min_length[2]|is_unique[news.title]',
                                                                array('is_unique' => 'Title field should be unique'));
            $this->form_validation->set_rules('text', 'Text', 'required|min_length[5]');

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('news/create');
                $this->load->view('templates/footer');

            }
            else
            {
                $this->news_model->set_news();
                redirect('/');
            }
        }
        public function edit($slug = NULL)
        {
                $this->load->helper('form');
                $this->load->library('form_validation');
                
                $data['news_item'] = $this->news_model->get_news($slug);
                $data['title'] = $data['news_item']['title'];

                $this->load->view('templates/header');
                $this->load->view('news/edit', $data);
                $this->load->view('templates/footer');
        }

        public function update(){
                // $slug = url_title($this->input->post('title'), 'dash', TRUE);
                // echo $slug;
                // die();

                    $this->load->helper('form');
                    $this->load->library('form_validation');

                    $data['title'] = 'Update a news item';

                    $this->form_validation->set_rules('title', 'Title', 'required|min_length[2]');
                    $this->form_validation->set_rules('text', 'Text', 'required|min_length[5]');

                    if ($this->form_validation->run() === FALSE)
                    {
                        $this->load->view('templates/header', $data);
                        $this->load->view('news/edit');
                        $this->load->view('templates/footer');
                    }
                    else
                    {
                        // echo $this->input->post('news_id');
                        // die();
                        $this->news_model->update_news($this->input->post('news_id'));
                        redirect('/');
                    }
        }
}