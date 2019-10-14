<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajaxsearch extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('ajaxsearch_model');
    }
    //implementing admin search
    public function search()
    {
        $this->load->view('ajaxsearch');
    }

    public function fetch()
    {
        $output = '';
        $query = '';

        if($this->input->post('query'))
        {
            $query = $this->input->post('query');
        }

        $data = $this->ajaxsearch_model->fetch_data($query);
        $output .= '
        
        
        <div class="container">
        <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Artist</th>
            <th scope="col">Song</th>
            <th scope="col">Type</th>
            <th scope="col">File</th>
            <th scope="col">Created_at</th>
            <th scope="col">Action</th>
            </tr>
        </thead> 
      ';

        if($data->num_rows() > 0)
        {
            foreach($data->result() as $row)
            {
                $output .= ' <tr>
                <td>'.$row->id.'</td>
                <td>'.$row->artist.'</td>
                <td>'.$row->song.'</td>
                <td>'.$row->type.'</td>
                <td>'.$row->song_url.'</td>
                <td>'.$row->created_at.'</td>
                
            </tr>
            '; 
            }
        }
        else{
            $output .= ' <tr>
                <td>No data found</td>
            </tr>
            ';
        }
        $output .= '  </table>
            </div>
            ';

            echo $output;

       
    }
}