<?php if(!defined('BASEPATH')) exit('No direct file access allowed.');

class Site extends CI_Controller {

	public function precache() {
		if ($this->config->item('pre_cache')) {
			$this->tvic->pre_cache();
		} else {
			echo 'Pre-Caching System is Disabled.';
		} #cache
	} #precache


	public function index() {
		$this->news();
	} #index


	public function news() {
		$xml = $this->tvic->news();
		$data['news'] = $xml->xpath('//item');
		$data['date'] = $xml->xpath('//item/pubDate');
		$data['pagetitle'] = $this->config->item('news_pagetitle');
		$data['description'] = $this->config->item('news_description');
		$data['keywords'] = $this->config->item('news_keywords');
		$this->tvic->page('news', $data);
	} #news


	public function guide() {
		$this->load->library('pagination');
		$xml = $this->tvic->guide();
		$episodes = $xml->xpath('//country/show');
		$data['count'] = count($episodes);
		$config['base_url'] = base_url() . 'guide/';
		$config['uri_segment'] = 2;
		$config['num_links'] = 5;
		$config['per_page'] = $this->config->item('per_page');
		$config['total_rows'] = count($episodes);
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next &raquo;';
		$config['prev_link'] = '&laquo; Previous';
		$config['cur_tag_open'] = '<span id="current">';
		$config['cur_tag_close'] = '</span>';
		$this->pagination->initialize($config);
		$data['episodes'] = array_slice($episodes, 
			$this->uri->segment(2), $config['per_page']);
		$data['pages'] = $this->pagination->create_links();
		$data['pagetitle'] = $this->config->item('guide_pagetitle');
		$data['description'] = $this->config->item('guide_description');
		$data['keywords'] = $this->config->item('guide_keywords');
		$this->tvic->page('guide', $data);
	} #guide


	public function shows() {
		$this->load->library('pagination');
		$xml = $this->tvic->shows();
		$shows = $xml->xpath('///show');
		$uri = $this->uri->segment(2);
		$url = base_url().'shows/';
		$config['base_url'] = (!$uri) ? "{$url}a/" : "{$url}{$uri}";
		$config['uri_segment'] = 3;
		$config['num_links'] = 5;
		$config['per_page'] = $this->config->item('per_page');
		$config['total_rows'] = count($shows);
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next &raquo;';
		$config['prev_link'] = '&laquo; Previous';
		$config['cur_tag_open'] = '<span id="current">';
		$config['cur_tag_close'] = '</span>';
		$this->pagination->initialize($config);
		$data['alphabet'] = $this->tvic->alphabet();
		$data['numbers'] = $this->tvic->numbers();
		$data['count'] = count($shows);
		$data['shows'] = array_slice($shows, 
			$this->uri->segment(3), $config['per_page']);
		$data['pages'] = $this->pagination->create_links();
		$data['pagetitle'] = $this->config->item('shows_pagetitle');
		$data['description'] = $this->config->item('shows_description');
		$data['keywords'] = $this->config->item('shows_keywords');
		$this->tvic->page('shows', $data);
	} #shows


	public function episode() {
		$show = $this->tvic->episode();
		$genres = implode(', ', $show->xpath('//genre'));
		$started = (empty($show->started)) ? 'n/a' :
			date('Y-m-d', strtotime(implode('-', explode('/', $show->started)))); // date bug fix
		$ended = (empty($show->ended)) ? 'n/a' : 
			date('Y-m-d', strtotime(implode('-', explode('/', $show->ended)))); // date bug fix
		$data = array(
			// Auto-Generated Info
			'pagetitle' => $show->name,
			'description' => "TV Show info for {$show->name}.",
			'keywords' => "{$show->name}, {$show->origin_country}, {$show->classification}, {$show->network}, {$show->status}",
			// Show Info
			'name' => $show->name,
			'seasons' => $show->totalseasons,
			'id' => $show->showid,
			'link' => $show->showlink,
			'started' => $started,
			'ended' => $ended,
			'image' => $show->image,
			'country' => $show->origin_country,
			'status' => $show->status,
			'class' => $show->classification,
			'genres' => (empty($genres)) ? 'n/a' : $genres,
			'runtime' => $show->runtime,
			'network' => $show->network,
			'airtime' => (empty($show->airtime)) ? 'n/a' : $show->airtime,
			'timezone' => $show->timezone,
			// Seasons List
			'selist' => $show->xpath('////Season'),
		); #data
		$this->tvic->page('episode', $data);
	} #episode


	public function search() {
		if ($this->input->post('show')) {
			$str = $this->input->post('show');
			$xml = $this->tvic->search($str);
			$data['shows'] = $xml;
		} #input
		$data['pagetitle'] = $this->config->item('search_pagetitle');
		$data['description'] = $this->config->item('search_description');
		$data['keywords'] = $this->config->item('search_keywords');
		$this->tvic->page('search', $data);
	} #search

} #class

## EOF: ./tvicarus/models/tvic.php