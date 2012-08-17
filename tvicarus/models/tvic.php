<?php if(!defined('BASEPATH')) exit('No direct file access allowed.');

class Tvic extends CI_Model {

	function pre($array) {
		return '<pre>'.print_r($array,1).'</pre>';
	} #pre


	function page($page, $data = NULL) {
		$data['base'] = base_url();
		$data['current'] = current_url();
		$data['title'] = $this->config->item('title');
		$data['tagline'] = $this->config->item('tagline');
		$data['datetime'] = date('l, F d, Y');
		$this->parser->parse('header', $data);
		$this->parser->parse($page, $data);
		$this->parser->parse('footer', $data);
	} #page


	function cache($file, $time, $url) {
		if (file_exists($file) && (time() - 
			$time < filemtime($file))) {
			if (file_exists($file) && 
				filesize($file) == 0) {
				$content = file_get_contents($url);
				$xml = fopen($file, 'w');
				fwrite($xml, $content);
				fclose($xml);
				$xml = simplexml_load_file($file);
			} else {
				//where done, just grab xml from cache =)
				$xml = simplexml_load_file($file);
			} #file
		} else { // grab fresh xml
			$content = file_get_contents($url);
			$xml = fopen($file, 'w');
			fwrite($xml, $content);
			fclose($xml);
			$xml = simplexml_load_file($file);
		} #xml
		return $xml;
	} #cache


	function pre_cache() {
		$news = 'http://www.tvrage.com/news/rss.php';
		$guide = 'http://services.tvrage.com/feeds/countdown.php';
		$shows = 'http://services.tvrage.com/feeds/show_list_letter.php?letter=';
		$dir = $this->config->item('cachedir');
		$this->cache("{$dir}news.xml", 43200, $news);
		$this->cache("{$dir}countdown.xml", 86400, $guide);
		foreach (range('a', 'z') as $alphabet) {
			$this->cache("{$dir}showlists/{$alphabet}-showlist.xml", 604800, "{$shows}{$alphabet}-showlist.xml");
		} #alphabet
		foreach (range('0', '9') as $number) {
			$this->cache("{$dir}showlists/{$number}-showlist.xml", 604800, "{$shows}{$number}-showlist.xml");
		} #numbers
	} #pre_cache


	// generate categories (alphabet)
	function alphabet() {
		$base = base_url();
		foreach (range('A', 'Z') as $cat) {
			$upper = $cat; $lower = strtolower($cat);
			$alphabet[] = "<a href=\"{$base}shows/{$lower}\">{$upper}</a>";
		} #foreach
		return $alphabet;
	} #alphabet


	// generate categories (numbers)
	function numbers() {
		$base = base_url();
		foreach (range('1', '9') as $cat) {
			$upper = $cat; $lower = strtolower($cat);
			$numbers[] = "<a href=\"{$base}shows/{$lower}\">{$upper}</a>";
		} #foreach
		return $numbers;
	} #numbers


	function news() {
		$feed = 'http://www.tvrage.com/news/rss.php';
		$dir = $this->config->item('cachedir');
		$file = "{$dir}news.xml";
		$xml = $this->cache($file, 43200, $feed);
		return $xml;
	} #news


	function guide() {
		$feed = 'http://services.tvrage.com/feeds/countdown.php';
		$dir = $this->config->item('cachedir');
		$file = "{$dir}countdown.xml";
		$xml = $this->cache($file, 86400, $feed);
		return $xml;
	} #guide


	function shows() {
		$feed = 'http://services.tvrage.com/feeds/show_list_letter.php?letter=';
		$dir = $this->config->item('cachedir');
		$uri = (!$this->uri->segment(2)) ? 'a' : $this->uri->segment(2);
		$file = "{$dir}showlists/{$uri}-showlist.xml";
		$xml = $this->cache($file, 604800, "{$feed}{$uri}-showlist.xml");
		return $xml;
	} #shows


	function episode() {
		$feed = 'http://services.tvrage.com/feeds/full_show_info.php?sid=';
		$dir = $this->config->item('cachedir');
		$uri = $this->uri->segment(2);
		$file = "{$dir}episodes/{$uri}-eplist.xml";
		$xml = $this->cache($file, 604800, "{$feed}{$uri}-eplist.xml");
		return $xml;
	} #episode


	function search($str) {
		$feed = 'http://services.tvrage.com/feeds/search.php?show=';
		return simplexml_load_file("{$feed}{$str}");
	} #search

} #class

## EOF: ./tvicarus/models/tvic.php