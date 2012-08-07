<?php
$page_title = "MiniCrawler";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title><?php print($page_title) ?></title>
</head>
<body>

<?php // Script number 1.1 , filename crawl.php

// This script uses simple_html_dom.php to crawl any web page.  
// Put this file, crawl.php, and simple_html_dom.php in a folder on your web server.
// When you load http://yoursite.com/folder/crawl.php, 
// it will go to the web page you enter below and fetch either
// all the images from that page, or all the links on that page. 
// It will display the images and/or links in your browser.  
// Right now, it will crawl a page and return all the images from that page. 
// To have it return all the links, uncomment the LINK CRAWLER code below. 

// error handling
ini_set('display errors',1);  // Let me learn from my mistakes!
error_reporting(E_ALL|E_STRICT); // Show all possible problems! 

// Include simple_html_dom.php.  All the magic is in there.  
include_once ('simple_html_dom.php');

// Add the url of the site you want to scrape. 
$target_url = "http://www.Name_Of_Website.com/";

// Let simple_html_dom do its magic:
$html = new simple_html_dom();
$html->load_file($target_url);


// IMAGE SCRAPER CODE 
// Loop through the page and find everything in the HTML that begins with 'img'
foreach($html->find('img') as $link){

// Echo takes each image link and prints it out on the page, surrounded 
// by the appropriate HTML tags. 
echo '<img src ="'. $link->src.'"><br />';
}

// LINK SCRAPER CODE 
// If you want to scrape all the links from a page, uncomment this section. 
// That is, remove the // in front of each line. 

// $target_url = "http://NameOfWebsite/";
// $html = new simple_html_dom();
// $html->load_file($target_url);
// foreach($html->find('a') as $link){
// echo $link->href."<br />";
// }


?>

</body>
</html>