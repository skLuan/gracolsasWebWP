<?php
class Card
{
    protected $idProject;
    protected $idAvance;
    protected $idSmart;
    protected $permalink;
    public $logoUrl;
    
    public function __construct($idProject = null)
    {
        $this->idProject = $idProject;
        $this->permalink = get_the_permalink($idProject);
        if(get_post_type() == 'avance-obra'){
            $this->idAvance = $idProject;
            $projectID = get_post_meta($idProject, 'a_project_id', true);
            $this->logoUrl =
            get_post_meta($projectID, 'project_logo', true);
        } else {
            $this->idAvance = get_post_meta( $idProject, 'p_avance_id', true );
            $this->logoUrl =
            get_post_meta($idProject, 'project_logo', true);
        }
        
    }
    public function setLogo($url)
    {
        $this->logoUrl = $url;
    }
    public function getPLink()
    {
        return $this->permalink;
    }
    public function getPLinkAvance()
    {
        return get_the_permalink($this->idAvance);
    }
    public function getlogoUrl()
    {
        return $this->logoUrl;
    }
}
