<?php
class Card
{
    protected $idProject;
    protected $idSmart;
    protected $permalink;
    public $logoUrl;
    
    public function __construct($idProject = null)
    {
        $this->idProject = $idProject;
        $this->permalink = get_the_permalink($idProject);
        $this->logoUrl =
        get_post_meta($idProject, 'project_logo', true);
    }
    public function setLogo($url)
    {
        $this->logoUrl = $url;
    }
    public function getPLink()
    {
        return $this->permalink;
    }
    public function getlogoUrl()
    {
        return $this->logoUrl;
    }
}
