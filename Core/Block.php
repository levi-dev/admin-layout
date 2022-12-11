<?php

namespace OctopusOsc\AdminLayout\Core;

class Block
{
    protected $template;
    protected $data;

    public function __construct()
    {
        $this->execute();
    }

    public function execute(){
        
    }
    public function setTeamplate($template)
    {
        $this->template = $template;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function render()
    {
        return view($this->template, ['data' => $this->data]);
    }
}