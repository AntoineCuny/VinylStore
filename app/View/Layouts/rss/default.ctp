<?php

if (!isset($documentData)) {
    $documentData = array(
    	'xmlns:dc' => 'http://purl.org/dc/elements/1.1/'
    	);
}
if (!isset($channelData)) {
    $channelData = array();
}
if (!isset($channelData['title'])) {
    $channelData['title'] = $title_for_layout;
}

$channel = $this->Rss->channel(array(), $channelData, $content_for_layout);
echo $this->Rss->document($documentData,$channel);

