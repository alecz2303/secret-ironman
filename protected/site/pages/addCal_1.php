<?php

Yii::import('ext.feed.*');
 
 
$feed = new EFeed(EFeed::ATOM);
 
// IMPORTANT : No need to add id for feed or channel. It will be automatically created from link.
$feed->title = 'Testing the ATOM RSS EFeed class';
$feed->link = 'http://www.ramirezcobos.com';
 
$feed->addChannelTag('updated', date(DATE_ATOM, time()));
$feed->addChannelTag('author', array('name'=>'Antonio Ramirez Cobos'));
 
$item = $feed->createNewItem();
 
$item->title = 'The first Feed';
$item->link  = 'http://www.ramirezcobos.com';
// we can also insert well formatted date strings
$item->date ='2010/24/12';
$item->description = 'Test of CDATA Encoded description <b>EFeed Extension</b>';
 
$feed->addItem($item);
 
$feed->generateFeed();