<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class General
{
    /**
     * Constructor
     */
    function __construct()
    {
        //Load your settting here
        $this->ci =& get_instance();
        
        $this->db = $this->ci->db;
    }    
    
    // --------------------------------------------------------------------
    
    function get_seo($segment = NULL)
    {
        $this->db->select('A.SeoName,A.SeoMetaDesc,A.SeoMetaKeywords,A.SeoTitle,A.SeoDesc,A.SeoImage');
        $this->db->from('Seo as A');
        
        $this->db->where('A.SeoSegment',$segment);
        $this->db->where('A.SeoStatus', 1);
        
        $query = $this->db->get();
        // echo $this->db->last_query();die();
        // return $query->result_array();
        $result = $query->row_array();
        $seo = ($result) ? $result : NULL;
        return $seo;
    }

    function get_rpopup()
    {
        $this->db->select('BannerImage,BannerUrl,BannerName');
        $this->db->from('Banner');
        
        $this->db->where('BannerCategory', 13);
        $this->db->where('BannerStatus', 1);
        
        $this->db->order_by('rand()');
        $query = $this->db->get();
        // echo $this->db->last_query();die();
        // return $query->result_array();
        $result = $query->row_array();
        $rpopup = ($result) ? $result : NULL;
        return $rpopup;
    }

    function get_top_banner()
    {
        $this->db->select('BannerImage,BannerUrl,BannerName');
        $this->db->from('Banner');
        
        $this->db->where('BannerCategory', 14);
        $this->db->where('BannerStatus', 1);
        
        $this->db->order_by('rand()');
        $query = $this->db->get();
        // echo $this->db->last_query();die();
        // return $query->result_array();
        $result = $query->row_array();
        $topbanner = ($result) ? $result : NULL;
        return $topbanner;
    }
}

/* End of file general.php */
/* Location: ./application/libraries/general.php */