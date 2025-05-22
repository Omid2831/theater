<?php

class Tickets extends BaseController
{

    public function index($firstname = NULL, $infix = NULL, $lastname = NULL)
    {
        
        $data = [
            'title' => 'Mijn Tickets',
           
        ];

        $this->view('tickets/index', $data);
    }


}

