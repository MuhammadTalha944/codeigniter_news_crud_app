<?php
class News_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function get_news($slug = FALSE)
		{
		        if ($slug === FALSE)
		        {
		                $query = $this->db->get('news');
		                return $query->result_array();
		        }

		        $query = $this->db->get_where('news', array('slug' => $slug));
		        return $query->row_array();
		}
		public function set_news()
		{
		    $this->load->helper('url');

		    $slug = url_title($this->input->post('title'), 'dash', TRUE);

		    $data = array(
		        'title' => $this->input->post('title'),
		        'slug' => $slug,
		        'text' => $this->input->post('text')
		    );
		    // print_r($data);
		    // die();

		    return $this->db->insert('news', $data);
		}
		public function update_news($id = FALSE)
		{
			 echo $id . ' News Id ';
			 echo  $this->input->post('title');
 			 echo  $this->input->post('text');

 			 $query = $this->db->get_where('news', array('id' => $id));
 			 // print_r($query);
			// die();
		       
		    $slug = url_title($this->input->post('title'), 'dash', TRUE);
			    $data = array(
			        'title' => $this->input->post('title'),
			        'slug' => $slug,
			        'text' => $this->input->post('text')
			    );

			    $update_rows =  $data;
				$this->db->where('id', $id);
				$this->db->update('news', $update_rows);

			 //    $builder->set('field', 'field+1', FALSE);
				// $builder->where('id', 2);
				// $builder->update();
				 // gives UPDATE mytable SET field = field+1 WHERE `id` = 2

		        // return $this->db->update('news', $data)->where('slug',$slug);
		        // $this->db->update('news', $data, array('id' => $id));


		        // $query = $this->db->get_where('news', array('slug' => $slug));
		        // print_r($query);
		        // die();
		        // return $query->row_array();
		}

}