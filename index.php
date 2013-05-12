<?php
header('Content-Type: text/xml');

include('rss.php');

$base_url = 'http://portfolio.robincwillis.com/';

$feed = new RSSFeed;
$feed->setChannel('http://portfolio.robincwillis.com', 'Robin Willis Portfolio', 'My Portfolio','en', 'copyright', 'Robin Willis', 'Art Design Architecture');

$xml_source = str_replace(array("&amp;", "&"), array("&", "&amp;"), file_get_contents('portfolio_Selected.xml'));
$projects = simplexml_load_string($xml_source);


foreach($projects as $project)
{
	$attr = $project->attributes();

	$feed->SetItem('http://portfolio.robincwillis.com/#!/'.$project->title,$project->title, $project->description, $base_url.$attr['thumb']);
}

echo($feed->Output());

?>